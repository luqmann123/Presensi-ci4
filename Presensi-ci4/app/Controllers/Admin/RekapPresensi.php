<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PresensiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RekapPresensi extends BaseController
{
    public function rekap_harian()
    {
        $presensi_model = new PresensiModel();
        $filter_tanggal = $this->request->getVar('filter_tanggal');
        if ($filter_tanggal) {
            if(isset($_GET['excel'])) {
                $rekap_harian = $presensi_model->rekap_harian_filter($filter_tanggal);  
                $spreadsheet = new Spreadsheet();
                $activeWorksheet = $spreadsheet->getActiveSheet();
                $activeWorksheet->setCellValue('A1', 'Hello World !');

                // redirect output to client browser
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="rekap_presensi_harian.xlsx"');
                header('Cache-Control: max-age=0');
                
                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer = new Xlsx($spreadsheet);
                $writer->save('php://output');
                
            } else {    
                $rekap_harian = $presensi_model->rekap_harian_filter($filter_tanggal);    
            }
        }else{
            $rekap_harian = $presensi_model->rekap_harian();
        }
        // dd($filter_tanggal);

        $data = [
            'title' => 'Rekap Harian',
            'tanggal' => $filter_tanggal,
            'rekap_harian' => $rekap_harian
        ];

        return view('admin/rekap_presensi/rekap_harian', $data);
    }

    public function rekap_bulanan()
    {
        $presensi_model = new PresensiModel();
        $filter_bulan = $this->request->getVar('filter_bulan');
        $filter_tahun = $this->request->getVar('filter_tahun');

        if ($filter_bulan) {
            $rekap_bulanan = $presensi_model->rekap_bulanan_filter($filter_bulan, $filter_tahun);    
        }else{
            $rekap_bulanan = $presensi_model->rekap_bulanan();
        }
        // dd($filter_tanggal);

        $data = [
            'title' => 'Rekap Bulanan',
            'bulan' => $filter_bulan, 
            'tahun' => $filter_tahun,
            'rekap_bulanan' => $rekap_bulanan
        ];

        return view('admin/rekap_presensi/rekap_bulanan', $data);
    }
}
