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

    function getSites(){
        return array(
            1 => '51job',
//            2 => '上海',
//            3 => '天津',
//            4 => '武汉'
        );

    }
}
