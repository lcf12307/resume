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
$db = MiDb::getDb('db_huodong_r');
$filename = $argv[1];
$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
$objPHPExcel = $objReader->load($filename);
$objWorksheet = $objPHPExcel->getActiveSheet();
 $i = 0;
$values = array();
$rowName = array(
    'B'=>'userid',
    'C'=>'name',
    'D'=>'app_local',
    'E'=>'email',
    'F'=>'phone',
    'G'=>'desc',
    'H'=>'collection'
);
$dir = dirname(__FILE__); //找出当前脚本所在路径
foreach($objWorksheet->getRowIterator() as $row) {
  if($row->getRowIndex()<2) {
      continue;
  }
  $cellIterator = $row->getCellIterator();
  $cellIterator->setIterateOnlyExistingCells(false);

  foreach ($cellIterator as $cell) {
      if(!$cell->getValue()){
          $sql = 'select a.collectionId,a.userid,b.name,a.app_local,a.`desc`,b.phone,b.email from photocontest_challenge_1 a  left join photocontest_apply_1 b on a.userid=b.userid where a.id='.$values[$i];
          $photo = $db->query($sql);
          $photo = $photo[0];
          $sql = 'select title from photocontest_collection where id='.$photo['collectionId'];
          $collection = $db->query($sql);
          $photo['collection'] = $collection[0]['title'];
          foreach ($rowName as $key=>$value){
              $objWorksheet->setCellValue($key.($i+2),$photo[$value]);
          }
          break;
      }
      $values[] = $cell->getValue();
  }
  $i++;
}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007'); //设定写入excel的类型
$objWriter->save($dir.'/'.$filename); //保存文件
