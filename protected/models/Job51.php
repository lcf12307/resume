<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-4
 * Time: 下午3:16
 */

class Job51 extends CFormModel
{
    private $username;
    private $password;
    const loginUrl = "https://login.51job.com/login.php?lang=c";        //登录url
    const baseUrl = "https://i.51job.com/resume/ajax/base_detail.php?action=save";       //修改基础信息
    const resumeUrl = "https://i.51job.com/resume/ajax/resume_complete.php?userid=379795114&rsmname=resume&isenglish=c&action=save"; //修改简历名字
    const phoneCodeUrl = "https://login.51job.com/ajax/sendphonecode.php?mobile=17338128781&nation=CN&isEnglish=c&type=10";  //发送手机验证码
    const checkUrl = "https://login.51job.com/ajax/checkinfo.php?jsoncallback=jQuery183012269767961235134_1536055739504&value=lcf12307%40sina.com&type=useremail";  //检查格式 暂时没有用到
    const emailUrl = "https://i.51job.com/resume/ajax/userinfo_edit.php?0.1903854190464287";    //发送验证邮件
    const emailCodeUrl = "https://login.51job.com/ajax/verifycode.php?type=2&from_domain=i.51job.com&t=1536056288";     //获取验证邮件参数url
    const statusUrl = "https://i.51job.com/resume/ajax/resume_complete.php?userid=379795114&isenglish=c&action=get";    //获取邮件状态
    function upload(){

        $result = $this->login();
        $result = $this->uploadBasic($result['cookie']);

        var_dump($result);exit;

    }

    /**
     * 登录
     * @return array|bool
     */
    function login(){
        $util = new Util();
        $post_data = array(
            'lang' => 'c',
            'action' => 'save',
            'from_domain' => 'i',
            'loginname' => '13121152878',
            'password' => 'bnm,.123',
            'verifycode' => '',
            'isread' => 'on'
        );
        return $util->login(self::loginUrl, $post_data);

    }

    /**
     * 修改基础信息
     * @param $cookie
     * @return array
     */
    function uploadBasic($cookie){
        $util = new Util();
        $post_data = array(
            'isenglish' => 'c',     //默认为c
            'userid' => '',
            'cname' => '超凡',    //名字
            'efirstname' => '',
            "ename" => "",
            "sex" => "0",
            "workyear" => "2013",
            "mobilephone" => "13121152878",
            "email" => "lcf12307@sina.com",
            "current_situation" => "1",
            "area" => "010500",
            "idtype" => "0",
            "idcard" => "",
            "hukou" => "",
            "marriage" => "",
            "politics_status" => "",
            "contacttype" => "00",
            "othercontacts" => "",
            "stature" => "",        //身高
            "address" => "",
            "zipcode" => "",
            "homepage" => "",
            "birthday" => "1996/11/01"
        );
        return $util->post(self::baseUrl, $post_data, $cookie);
    }

    /**上传手机
     * @param $cookie
     */
    function uploadPhone($cookie){

    }

    /**
     * 上传邮箱
     * @param $cookie
     */
    function uploadEmail($cookie){

    }
}
