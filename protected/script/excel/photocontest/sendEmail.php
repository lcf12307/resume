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

require_once '../PHPExcel.php';
$db = MiDb::getDb('db_huodong_r');
$filename = $argv[1];
$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
$objPHPExcel = $objReader->load($filename);
$objWorksheet = $objPHPExcel->getActiveSheet();
$mailer = new sendemail ();
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
$user = array(
    'challenge'=>array()
);
foreach($objWorksheet->getRowIterator() as $row) {
    if($row->getRowIndex()<2) {
        continue;
    }
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);
    $tag=0;
    foreach ($cellIterator as $cell) {
        if($tag){

            $sql = 'select a.collectionId,a.userid,b.name,a.app_local,a.`desc`,b.phone,b.email from photocontest_challenge_1 a  left join photocontest_apply_1 b on a.userid=b.userid where a.id='.$values[$i];
            $photo = $db->query($sql);
            $photo = $photo[0];
            $sql = 'select title from photocontest_collection where id='.$photo['collectionId'];
            $collection = $db->query($sql);
            $photo['collection'] = $collection[0]['title'];
            foreach ($rowName as $key=>$value){
                $objWorksheet->setCellValue($key.($i+2),$photo[$value]);
            }
            $photo['userid'] = $cell->getValue();
            if ($user['userid'] == $photo['userid']){
                $user['challenge'][] = $values[$i];
            } else {
                if (!empty($user['userid'])){
                    $mailer->send ($user);
                }
                $user['userid'] = $photo['userid'];
                $user['name'] = $photo['name'];
                $user['challenge']= array( $values[$i]);
                $user['email'] = $photo['email'];
            }
            break;
        }
        $values[] = $cell->getValue();
        $tag=1;
    }
    $i++;
}
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007'); //设定写入excel的类型
$objWriter->save($dir.'/out/'.$filename); //保存文件

class sendemail {
    private $title = null;
    private $content = null;


    //
    public function load_data($photo) {

        $res=$photo['challenge'];
        $url = 'http://event.mi.com/in/challenge2017/mia1/details/#challengeid=';
        $this->content = "
            <html><body text-align:center>
            <div style=\"width:80%;margin-left:1%;margin-right:10%;\">
            <p>Dear ".$photo['name'].",</p><p>Thank you for participating in the Xiaomi Photography Challenge #ShotOnMiA1."
            ." We are writing to inform you that your work has been selected for the opportunity to make our shortlist of"
            ." the one hundred best submissions, and will compete for the global award.</p>Please reply directly to this "
            ."email with the original file of your photo to us as an email attachment in the format indicated below. The "
            ."deadline to complete this is<b> November 28, 2017</b>. We cannot consider your submission without this step.<br><br>"
            ."URL link to your selected work: <br>";

        foreach ( $res as $data ) {
            $this->content .= '<a href="'.$url.$data.'">'.$url.$data.'</a><br>';
        }

        $this->content .= '<p>Please send us the original file of the photo in this link; we will not accept any other photo submissions.</p>'
            .'<p>We look forward to your reply! Thank you!<br>Best wishes,<br>Xiaomi Photography Challenge<br>----</p>'
            .'<b><p>Email reply format:</b><br><br>      Full Name: <br>      City, Country: <br>      IMEI Number: <br>'
            .'(Attach the original photo file. REPLY DIRECTLY TO THIS EMAIL. )</p><p>Note: 1)If you cannot provide the IMEI number, '
            .'please indicate the source of the mobile phone you used to take the photo.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2)Two ways to get your phone’s IMEI number. '
            .' <br><br>        <U>Method One</U>: Dial *#06# in your phone’s keypad. The phone will automatically display its IMEI number. </p><br>'
            . '<img src="http://download.appmifile.com/548_updatepdf_in/21/11/2017/2069129b-1e40-443e-bb94-7abe7b51129b.png"  width="80%"/><br><br><U>Method Two</U>: Look on the back of the phone’s original packaging to'
            .' find the IMEI number.<br><img src="http://download.appmifile.com/522_updatepdf_in/21/11/2017/7a235f0f-19fb-47d0-9e73-af19da376ccc.png" width="80%"/></body></html>';

    }

    //
    public function send($photo) {
        $this->title = "Xiaomi Photography Challenge – Your Chance to Enter Shortlist"; // 邮件标题
        $this->load_data ($photo);
        $emailData = array (
            'data' => array (
                'm_args' => array (),
                'm_attachs' => array ()
            )
        );
        $emailData ['data'] ['m_body_tmpl'] = $this->content;
        $emailData ['data'] ['m_title_tmpl'] = $this->title;
        $emailData ['data'] ['m_to'] = implode ( ';', array($photo['email']) );
        $emailData ['data'] ['m_from'] = implode ( ';', array('xiaomi-xpc@xiaomi.com') );
        $emailData ['data'] ['sender_name'] = 'xiaomi-xpc';

        $ch = curl_init ();
        $host = Yaf_Registry::get('config')->mail->host;
        $url = $host . "/send";
        curl_setopt ( $ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, 'data=' . json_encode ( $emailData ) );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_PROXYUSERPWD,'xiaomi-xpc:Missmm1225');

        if (! curl_exec ( $ch )) {
            MiLog::warning ( "Fatal ： 邮件发送失败. {$this->title} " . "错误原因: " . curl_error ( $ch ) . "\n" );
            echo "Send email fail: " . curl_error ( $ch ) . "\n";
            exit ();
        }
        echo "Success : 邮件发送成功 {$this->title} \n";
    }
}

