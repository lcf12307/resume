<?php
ini_set('memory_limit', '2048M');
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
class doexcel {
	const DB_SERVICE_NAME = 'xm_mysql_backend_order';
	private static $db = null;
	public function process(){
		require_once 'PHPExcel.php';
		// $PHPReader = new PHPExcel_Reader_Excel2007();
        // if(!$PHPReader->canRead($filename))
        // $PHPReader = new PHPExcel_Reader_Excel5();
		// $filename = 'B2B2CInvoiceDetail-20150325-0331.xls';
		// $PHPExcel = $PHPReader->load($filename);
		// $sheet = $PHPExcel->getSheet(0);
		// $highestRow = $sheet->getHighestRow();
		// $highestColumm = $sheet->getHighestColumn();
		// for ($row = 1; $row <= $highestRow; $row++) {
		// 	$column = 'Z';
		// 	$sheet->setCellValue($column.$row, '123');
		// 	echo $sheet->getCell($column.$row)->getValue() . "\n";
		// }
		// $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel5');
        // $objWriter->save($filename);
		// exit;
		$pay_id_list = array (
				1 => "在线支付",
				2 => "货到付款",
				3 => "这种方式会直接支付成功",
				4 => "网银支付",
				5 => "财付通",
				6 => "现金",
				7 => "小米自提-拉卡拉",
				8 => "银行转账",
				9 => "挂账",
				10 => "内部领用",
				100 => "易宝支付（米家）",
				101 => "现金支付（米家）",
				102 => "银联POS（米家）",
				103 => "现在支付（米家）",
				21 => "PayPal(台湾)",
				35 => "全家超商支付",
				51 => "台湾7-11",
				58 => "台湾玉山WebATM",
				59 => "台湾玉山CreditCard",
				105 => "玉山POS（米家）",
		);
		$fw = fopen ("gift", 'w');
		fputcsv($fw, array("order_id", "goods_id"));
		$db = $this->getDb();
		// $directory = './fapiao1';
		$directory = './data';
		$mydir = dir($directory);
		while($file1 = $mydir->read()){
			if(($file1!=".") && ($file1!="..")) {
				$directory1 = "$directory/$file1";
				// echo "$directory1\n";
				$mydir2 = dir($directory1);
				while($file2 = $mydir2->read()){
					if(($file2!=".") && ($file2!="..")) {
						$directory2 = "$directory1/$file2";
						echo "dir: $directory2\n";
						$PHPReader = new PHPExcel_Reader_Excel2007();
				        if(!$PHPReader->canRead($directory2))
				        	$PHPReader = new PHPExcel_Reader_Excel5();
						$PHPExcel = $PHPReader->load($directory2);
						$sheet = $PHPExcel->getSheet(0);
						$highestRow = $sheet->getHighestRow();
						$highestColumm = $sheet->getHighestColumn();
						$sheet->setCellValue('Z1', "支付方式");
						for ($row = 2; $row <= $highestRow; $row++) {
							$column = 'P';
							$order_id = $sheet->getCell($column.$row)->getValue();
							echo $order_id . "\n";
							$sql = "select pay_id from xm_order where order_id=$order_id";
							$res = $db->query($sql);
							$pay_id = $res[0]['pay_id'];
							$pay_name = $pay_id_list[$pay_id];
							$column = 'Z';
							$sheet->setCellValue($column.$row, $pay_name);

							$sql = "select order_id,goods_id,cart_price from xm_order_item b where order_id=$order_id";
							$res = $db->query($sql);
							foreach($res as $item) {
								if($item['cart_price'] == 0) {
									fputcsv($fw, array($item['order_id'], $item['goods_id']));
								}
							}
						}
						$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel5');
        				$objWriter->save($directory2);
					}
				}
			}
		}
	}

	private static function getDb() {
		if (! self::$db) {
			self::$db = MiDb::getDb ( self::DB_SERVICE_NAME );
		}
		if (! self::$db) {
			MiLog::warning ( "FATAL : GetDb [" . self::DB_SERVICE_NAME . "] Failed." );
			echo "get db fail";
			exit ( - 1 );
		}
		return self::$db;
	}
}
$d = new doexcel();
$d->process();