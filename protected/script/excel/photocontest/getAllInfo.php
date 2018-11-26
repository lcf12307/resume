<?php
/**
 * Created by PhpStorm.
 * User: chavey
 * Date: 17-11-17
 * Time: 上午9:49
 */
define ( 'MI_LIB', '/home/work/data/lib/mi_lib' );
define ( 'ROOT_PATH', '/home/work/data/www/hd.global.mi.com/mi_com_huodong' );

$include_path = get_include_path ();
set_include_path ( $include_path . PATH_SEPARATOR . MI_LIB );
function mi_lib_autoload($class_name) {
    $path = str_replace ( '_', '/', $class_name ) . '.php';
    $path = MI_LIB . DIRECTORY_SEPARATOR . $path;
    if (file_exists ( $path )) {
        require_once $path;
    }
}
spl_autoload_register ( 'mi_lib_autoload' );
require_once '../PHPExcel.php';
require_once '../PHPExcel/IOFactory.php';
$db = MiDb::getDb('db_huodong_r');
$filename = $argv[1];
$objPHPExcel = PHPExcel_IOFactory::load($filename);
$objWorksheet = $objPHPExcel->getActiveSheet();

$sql = 'select a.id as challenge,a.collectionId,a.userid,b.name,a.app_local,a.`desc`,b.phone,b.email from photocontest_challenge_1 a  left join photocontest_apply_1 b on a.userid=b.userid where a.status=3';
$photos = $db->query($sql);

$dir = dirname(__FILE__); //找出当前脚本所在路径
$objPHPExcel->setActiveSheetIndex(0);
foreach ($photos  as $photo){
    $row = $objPHPExcel->getActiveSheet()->getHighestRow()+1;
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $photo['challenge']);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $photo['userid']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $photo['name']);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $photo['app_local']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $photo['email']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $photo['phone']);
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $photo['desc']);
    $sql = 'select title from photocontest_collection where id='.$photo['collectionId'];
    $collection = $db->query($sql);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, $collection[0]['title']);
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007'); //设定写入excel的类型
$objWriter->save($dir.'/'.$filename); //保存文件
