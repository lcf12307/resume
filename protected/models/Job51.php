<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-4
 * Time: 下午3:16
 */

class Job51 extends CFormModel
{

    private $cookie;
    private $domain = '51job';    //网站名
    private $params = array();
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
    const uidUrl = 'https://i.51job.com/resume/resume_center.php?lang=c';               //获取简历id
    const newResumeUrl = 'https://i.51job.com/resume/standard_resume.php?lang=c';       //新建简历

    const intentionUrl = 'https://i.51job.com/resume/ajax/intention.php?action=save';                       //求职意向

    const commonUrl = 'https://i.51job.com/resume/ajax/%s.php?action=%s';                                   //通用url
    const workUrl = 'https://i.51job.com/resume/ajax/work.php?action=save';                                 //工作经历
    const schoolAwardUrl = 'https://i.51job.com/resume/ajax/schoolaward.php?action=save';                   // 校内荣誉
    const schoolJobUrl = 'https://i.51job.com/resume/ajax/schooljob.php?action=save';                       //校内职务
    const projectUrl = 'https://i.51job.com/resume/ajax/project.php?action=save';                           //项目经历
    const educationUrl = 'https://i.51job.com/resume/ajax/education.php?action=save';                       //教育经历
    const skillLanguageUrl = 'https://i.51job.com/resume/ajax/skilllanguage.php?action=save';               //技能语言
    const skillCertificationUrl = 'https://i.51job.com/resume/ajax/skillcertification.php?action=save';     //证书
    const skillTrainUlr = 'https://i.51job.com/resume/ajax/skilltrain.php?action=save';                     //培训经历

    //todo 删除多余信息， 上传头像，上传更多信息的功能，信息存到数据库里
    function upload(){

        $this->params = array(
            //登录信息
            'loginname' => '13121152878',
            'password' => 'bnm,.123',
            'verifycode' => '',
            //简历id
            'resume_id' => '',
            //基础信息
            'isenglish' => 'c',     //默认为c
            'cname' => 'ouyangjiang',    //名字
            'efirstname' => '',
            "ename" => "",
            "sex" => "1",
            "workyear" => "2013",
            "mobilephone" => "13121152878",
            "email" => "lcf12307@qq.com",
            "current_situation" => "3",     //当前工作状态， 0是正在找，3是观望中，4是不想找
            "area" => "010500",
            "idtype" => "0",
            "idcard" => "",
            "hukou" => "",
            "marriage" => "",
            "politics_status" => "",
            "contacttype" => "00",
            "othercontacts" => "",
            "stature" => "",        //身高
            "address" => "",        //地址
            "zipcode" => "",
            "homepage" => "",
            "birthday" => "1996/11/01",
            //薪酬信息
            'salary' => 100,
            'basesalary' => 12, //基本工资
            'bonus' => 32,  //补贴
            'allowance' => 32, //奖金佣金
            'stock' => 24,  //股权收益
            //求职意向
            "seektype" => "1",                      // 0 全职 1，兼职， 2实习，3， 全职兼职
            "expectindustry" => "02,39",            //期望行业
            "expectfunc" => "2607,2601",            //期望职能
            "expectarea" => "040000,030800,060000",//期望地区
            "selfintro" => "自我评价",      //自我评价
            "entrytime" => "1",             //入职时间  1随时，2 一周内3，一月内，4，三个月内，5，待定
            "resumekey" => "1 2",           //个人标签
            "salarytype" => "4",            //薪资类型 1是月薪，4是年薪，3日薪,2时薪
            "expectposition" => "1",        //期望职位
            "inputsalary" => "01",          //收入钱数 自定义是8-10格式
            //工作经历
            'work' => array(
                array(
                    "workid" => "",
                    "timefrom" => "2014/1",
                    "timeto" => "2015/1",
                    "ccompname" => "美的集团",
                    "workfunc" => "2903",
                    "workindustry" => "35",
                    "cposition" => "电子工程师/技术员",
                    "companysize" => "1",
                    "cdepartment" => "info",
                    "companytype" => "01",
                    "cworkdescribe" => "success",
                    "worktype" => "0",
                    "reportperson" => "100",
                    "creportboss" => "1",
                    "cleavereason" => "no",
                    "cscore" => "wo",
                    "isoverseas" => "0"
                )
            ),
            //校内奖励
            'schoolaward' => array(
                array(
                    "bonusid" => "",
                    "bonustime" => "2008/1",   //获奖时间
                    "cbonusname" => "奖项",        //奖项
                    "cbonusclass" => "级别"        //级别
                ),
            ),
            //校内工作
            'schooljob' => array(
                array(
                    "practiceid" => "",
                    "starttime" => "2010/1",    //开始时间
                    "endtime" => "",            //至今为空
                    "cname" => "职务",             //职务
                    "cdescribe" => "职务描述"          //职务描述
                )
            ),
            //项目经历
            'project' => array(
                array(
                    "projectid" => "",
                    "starttime" => "2006/2",    //开始时间
                    "endtime" => "",            //结束时间
                    "cprojectname" => "项目名",      //项目名
                    "cdescribe" => "项目描述",         //项目描述
                    "cfunction" => "责任描述",         //责任描述
                    "ccompname" => "所属公司"    //所属公司
                )
            ),
            //教育经历
            'education' => array(
                array(
                    "eduid" => "",
                    "timefrom" => "2014/9",     //入学时间
                    "timeto" => "2018/7",             //结束时间
                    "cschoolname" => "安徽大学", // 大学名字
                    "major" => "0718",          //专业id
                    "cmajordes" => "对外汉语",//专业名
                    "degree" => "6",            //学历    1初中及以下，2，高中，3中技，4中专，5，大专，6，本科，7硕士,8博士，9MBA
                    "cdescribe" => "专业描述",         //专业描述
                    "isoverseas" => "0",        //海外经历
                    "isfulltime" => "1"         //全日制
                )
            ),
            //语言技能
            'skilllanguage' => array(
                array(
                    "itskillid" => "",
                    "ittype" => "0205",         //技能id
                    "ability" => "1",           //2一般，3良好，1，熟练，0精通
                    "skillsname" => ""          //为空
                )
            ),
            //证书
            'skillcertification' => array(
                array(
                    "certid" => "",
                    "certlist" => "0126",   //证书id
                    "certname" => "",
                    "getdate" => "2017/9",  //获取时间
                    "score" => "100"          //成绩
                )
            ),
            //培训
            'skilltrain' => array(
                array(
                    "trainid" => "",
                    "timefrom" => "2016/2",//开始
                    "timeto" => "2018/1",         //结束
                    "ctrainname" => "培训机构",    //培训机构
                    "ctrainplace" => "培训地点",   //培训地点
                    "ctrainlesson" => "培训课程",  //培训课程
                    "cdescribe" => "培训描述"      //培训描述
                )
            )
        );

        $result = $this->login();
        $this->cookie = $result['cookie'];
        $status = $this->check();
        if (!$status){
            $this->params['verifycode'] = $this->getVerifyCode( 0);
            $result = $this->login();
            $this->cookie = $result['cookie'];
            $status = $this->check();
            if (!$status){
                echo json_encode(array(
                    'code' => -2,
                    'msg' => 'job51 login error'
                ));exit;
            }
        }
        $this->params['resume_id'] = $this->getResumes();
        $this->uploadBasic();
        $this->uploadEmail();
        // todo 暂时不开发上传手机的功能
//        $result = $this->uploadPhone();
        $this->uploadSalary();
        $info = array(
            'basic' => array(),
            'domain' => $this->domain
        );
        $columns = array(
            'loginname',
            'password',
            'resume_id'
        );
        foreach ($this->params as $key => $value) {
            if (is_array($value)){
                $url = vsprintf(self::commonUrl, array($key, 'save'));
                foreach ($value as $data){
                    $this->uploadCommon($data, $url);
                }
                $info[$key] = json_encode($value);
            } else {
                $info['basic'][$key] = $value;
                if (in_array($key, $columns)){
                    $info[$key] = $value;
                }
            }
        }
        $info['basic'] = json_encode($info['basic']);

        //todo 把info存入数据库


    }

    /**
     * 登录
     * @param array
     * @return array|bool
     */
    function login(){
        $util = new Util();
        $post_data = array(
            'lang' => 'c',
            'action' => 'save',
            'from_domain' => 'i',
            'loginname' => $this->params['loginname'],
            'password' => $this->params['password'],
            'verifycode' => $this->params['verifycode'],
            'isread' => 'on'
        );
        return $util->login(self::loginUrl, $post_data);

    }

    /**
     * 检查登录状态
     * @param $cookie
     * @return boolean
     */
    function check(){
        $util = new Util();
        $result = $util->get(self::checkUrl, array(), $this->cookie);
        $result = mb_convert_encoding($result, 'utf-8', 'gbk');
        $result = strstr($result, 'uname e_icon at') ;
        return ($result != false)? $result : false;

    }
    /**
     * 修改基础信息
     * @param $cookie
     * @return array
     */
    function uploadBasic(){
        $util = new Util();
        $post_data = array(
            'isenglish' => $this->params['isenglish'],     //默认为c
            'userid' => $this->params['resume_id'],
            'cname' => $this->params['cname'],    //名字
            'efirstname' => $this->params['efirstname'],
            "ename" => $this->params['ename'],
            "sex" => $this->params['sex'],
            "workyear" => $this->params['workyear'],
            "mobilephone" => $this->params['mobilephone'],
            "email" => $this->params['email'],
            "current_situation" => $this->params['current_situation'],
            "area" => $this->params['area'],
            "idtype" => $this->params['idtype'],
            "idcard" => $this->params['idcard'],
            "hukou" => $this->params['hukou'],
            "marriage" => $this->params['marriage'],
            "politics_status" => $this->params['politics_status'],
            "contacttype" => $this->params['contacttype'],
            "othercontacts" => $this->params['othercontacts'],
            "stature" => $this->params['stature'],        //身高
            "address" => $this->params['address'],
            "zipcode" => $this->params['zipcode'],
            "homepage" => $this->params['homepage'],
            "birthday" => $this->params['birthday']
        );
        return $util->post(self::baseUrl, $post_data, $this->cookie);
    }

    /**
     * 上传薪酬相关
     * @param $cookie
     * @return mixed
     */
    function uploadSalary(){
        $util = new Util();
        $post_data = array(
            'isenglish' => $this->params['isenglish'],
            'userid' => $this->params['resume_id'],
            'salary' => $this->params['salary'],
            'basesalary' => $this->params['basesalary'], //基本工资
            'bonus' => $this->params['bonus'],  //补贴
            'allowance' => $this->params['allowance'], //奖金佣金
            'stock' => $this->params['stock'],  //股权收益
        );
        return $util->post(self::salaryUrl, $post_data, $this->cookie);
    }

    //上传更多信息
    function uploadCommon($data, $url){
        $util = new Util();
        $data['isenglish'] = $this->params['isenglish'];
        $data['userid'] = $this->params['resume_id'];
        return $util->post($url, $data, $this->cookie);
    }

    /**
     * 上传求职意向
     * @return mixed
     */
    function uploadIntention(){
        $util = new Util();
        $data = array(
            "isenglish" => $this->params['isenglish'],
            "userid" => $this->params['resume_id'],
            "seektype" => $this->params['seektype'],
            "expectindustry" => $this->params['expectindustry'],
            "expectfunc" => $this->params['expectfunc'],
            "expectarea" => $this->params['expectarea'],
            "selfintro" => $this->params['selfintro'],
            "entrytime" => $this->params['entrytime'],
            "resumekey" => $this->params['resumekey'],
            "salarytype" => $this->params['salarytype'],
            "expectposition" => $this->params['expectposition'],
            "inputsalary" => $this->params['inputsalary']
        );
        return $util->post(self::intentionUrl, $data, $this->cookie);
    }


    /**
     * 上传头像
     */
    function uploadAvatar(){

    }
    /**
     * 上传手机
     * 如果本身有注册手机号则不需要
     * @param $cookie
     */
    function uploadPhone(){
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
    function uploadEmail(){
        $util = new Util();
        $result = $this->getVerifyCode($this->cookie);
	    if($result['info'] != 1){
            echo $result;exit;
	    }
        $post_data = array(
                'action_type' => 'save',
                'action' => 'user_email',
                'newemail' => $this->params['email'],    //新邮箱
                'vldcode' => $result['result'],    //验证码
                'isenglish' => 'c'
            );
	    return $util->post(self::emailUrl, $post_data, $this->cookie);
    }

    /**
     * @param $cookie
     * @param $type    获取验证码的方式  0是登录时获取，1是邮箱验证的时候获取
     * @return mixed|string
     */
    function getVerifyCode($type = 1){
        switch ($type){
            case 0: $url = self::loginCodeUrl;break;
            case 1: $url = self::emailCodeUrl;break;
            default: $url = self::emailCodeUrl;
        }
        $util = new Util();
        $result = $util->get($url, array(), $this->cookie);
        $result = bin2hex($result);
        $result = $util->recv_byte($result);
        return json_decode($result, true);
    }

    function getResumes(){
        $util = new Util();
        //新建一个简历，并且保存
        $util->get(self::newResumeUrl, array(), $this->cookie);
        $this->uploadBasic($this->cookie);
        $result = $util->get(self::uidUrl, array(), $this->cookie);
        $result = mb_convert_encoding($result, 'utf-8', 'gbk');
        preg_match_all('/resumeid=(.*?)">/', $result, $resumes);
        $result = array();
        foreach ($resumes[1] as $key => $value){
            if ($key%2 == 1){
                $result[] = $value;
            }
        }
        return empty($result)?'':$result[count($result)-1];

    }
}
