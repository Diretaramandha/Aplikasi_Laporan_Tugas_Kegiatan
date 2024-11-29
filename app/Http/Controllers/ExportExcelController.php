<?php

namespace App\Http\Controllers;

use App\Http\Middleware\member;
use App\Models\Event;
use App\Models\Report;
use App\Models\Task;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;

class ExportExcelController extends Controller
{
    public function view_export()
    {

        $user = auth()->user();
        $data['event'] = Event::with('user')
            ->where('create_by', $user->id)
            ->get();

        return view('pages.export.export', $data);
    }
    public function view_export_tasks($id_event)
    {
        // Mengambil data event berdasarkan id_event
        $data['event'] = Event::where('id', $id_event)->first();

        $data['report'] = Report::with([
            'tasks' => function ($query) use ($id_event) {
                $query->where('id_event', $id_event)
                    ->with('member.user', 'subTask');
            },
            'detailReport',
        ])->get();

        // return response()->json($data['report']);
        return view('pages.export.export-tasks', $data);
    }

    public function exportTasksToExcel($id_event)
    {
        // Mengambil data event berdasarkan id_event
        $event = Event::find($id_event);

        if (!$event) {
            return response()->json(['error' => 'Event not found.'], 404);
        }

        // Fetch reports with related tasks and detail reports
        $reports = Report::with([
            'tasks' => function ($query) use ($id_event) {
                $query->where('id_event', $id_event)
                    ->with('member.user', 'subTask');
            },
            'detailReport',
        ])->whereHas('tasks', function ($query) use ($id_event) {
            $query->where('id_event', $id_event);
        })->get();

        // Membuat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan header
        $headers = ['No.', 'Main Task', 'Task', 'Report', 'Format', 'Description', 'File', 'Link'];
        $sheet->fromArray($headers, NULL, 'A1');

        // Menambahkan gaya untuk header
        $headerStyle = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => 'FFFFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF4F81BD'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $sheet->getStyle('A1:H1')->applyFromArray($headerStyle);

        // Mengatur lebar kolom
        foreach (range('A', 'H') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Mengisi data
        $row = 2; // Mulai dari baris kedua
        foreach ($reports as $key => $item) {
            $sheet->setCellValue('A' . $row, $key + 1);

            // Main Task
            $mainTask = $item->tasks->tasks_idtask == null ? $item->tasks->name : $item->tasks->subTask->name;
            $sheet->setCellValue('B' . $row, $mainTask);

            // Task
            $sheet->setCellValue('C' . $row, $item->tasks->name);

            // Report
            $sheet->setCellValue('D' . $row, $item->name);

            // Format (You can customize this if you have specific formats)
            $sheet->setCellValue('E' . $row, ''); // Placeholder for Format

            // Description
            $descriptions = $item->detailReport->pluck('description')->implode(', ');
            $sheet->setCellValue('F' . $row, $descriptions);

            // File
            $files = $item->detailReport->pluck('file_upload')->implode(', ');
            $sheet->setCellValue('G' . $row, $files);

            // Link
            $links = $item->detailReport->pluck('link_file')->implode(', ');
            $sheet->setCellValue('H' . $row, $links);

            // Menambahkan batas pada sel
            $sheet->getStyle('A' . $row . ':H' . $row)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ]);

            $row++;
        }

        // Set header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="tasks_event_' . $event->name . '.xlsx"');
        // Buat writer dan simpan file
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
