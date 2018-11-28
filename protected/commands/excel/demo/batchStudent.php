<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-11-27
 * Time: 下午7:48
 */

require_once '../PHPExcel.php';
require_once '../../../../framework/yiic.php';
require_once '../../../models/Model.php';
$config = '../../../config/main.php';

Yii::createWebApplication($config)->run();


$PHPReader = new PHPExcel_Reader_Excel5();
$filename = "./student.xlsx";
$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
$objPHPExcel = $objReader->load($filename);
$objWorksheet = $objPHPExcel->getActiveSheet();
$sheetHeader = array(
    0 => 'name',
    1 => 'phone',
    2 => 'type',
    3 => 'rid',
);

foreach($objWorksheet->getRowIterator() as $row) {

    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);
    $user = array();
    $i = 0;
    foreach ($cellIterator as $cell) {
        if ($i > 3){
            break;
        }
        $user[$sheetHeader[$i]] = $cell->getValue();
        $i++;
    }
    if ($user['type'] == 2){
        $user = new Model('user');
        $data = $user->select('*');
    }
    var_dump($data);exit;
}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007'); //设定写入excel的类型
$objWriter->save($dir.'/out/'.$filename); //保存文件