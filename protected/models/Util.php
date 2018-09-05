<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-4
 * Time: 下午3:42
 */


class Util extends CFormModel
{
    private $user = 'a6456833';
    private $pass = 'a123456';
    private $sid = '1897465132';
    const VERIFY_URL =  'http://api2.sz789.net:88/RecvByte.ashx';
    const PHONE_LOGIN_URL =  'http://api.ndd001.com/do.php';
    function login($url = '', $post_data = array()) {
        if (empty($url) || empty($post_data)) {
            return false;
        }

        $post_data = $this->handleData($post_data);
        $file = explode('.', $url);
        $file = $file[1];
        $cookie_jar = 'protected/data/cookies/'. $file ;//tempnam('.', 'cookie');
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

    function getArea(){
        $s = "<html><body><div id=\"base_area_click_init\" class=\"panel_lnp panel_py panel_ct con_m\"><h2 id=\"base_area_click_top\"><p id=\"base_area_click_top_message\">选择地区</p><a class=\"base_area_click_close\" href=\"javascript:void(0);\"><i></i></a></h2><div id=\"base_area_click_center\" class=\"panel_selt\"><ul id=\"base_area_click_center_left\" class=\"sbar\"><li id=\"base_area_click_center_left_each_000000\" class=\"on\" data-value=\"000000\">热门城市<em></em></li><li id=\"base_area_click_center_left_each_092200\" class=\"\" data-value=\"092200\">A B C<em></em></li><li id=\"base_area_click_center_left_each_091700\" class=\"\" data-value=\"091700\">D E F G<em></em></li><li id=\"base_area_click_center_left_each_220200\" class=\"\" data-value=\"220200\">H I<em></em></li><li id=\"base_area_click_center_left_each_220900\" class=\"\" data-value=\"220900\">J K<em></em></li><li id=\"base_area_click_center_left_each_300200\" class=\"\" data-value=\"300200\">L M N<em></em></li><li id=\"base_area_click_center_left_each_091000\" class=\"\" data-value=\"091000\">O P Q R<em></em></li><li id=\"base_area_click_center_left_each_171800\" class=\"\" data-value=\"171800\">S T U<em></em></li><li id=\"base_area_click_center_left_each_100700\" class=\"\" data-value=\"100700\">V W X<em></em></li><li id=\"base_area_click_center_left_each_102000\" class=\"\" data-value=\"102000\">Y Z<em></em></li><li id=\"base_area_click_center_left_each_030000\" class=\"\" data-value=\"030000\">所有省份(含港澳台)<em></em></li><li id=\"base_area_click_center_left_each_360000\" class=\"\" data-value=\"360000\">国外<em></em></li></ul><div id=\"base_area_click_center_right\" class=\"con\"><div id=\"base_area_click_center_right_list_000000\" class=\"base_area_click_center_right_list de d3\"><table><tbody><tr><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_010000\" data-value=\"010000\" data-navigation=\"000000\" class=\"\">北京</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_020000\" data-value=\"020000\" data-navigation=\"000000\" class=\"\">上海</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_030200\" data-value=\"030200\" data-navigation=\"000000\" class=\"\">广州</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_040000\" data-value=\"040000\" data-navigation=\"000000\" class=\"\">深圳</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_180200\" data-value=\"180200\" data-navigation=\"000000\" class=\"\">武汉</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_200200\" data-value=\"200200\" data-navigation=\"000000\" class=\"\">西安</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_080200\" data-value=\"080200\" data-navigation=\"000000\" class=\"\">杭州</em></td></tr><tr class=\"base_area_click_center_right_list_sub_category\" id=\"base_area_click_center_right_list_sub_category_000000_010000\"><td colspan=\"7\"><div class=\"in d0\"><font style=\"left:12px\"></font><div><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_010000\" class=\" base_area_click_center_right_list_sub_category_each_all\" data-value=\"010000\" data-navigation=\"000000\">所有</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_010100\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"010100\" data-navigation=\"000000\">东城区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_010200\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"010200\" data-navigation=\"000000\">西城区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_010500\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"010500\" data-navigation=\"000000\">朝阳区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_010600\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"010600\" data-navigation=\"000000\">丰台区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_010700\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"010700\" data-navigation=\"000000\">石景山区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_010800\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"010800\" data-navigation=\"000000\">海淀区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_010900\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"010900\" data-navigation=\"000000\">门头沟区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_011000\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"011000\" data-navigation=\"000000\">房山区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_011100\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"011100\" data-navigation=\"000000\">通州区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_011200\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"011200\" data-navigation=\"000000\">顺义区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_011300\" class=\"base_area_click_center_right_list_sub_category_each_unit on\" data-value=\"011300\" data-navigation=\"000000\">昌平区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_011400\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"011400\" data-navigation=\"000000\">大兴区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_011500\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"011500\" data-navigation=\"000000\">怀柔区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_011600\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"011600\" data-navigation=\"000000\">平谷区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_011700\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"011700\" data-navigation=\"000000\">密云区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_011800\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"011800\" data-navigation=\"000000\">延庆区</em></span></div></div></td></tr><tr class=\"base_area_click_center_right_list_sub_category\" id=\"base_area_click_center_right_list_sub_category_000000_020000\" style=\"display: none;\"><td colspan=\"7\"><div class=\"in d0\"><font style=\"left:125px\"></font><div><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_020000\" class=\" base_area_click_center_right_list_sub_category_each_all\" data-value=\"020000\" data-navigation=\"000000\">所有</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_020100\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"020100\" data-navigation=\"000000\">黄浦区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_020300\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"020300\" data-navigation=\"000000\">徐汇区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_020400\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"020400\" data-navigation=\"000000\">长宁区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_020500\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"020500\" data-navigation=\"000000\">静安区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_020600\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"020600\" data-navigation=\"000000\">普陀区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_020800\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"020800\" data-navigation=\"000000\">虹口区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_020900\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"020900\" data-navigation=\"000000\">杨浦区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_021000\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"021000\" data-navigation=\"000000\">浦东新区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_021100\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"021100\" data-navigation=\"000000\">闵行区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_021200\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"021200\" data-navigation=\"000000\">宝山区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_021300\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"021300\" data-navigation=\"000000\">嘉定区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_021400\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"021400\" data-navigation=\"000000\">金山区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_021500\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"021500\" data-navigation=\"000000\">松江区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_021600\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"021600\" data-navigation=\"000000\">青浦区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_021800\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"021800\" data-navigation=\"000000\">奉贤区</em></span><span><em id=\"base_area_click_center_right_list_sub_category_each_000000_021900\" class=\"base_area_click_center_right_list_sub_category_each_unit \" data-value=\"021900\" data-navigation=\"000000\">崇明区</em></span></div></div></td></tr><tr><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_070200\" data-value=\"070200\" data-navigation=\"000000\" class=\"\">南京</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_090200\" data-value=\"090200\" data-navigation=\"000000\" class=\"\">成都</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_060000\" data-value=\"060000\" data-navigation=\"000000\" class=\"\">重庆</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_030800\" data-value=\"030800\" data-navigation=\"000000\" class=\"\">东莞</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_230300\" data-value=\"230300\" data-navigation=\"000000\" class=\"\">大连</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_230200\" data-value=\"230200\" data-navigation=\"000000\" class=\"\">沈阳</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_070300\" data-value=\"070300\" data-navigation=\"000000\" class=\"\">苏州</em></td></tr><tr><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_250200\" data-value=\"250200\" data-navigation=\"000000\" class=\"\">昆明</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_190200\" data-value=\"190200\" data-navigation=\"000000\" class=\"\">长沙</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_150200\" data-value=\"150200\" data-navigation=\"000000\" class=\"\">合肥</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_080300\" data-value=\"080300\" data-navigation=\"000000\" class=\"\">宁波</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_170200\" data-value=\"170200\" data-navigation=\"000000\" class=\"\">郑州</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_050000\" data-value=\"050000\" data-navigation=\"000000\" class=\"\">天津</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_120300\" data-value=\"120300\" data-navigation=\"000000\" class=\"\">青岛</em></td></tr><tr><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_120200\" data-value=\"120200\" data-navigation=\"000000\" class=\"\">济南</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_220200\" data-value=\"220200\" data-navigation=\"000000\" class=\"\">哈尔滨</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_240200\" data-value=\"240200\" data-navigation=\"000000\" class=\"\">长春</em></td><td class=\"js_more\" name=\"0\"><em id=\"base_area_click_center_right_list_category_000000_110200\" data-value=\"110200\" data-navigation=\"000000\" class=\"\">福州</em></td></tr></tbody></table></div><div class=\"declear\"></div></div><div class=\"clear\"></div></div></div></body></html>";
        $spans =  $this->regular_tags('span', $s);
        $spans = $spans[0];
        $result = array();

        foreach ($spans as $span){
            preg_match('/data-navigation="000000">(.*?)<\/em>/', $span, $value);
            preg_match('/data-value="(.*?)"/', $span, $key);
            $result[$key[1]] = $value[1];
            if ($value[1] == '所有'){
                var_dump($span);exit;
            }
        }
        var_dump($result);exit;

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

}
