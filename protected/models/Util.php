<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-4
 * Time: 下午3:42
 */


class Util extends CFormModel
{
    private $user = 'lcf12307';
    private $pass = 'bnm,.123';
    private $sid = '1897465132';
    const VERIFY_URL =  'http://api2.sz789.net:88/RecvByte.ashx';
    const PHONE_LOGIN_URL =  'http://api.ndd001.com/do.php';


    function login($url = '', $post_data = array()) {
        if (empty($url) || empty($post_data)) {
            return false;
        }

        $post_data = $this->handleData($post_data);
        $cookie_jar = tempnam('protected/data/cookies/', 'cookie');
        $postUrl = $url;
        $curlPost = $post_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_COOKIEJAR,$cookie_jar);
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return array(
            'data' => $data,
            'cookie' => $cookie_jar
        );
    }

    function post($url = '', $post_data = array(), $cookie){
        if (empty($url) || empty($post_data)) {
            return false;
        }

        $post_data = $this->handleData($post_data);
        $cookie_jar = $cookie;
        $postUrl = $url;
        $curlPost = $post_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_COOKIEJAR,$cookie_jar);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
        curl_setopt($ch, CURLOPT_COOKIEJAR,$cookie_jar);
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return $data;
    }
    function get($url = '', $post_data = array(), $cookie){

        $post_data = $this->handleData($post_data);
        $cookie_jar = $cookie;
        $postUrl = $url;
        $curlPost = $post_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_COOKIEJAR,$cookie_jar);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
        curl_setopt($ch, CURLOPT_COOKIEJAR,$cookie_jar);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return $data;
    }
    function handleData($post_data = array()){
        $o = "";
        foreach ( $post_data as $k => $v )
        {
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $o = substr($o, 0, -1);
        return $o;
    }


    // 正则匹配 form 标签
    function regular_tags($tag, $string)
    {
        $pattern = '/<'. $tag . '(.*?)>(.*?)<\/' . $tag .'>/si';
        preg_match_all($pattern,$string,$result);
        return $result;
    }

    /**
     * 识别图形验证码
     * @param $imgdata
     * @return mixed
     */
    function recv_byte($imgdata)
    {
        $http = curl_init();
        curl_setopt($http,CURLOPT_URL,self::VERIFY_URL);
        curl_setopt($http,CURLOPT_RETURNTRANSFER,1);
        $postData = 'username='.$this->user.'&password='.$this->pass .'&imgdata='.$imgdata;
        curl_setopt($http,CURLOPT_POSTFIELDS,$postData);
        $data = curl_exec($http);
        curl_close($http);
        return $data;
    }

    /**
     * 获取手机token
     * @return array|mixed
     */
    function getToken(){
        $http = curl_init();
        curl_setopt($http,CURLOPT_URL,self::PHONE_LOGIN_URL);
        curl_setopt($http,CURLOPT_RETURNTRANSFER,1);
        $data = array(
            'action' => 'loginIn',
            'name' => $this->user,
            'password' => $this->pass
        );
        $postData = $this->handleData($data);
        curl_setopt($http,CURLOPT_POSTFIELDS,$postData);
        $data = curl_exec($http);
        curl_close($http);
        return $data;
    }
    function getPhone($data = array()){
        $http = curl_init();
        curl_setopt($http,CURLOPT_URL,self::PHONE_LOGIN_URL);
        curl_setopt($http,CURLOPT_RETURNTRANSFER,1);
        $data['sid'] = $this->sid;
        $postData = $this->handleData($data);
        curl_setopt($http,CURLOPT_POSTFIELDS,$postData);
        $data = curl_exec($http);
        curl_close($http);
        return $data;
    }

    /**
     * 生成海报
     * @param $data
     * @return bool|string
     */
    public static function handlePoster($data){
        $s3Config = Yaf_Registry::get("config")->aws_s3->toArray();
        $fileLib = new Core_Lib_File($s3Config['appKey'], $s3Config['appSecret'], $s3Config['appBucket']);
        $bgImg = 'https://download.appmifile.com/949_updatepdf_in/20/09/2018/a19a1e6b-b8c7-4fb5-b8a0-6da7bcff206c.png';
        $numImg = 'http://i01.appmifile.com/webfile/globalimg/events/2018/mpr2018/16.png';
        $font = ROOT_PATH . '/data/mirun/SFNSDisplay.ttf';
        $bgSource = $fileLib->getImageSource($bgImg);
        $bg_w = imagesx($bgSource)  ; // 背景图片宽度
        $bg_h = imagesy($bgSource); // 背景图片高度
        $background = imagecreatetruecolor($bg_w,$bg_h);
        //字体颜色
        $textcolor = imagecolorallocate($background, 51, 51, 51);
        $icon = self::getCompressPic($data['icon']);
        $iconSource = $fileLib->getImageSource($icon);
        $icon_w = imagesx($iconSource);
        $icon_h = imagesy($iconSource);
        $dst_w = 215;
        $dst_h = 215;

        $dst_x = 355;
        $dst_y = 100;
        imagecopyresized($background,$iconSource,$dst_x,$dst_y,0,0,$dst_w,$dst_h,$icon_w,$icon_h);
        imagecopyresized($background,$bgSource,0,0,0,0,$bg_w,$bg_h,$bg_w,$bg_h);

        //总步数文字
        $length = strlen($data['total_steps']);
        $numSource = $fileLib->getImageSource($numImg);
        $num_w = imagesx($numSource)  ; // 背景图片宽度
        $num_h = imagesy($numSource); // 背景图片高度
        $start = $bg_w - ($bg_w-70*$length)/2 - 64;//64*80
        $tem = 10;
        $total_steps = $data['total_steps'];
        for ($i=0;$i<$length;$i++){
            imagecopyresized($background,$numSource,$start,620,0,0,$num_w,$num_h,$num_w,$num_h);
            $num = $total_steps%$tem;
            $num /= ($tem/10);
            imagettftext($background, 40, 0, $start+17, 678, $textcolor, $font, $num);
            $start -= 70;
            $total_steps /= 10;
        }
        //总人数文字
        $arr = imagettfbbox(32,0,$font,number_format($data['total']));
        $width = $arr[2] - $arr[0];
        imagettftext($background, 32, 0, ($bg_w-$width)/2, 825, $textcolor, $font, number_format($data['total']));


        //title三行文字
        $height = 390;
        $titles = array(
            $data['name'],
            'Участник номер ' . $data['index'],
            'Количество шагов ' . $data['steps']
        );
        foreach ($titles as $key => $title){
            $size = $key == 0 ? 36 : 30;
            $arr = imagettfbbox($size,0,$font,$title);
            $width = $arr[2] - $arr[0];
            imagettftext($background, $size, 0, ($bg_w-$width)/2, $height, $textcolor, $font, $title);
            $height += $key == 0? 48:47;
        }
        return self::uploadImage($background);

    }

    /**
     * 处理图片url，
     * @param $picurl
     * @return string
     */
    private function getCompressPic($picurl) {
        $dw = 320;
        $dh = 320;
        if (strpos($picurl, 'u01.appmifile.com') !== false) {
            $pre = substr($picurl, 0, strrpos($picurl, '.'));
            $mid = "!" . $dw . "x" . $dh . "x1";
            $suf = substr($picurl, strrpos($picurl, '.'));
            $picurl = $pre . $mid . $suf;
        }else{
            $pre = substr($picurl, 0, strrpos($picurl, '.'));
            $mid = "_" . $dw;
            $suf = substr($picurl, strrpos($picurl, '.'));
            $picurl = $pre . $mid . $suf;
        }
        return $picurl;
    }

    /**
     * 按长度分割字符串
     * @param $string
     * @param $length
     * @return array
     */
    private function substring($string,$length){
        $result = array();
        $index = 0;
        $new_string = mb_substr($string,$index,$length,'utf-8');

        while (!empty($new_string)){
            $result[] = $new_string;
            $index += $length;
            $new_string = mb_substr($string,$index,$length,'utf-8');
        }
        return $result;
    }

    /**
     * 上传图片，之前的上传坏掉了
     * @param $image
     * @return bool|string
     */
    private function uploadImage($image){
        $gcImgRes =  './mirun_' .rand(0,100).'_'. '.jpg';
        imagejpeg($image, $gcImgRes);
        imagedestroy($image);

        if (!is_file($gcImgRes)) {
            return false;
        }
        $post = array(
            'authId' => 106,
            'area'   => 'in',
            'img'    => self::base64EncodeImage($gcImgRes),
        );
        $url = "http://upload.global.mi.com/upload/Base64upload";
        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 100);
        $ret = curl_exec($ch);
        curl_close($ch);
        unlink($gcImgRes);
        $res = json_decode($ret, true);
        return self::changeUrl($res['url']);
    }

    /**
     * 展示图片
     * @param $img
     */
    function showImage($img){
        header('Content-Type: image/png');
        imagepng($img);
        imagedestroy($img);exit;

    }

    /**
     * base64编码图片
     * @param $image_file
     * @return string
     */
    private function base64EncodeImage($image_file)
    {
        $image_info   = getimagesize($image_file);
        $fp           = fopen($image_file, 'r');
        $image_data   = fread($fp, filesize($image_file));
        $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
        fclose($fp);
        return $base64_image;
    }

    /**
     * 更改生成图片的url协议
     * @param $url
     * @param string $protocol
     * @return string
     */
    private function changeUrl($url, $protocol = "https")
    {
        $end = strpos($url, "://");
        if ($end == false) {
            $end = strpos($url, "//");
            $url = ":" . $url;
        }
        return $protocol . substr($url, $end);
    }

    /**
     * 给数字添加对应后缀
     * @param $cdnl
     * @return string
     */
    function ordinal($cdnl){
        $test_c = abs($cdnl) % 10;
        $ext = ((abs($cdnl) %100 < 21 && abs($cdnl) %100 > 4) ? 'th'
            : (($test_c < 4) ? ($test_c < 3) ? ($test_c < 2) ? ($test_c < 1)
                ? 'th' : 'st' : 'nd' : 'rd' : 'th'));
        return $cdnl.$ext;
    }

    /**
     * @param $img string 图片位置或url
     * @return mixed
     *
     */
    public function getImageSource($img){
        $pathInfo    = pathinfo($img);
        switch( strtolower($pathInfo['extension']) ) {
            case 'jpg':
            case 'jpeg':
                $imagecreatefromjpeg    = 'imagecreatefromjpeg';
                break;
            case 'png':
                $imagecreatefromjpeg    = 'imagecreatefrompng';
                break;
            case 'gif':
            default:
                $imagecreatefromjpeg    = 'imagecreatefromstring';
                $img    = file_get_contents($img);
                break;
        }
        return $imagecreatefromjpeg($img);
    }
}
