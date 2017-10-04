<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  

/*
http://www.ahowto.net/php/easily-integrateload-phpexcel-into-codeigniter-framework/

	USE
	
	//load the excel library
	$this->load->library('excel');
	
	-----------------------------------------------------------
	How to read excel file
	-----------------------------------------------------------
	
	//ME
	$lastRow = $objPHPExcel->getActiveSheet()->getHighestRow();
	
	$this->load->library('table');
    	
    	$file = './resources/file/Book1.xlsx';
 
		$this->load->library('excel');
 
		$objPHPExcel = PHPExcel_IOFactory::load($file);
 
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
 
		foreach ($cell_collection as $cell) {
    		$column		= $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
    		$row		= $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
    		$data_value	= $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
 
			if ($row == 1) {
    		    $header[$row][$column] = $data_value;
    		} 
    		else{
        		$arr_data[$row][$column] = $data_value;
    		}
		}
		
		echo '<br>===============================<br>';
		echo 'start to read';
		echo '<br>===============================<br>';
		
		$this->table->set_heading('ID', 'Email');
		
		for($i = 2; $i <= 300; $i++){
			//echo $arr_data[$i]['A'] . nbs(3) . $arr_data[$i]['B'] . "<br>";
			$this->table->add_row(array($arr_data[$i]['A'], $arr_data[$i]['B']));
		}
 
 		echo $this->table->generate();
	
	//-------------------------
	//Doc
	$file = './files/test.xlsx';
	
	//read file from path
	$objPHPExcel = PHPExcel_IOFactory::load($file);
	//get only the Cell Collection
	$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
	//extract to a PHP readable array format
	foreach ($cell_collection as $cell) {
    	$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
    	$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
    	$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
    	//header will/should be in row 1 only. of course this can be modified to suit your need.
    	if ($row == 1) {
        	$header[$row][$column] = $data_value;
    	} else {
        	$arr_data[$row][$column] = $data_value;
    	}
	}
	//send the data in an array format
	$data['header'] = $header;
	$data['values'] = $arr_data;
	
	-----------------------------------------------------------
	How to write excel file
	-----------------------------------------------------------
	
	$filename = 'nombre de pestaña';
	$title = 'texto normal en forma de titulo';
	$file = $filename . '-' . $name . '.xls'; //save our workbook as this file name
	$query = $his->model->function($params);
	
	header('Content-Type: application/vnd.ms-excel'); //mime type
	header('Content-Disposition: attachment;filename="'.$file.'"'); //tell browser what's the file name
	header('Cache-Control: max-age=0'); //no cache
	
	$this->excel->setActiveSheetIndex(0);
	$this->excel->getActiveSheet()->setTitle($filename);
	$this->excel->getActiveSheet()->setCellValue('A1', $title);
	$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
	$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
	$this->excel->getActiveSheet()->mergeCells('A1:' . $cell . '1');
	$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	$this->excel->getActiveSheet()->setCellValue('A2', 'Subtitulo 1');
	$this->excel->getActiveSheet()->setCellValue('B2', 'Subtitulo 2');
	$this->excel->getActiveSheet()->setCellValue('C2', 'Subtitulo 3');
	$this->excel->getActiveSheet()->setCellValue('D2', 'Subtitulo 4');
	$this->excel->getActiveSheet()->setCellValue('E2', 'Subtitulo 5');
	$this->excel->getActiveSheet()->getStyle('A2:E2')->getFont()->getColor()->setRGB('555555'); 
	$this->excel->getActiveSheet()->getStyle('A2:E2')->getFont()->setSize(10);
	$this->excel->getActiveSheet()->getStyle('A2:E2')->getFont()->setBold(true);

	$i = 3;
	foreach($query as $item){
		$this->excel->getActiveSheet()->setCellValue('A'.$i, $item['cell1']);
		$this->excel->getActiveSheet()->setCellValue('B'.$i, $item['cell2']);
		$this->excel->getActiveSheet()->setCellValue('C'.$i, $item['cell3']);
		$this->excel->getActiveSheet()->setCellValue('D'.$i, number_format($item['cell4'], 0, ',', '.'));
		$this->excel->getActiveSheet()->setCellValue('E'.$i, date('d M Y h:i a', strtotime($item['date1'])));
		
		//$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(TRUE);
		$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(TRUE);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(TRUE);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(TRUE);
		$i++;
	}
	
	$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
	$objWriter->save('php://output');
	
	
	//--------------------------------------------------------------------------
	//CREATE MUKTIPLE SHEETS IN THE SAME DOCUMENT
	//--------------------------------------------------------------------------
	
	$obj = new $this->excel();
 
						$i=0;
						while ($i < 10) {

							// Add new sheet
							$objWorkSheet = $obj->createSheet($i); //Setting index when creating

							//Write cells
							$objWorkSheet->setCellValue('A1', 'Hello'.$i)
										->setCellValue('B2', 'world!')
										->setCellValue('C1', 'Hello')
										->setCellValue('D2', 'world!');

							// Rename sheet
							$objWorkSheet->setTitle("$i");

							$i++;
						}

						$filename='just_some_random_name.xls'; //save our workbook as this file name
						header('Content-Type: application/vnd.ms-excel'); //mime type
						header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
						header('Cache-Control: max-age=0'); //no cache

						//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
						//if you want to save it as .XLSX Excel 2007 format
						$objWriter = PHPExcel_IOFactory::createWriter($obj, 'Excel5');
						//force user to download the Excel file without writing it to server's HD
						$objWriter->save('php://output');
 */

require_once APPPATH."/third_party/PHPExcel.php";

class Excel extends PHPExcel {

    public function __construct() {
        parent::__construct();
    }
}