<?php

namespace App\Http\Controllers;

use App\Http\Middleware\member;
use App\Models\Event;
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

        $data['tasks'] = Task::with([
            'event', // Tidak perlu filter di sini
            'report.detailReport', // Menggunakan sintaks yang lebih ringkas
            'member.user',
            'subTask',
        ])
            ->where('id_event', $id_event)
            ->get();

        // return response()->json($data['tasks']);

        return view('pages.export.export-tasks',     $data);
    }

    public function exportTasksToExcel($id_event)
    {
        // Mengambil data event berdasarkan id_event
        $event = Event::where('id', $id_event)->first();

        $tasks = Task::with([
            'event',
            'report.detailReport',
            'member.user',
            'subTask',
        ])
            ->where('id_event', $id_event)
            ->get();

        // Membuat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan header
        $headers = ['No.', 'Member', 'Task', 'Description', 'Main Task', 'Report', 'File', 'Link'];
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
        foreach ($tasks as $key => $item) {
            $sheet->setCellValue('A' . $row, $key + 1);

            $members = $item->member->pluck('user.name')->implode(', ');
            $sheet->setCellValue('B' . $row, $members);
            $sheet->setCellValue('C' . $row, $item->name);
            $sheet->setCellValue('D' . $row, $item->description);
            $sheet->setCellValue('E' . $row, $item->subTask ? $item->subTask->name : "It's Main task in " . $item->event->name);

            $reports = $item->report->pluck('name')->implode(', ');
            $sheet->setCellValue('F' . $row, $reports ?: 'Belum ada report');

            $files = $item->report->pluck('detailReport.file_upload')->implode(', ');
            $sheet->setCellValue('G' . $row, $files);

            $links = $item->report->pluck('detailReport.link_file')->implode(', ');
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
        header('Cache-Control: max-age=0');

        // Buat writer dan simpan file
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        toast('Warning Failed create report', 'warning');
        exit;
    }
}
