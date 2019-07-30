<?
ini_set('display_errors','On');
if($_POST){
	include('Classes/PHPExcel.php');
	include_once 'Classes/PHPExcel/IOFactory.php'; 
	$objPHPExcel = PHPExcel_IOFactory::load('info.xls');
	$list = $objPHPExcel->getActiveSheet();
	$max = $list->getHighestRow();
	$list->setCellValue("A".($max+1),$_POST["fio"]);
	$list->setCellValue("B".($max+1),$_POST["phone"]);
	$list->setCellValue("C".($max+1),$_POST["email"]);
	include('Classes/PHPExcel/Writer/Excel2007.php');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('info.xls');
	chmod("info.xls",0777);
}
?>

