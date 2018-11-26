<?php
define('APP_LOCAL', 'in');
ini_set('memory_limit', '2048M');

require_once '../../../application/Init.php';
require_once '../../../application/models/Logic/Fcode.php';
require_once '../PHPExcel.php';

$config = XMInit::init();
$app = new Yaf_Application($config);
$app->bootstrap();

$PHPReader = new PHPExcel_Reader_Excel5();
$filename = "./fcode-order-" . date('Y-m-d') . ".xls";
$PHPExcel = new PHPExcel();
$sheet = $PHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumm = $sheet->getHighestColumn();

$sheetHeader = array(
    'A' => 'Order ID',
    'B' => 'Mi ID',
    'C' => 'F-Code',
    'D' => 'Product Name',
    'E' => 'Status',
);

foreach ($sheetHeader as $k => $v) {
    $sheet->setCellValue($k.'1', $v);
}

$source = 'fcode_20180831_lyf';
$model = new Logic_FcodeModel();
$fcodeList = $model->getFocdeListBySource($source);

$kv = array (
    'A' => 'order_id',
    'B' => 'user_id',
    'C' => 'fcode',
    'D' => 'product_name',
    'E' => 'order_status',
);

foreach ($fcodeList as $k => $v) {
    $data = ShopApi_Order::getOrderInfo($v['user_id'], $v['order_id']);
    $sheet->setCellValue("B".($k+2), '="' . $v['user_id'] . '"');
    $sheet->setCellValue("C".($k+2), '="' . $v['fcode'] . '"');

    foreach($kv as $kk => $vv) {
        if ($kk == 'A') {
            $sheet->setCellValue($kk.($k+2), '="' . $data[$vv] . '"');
        } else if ($kk == 'D') {
            $sheet->setCellValue($kk.($k+2), $data['product'][0]['product_name']);
        } else if ($kk == 'E') {
            $str = "";
            $len = count($data['order_status_info']['trace']);

            for($i = $len-1; $i >= 0; $i--) {
                $t = $data['order_status_info']['trace'][$i];
                $str .= ($t['time'] != 0 ? date('Y/m/d H:i:s', $t['time']) : "-") . ": " . $t['text'] . " --> ";
            }
            $str .= "Now: " . $data['order_status_info']['info'];
            $sheet->setCellValue($kk.($k+2), $str);
        }
    }
}

$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel5');
$objWriter->save($filename);
