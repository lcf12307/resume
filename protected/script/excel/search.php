<?php
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
class search {
	const DB_SERVICE_NAME = 'xm_mysql_backend_order';
	private static $db = null;
	public function process(){
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
		$db = $this->getDb();
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
						$file = fopen ( $directory2, 'r' );
						$fw = fopen ('tmp', 'w');
						$i = 0;
						while ( $data = fgetcsv ( $file ) ) {
							$order_id = $data[15];
							echo "$order_id\n";
							$sql = "select pay_id from xm_order where order_id=$order_id";
							$res = $db->query($sql);
							$pay_id = $res[0]['pay_id'];
							$pay_name = $pay_id_list[$pay_id];
							$sql = "select goods_id,cart_price from xm_order_item where order_id=$order_id";
							$res = $db->query($sql);
							$goods_skus = "";
							$goods_name = "";
							foreach($res as $item){
								if($item['cart_price'] != 0)
									continue;
								$goods_id = $item['goods_id'];
								$goods_skus .= $goods_id . ",";
								$name_sql = "select name from xm_sku where goods_id=" . $goods_id;
								$name = $db->query ( $name_sql );
								$goods_name .= $name[0]['name'] . ",";
							}
							$goods_skus = substr ( $goods_skus, 0, strlen ( $goods_skus ) - 1 );
							$goods_name = substr ( $goods_name, 0, strlen ( $goods_name ) - 1 );
							if($i == 0) {
								$pay_name = '渠道';
								$goods_skus = "奖品sku";
								$goods_name = "奖品名称";
							}
							$i++;
							$pay_name = iconv("utf-8","gb2312//IGNORE",$pay_name);
							$goods_skus = iconv("utf-8","gb2312//IGNORE",$goods_skus);
							$goods_name = iconv("utf-8","gb2312//IGNORE",$goods_name);
							$result = array(
								$data[0],
								$data[1],
								$data[2],
								$data[3],
								$data[4],
								$data[5],
								$data[6],
								$data[7],
								$data[8],
								$data[9],
								$data[10],
								$data[11],
								$data[12],
								$data[13],
								$data[14],
								$data[15],
								$data[16],
								$data[17],
								$data[18],
								$data[19],
								$data[20],
								$data[21],
								$data[22],
								$data[23],
								$data[24],
								$pay_name,
								$goods_skus,
								$goods_name
							);
							fputcsv($fw, $result);
						}
						copy('tmp', $directory2);
						unlink("tmp");
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
$s = new search();
$s->process();