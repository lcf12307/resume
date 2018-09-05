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
    const emailUrl = "https://i.51job.com/resume/ajax/userinfo_edit.php";    //修改用户信息
    const emailCodeUrl = "https://login.51job.com/ajax/verifycode.php?type=2&from_domain=i.51job.com";     //获取验证邮件参数url
    const statusUrl = "https://i.51job.com/resume/ajax/resume_complete.php?userid=379795114&isenglish=c&action=get";    //获取邮件状态
    const salaryUrl = 'https://i.51job.com/resume/ajax/salary.php?action=save';
    const loginCodeUrl = 'https://login.51job.com/ajax/verifycode.php?type=33&from_domain=i';   //登录获取验证码
    const educationUrl = 'https://i.51job.com/resume/ajax/education.php?action=save';   //修改教育经历
    const uidUrl = 'https://i.51job.com/resume/resume_center.php?lang=c'; //
    function upload(){

        $cookie = 'protected/data/cookies/51job';
        $result = $this->login();
        $result = $this->getResumes($cookie);
//        $result = $this->uploadBasic($cookie);
//        $result = $this->getVerifyCode($cookie);
//        $result = $this->uploadEmail($cookie);
//        $result = $this->uploadPhone($cookie);
//        $result = $this->uploadSalary($cookie);
        echo mb_convert_encoding($result, 'utf-8', 'gbk');exit;
        //添加header 输出png


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
		return array(
			'code' => -1,
			'info' => ' email verify fail!'
		);
	}
	$post_data = array(
            'action_type' => 'save',
            'action' => 'user_email',
            'newemail' => 'lcf12307@qq.com',    //新邮箱
            'vldcode' => $result['result'],    //验证码
            'isenglish' => 'c'
        );
        return $util->post(self::emailUrl, $post_data, $cookie);
    }

    function getVerifyCode($cookie){
        $util = new Util();
        $result = $util->get(self::emailCodeUrl, array(), $cookie);
	$result = bin2hex($result);
	$result = $util->recv_byte($result);
	return $result;
        @ header("Content-Type:image/png");
        echo $result;exit;
    }

    function getResumes($cookie){
        $util = new Util();
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
