<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function index() {
		// dd(1);
		return view('admin.index');
	}
	public function uploadResult() {
		return view('admin.upload_result');
	}

	// public function downloadResultTemplate() {

 //       $name = 'Bulk_Requisition_Template.xlsx';

 //        $nameWoext = split('\.', $name);

 //       $downloadPath = {{ url('/') }}.'result_uploads\result_upload';
 //       $downloadPath = str_replace("\\","/", $downloadPath);

 //    }

// =============================		

	public function resultUploadFile() {
        $phpExcel = new PHPExcel;
        $sheet = $phpExcel ->getActiveSheet();

        $sheet->setTitle('My product list');
        $sheet ->getCell('A1')->setValue('Vendor');


        $files = scandir('..\Requisition\Bulk_zip_upload\11', SCANDIR_SORT_DESCENDING);
        $newest_file = $files[0];
        // debug($newest_file);
        // debug('..\Requisition\Bulk_zip_upload\11'.'\\'.$newest_file);
        // $xlsx = new XLSXReader('..\Requisition\Bulk_zip_upload\11'.'\\'.$newest_file);
        $xlsx = new XLSXReader('C:\xampp_7.1\htdocs\university\public\result_uploads\result_upload.xlsx');

        $sheets = $xlsx->getSheetNames();
        $data = $xlsx->getSheetData('sheet1');
        // $autoFilter = $phpExcel->getActiveSheet()
        //     ->getAutoFilter();
        // debug($data);
        // exit;
        $record = array();

        $tuple=array();

        $row_index=1;
        while($row_index<count($data)) {
            $col_index=0;
            while($col_index<count($data[0])) {
                $cell = isset($data[$row_index][$col_index]) ? $data[$row_index][$col_index] : '';
                $index = $data[0][$col_index];
                $tuple[$index] = $cell;
                $col_index++;
            }
            array_push($record, $tuple);
            $row_index++;
        }

        dd($record);

        $excel_fields = [];
        foreach ($record[0] as $key => $value) {
            array_push($excel_fields, $key);
        }		
	}
}