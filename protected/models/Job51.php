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
    const checkUrl = "https://i.51job.com/userset/my_51job.php?lang=c";  //检查登录
    const emailUrl = "https://i.51job.com/resume/ajax/userinfo_edit.php";    //修改用户信息
    const emailCodeUrl = "https://login.51job.com/ajax/verifycode.php?type=2&from_domain=i.51job.com";     //获取验证邮件参数url
    const statusUrl = "https://i.51job.com/resume/ajax/resume_complete.php?userid=379795114&isenglish=c&action=get";    //获取邮件状态
    const salaryUrl = 'https://i.51job.com/resume/ajax/salary.php?action=save';
    const loginCodeUrl = 'https://login.51job.com/ajax/verifycode.php?type=33&from_domain=i';   //登录获取验证码
    const educationUrl = 'https://i.51job.com/resume/ajax/education.php?action=save';   //修改教育经历
    const uidUrl = 'https://i.51job.com/resume/resume_center.php?lang=c';               //获取简历id
    const newResumeUrl = 'https://i.51job.com/resume/standard_resume.php?lang=c';       //新建简历
    function upload(){

        $cookie = 'protected/data/cookies/51job';
        $result = $this->login();
        $result = $this->check($cookie);
//        $resume_id = $this->getResumes($cookie);
//        $result = $this->uploadBasic($cookie);
//        $result = $this->getVerifyCode($cookie);
//        $result = $this->uploadEmail($cookie);
//        $result = $this->uploadPhone($cookie);
//        $result = $this->uploadSalary($cookie, $resume_id);
        echo mb_convert_encoding($result, 'utf-8', 'gbk');exit;

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
     * 检查登录状态
     * @param $cookie
     */
    function check($cookie){
        $util = new Util();
        $result = $util->get(self::checkUrl, array(), $cookie);
        $result = mb_convert_encoding($result, 'utf-8', 'gbk');
        $status = (strstr($result, 'uname e_icon at') != false)? true : false;
        var_dump($status);exit;
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
            'userid' => '379834384',
            'cname' => '超1凡',    //名字
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


    function uploadSalary($cookie){
        $util = new Util();
        $post_data = array(
            'isenglish' => 'c',
            'userid' => '',
            'salary' => 120,
            'basesalary' => 10, //基本工资
            'bonus' => 30,  //补贴
            'allowance' => 30, //奖金佣金
            'stock' => 30,  //股权收益
        );
        return $util->post(self::salaryUrl, $post_data, $cookie);
    }
    /**
     * 上传手机
     * 如果本身有注册手机号则不需要
     * @param $cookie
     */
    function uploadPhone($cookie){
        $util = new Util();
        $result = $util->getToken();
        $token = explode('|', $result);
        $token = $token[0];


        //获取手机号
        $data = array(
            'action' => 'getPhone',
            'token' => $token
        );
        $result = $util->getPhone($data);
        //获取信息
        $data = array(
            'action' => 'getMessage',
            'token' => $token,
            'phone' => $result,
        );
        $result = $util->getPhone($data);
        //释放手机
        $data = array(
            'action' => 'cancelRecv',
            'token' => $token,
            'phone' => $result,
        );
        $result = $util->getPhone($data);
        var_dump($result);exit;
    }

    /**
     * 上传邮箱
     * @param $cookie
     * @return array
     */
    function uploadEmail($cookie){
        $util = new Util();
        $result = $this->getVerifyCode($cookie);
	    if($result['info'] != 1){
            echo $result;exit;
	    }
        $post_data = array(
                'action_type' => 'save',
                'action' => 'user_email',
                'newemail' => 'lcf12307@163.com',    //新邮箱
                'vldcode' => $result['result'],    //验证码
                'isenglish' => 'c'
            );
	    return $util->post(self::emailUrl, $post_data, $cookie);
    }

    /**
     * @param $cookie
     * @param $type    获取验证码的方式  0是登录时获取，1是邮箱验证的时候获取
     * @return mixed|string
     */
    function getVerifyCode($cookie, $type = 1){
        switch ($type){
            case 0: $url = self::loginCodeUrl;break;
            case 1: $url = self::emailCodeUrl;break;
            default: $url = self::emailCodeUrl;
        }
        $util = new Util();
        $result = $util->get($url, array(), $cookie);
        $result = bin2hex($result);
        $result = $util->recv_byte($result);
        return json_decode($result, true);
    }

    function getResumes($cookie){
        $util = new Util();
        //新建一个简历，并且保存
        $util->get(self::newResumeUrl, array(), $cookie);
        $this->uploadBasic($cookie, array());
        $result = $util->get(self::uidUrl, array(), $cookie);
        $result = mb_convert_encoding($result, 'utf-8', 'gbk');
        preg_match_all('/resumeid=(.*?)>/', $result, $resumes);
        $result = array();
        foreach ($resumes[1] as $key => $value){
            if ($key%2 == 1){
                $result[] = $value;
            }
        }
        return $result;

    }
}
