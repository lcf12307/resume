<?php
/**
 * Created by PhpStorm.
 * User: cf
 * Date: 18-9-12
 * Time: 上午10:07
 */

$util = new Util();
return array(
    'title'=>'请输入简历信息',

    'elements'=>array(
        'type' => array(
            'type' => 'dropdownlist',
            'items' => $util->getSites(),
            'prompt' => '请选择需要上传简历的网站'
        ),
       'basic' => array(
           'type' => 'form',
           'title'=>'基础信息',
           'elements'=>array(
               'cname'=>array(
                   'type'=>'text',
               ),
               'efirstname'=>array(
                   'type'=>'text',
               ),
               'ename'=>array(
                   'type'=>'text',
               ),
               'sex'=>array(
                   'type'=>'text',
               ),
               'workyear'=>array(
                   'type'=>'text',
               ),
               'mobilephone'=>array(
                   'type'=>'text',
               ),
               "email" => array(
                   'type'=>'text',
               ),
               "current_situation" => array(
                   'type'=>'text',
               ),   //当前工作状态， 0是正在找，3是观望中，4是不想找
               "area" => array(
                   'type'=>'text',
               ),
               "idtype" => array(
                   'type'=>'text',
               ),
               "idcard" => array(
                   'type'=>'text',
               ),
               "hukou" => array(
                   'type'=>'text',
               ),
               "marriage" => array(
                   'type'=>'text',
               ),
               "politics_status" => array(
                   'type'=>'text',
               ),
               "contacttype" => array(
                   'type'=>'text',
               ),
               "othercontacts" => array(
                   'type'=>'text',
               ),
               "stature" =>array(
                   'type'=>'text',
               ),     //身高
               "address" => array(
                   'type'=>'text',
               ),       //地址
               "zipcode" => array(
                   'type'=>'text',
               ),
               "homepage" => array(
                   'type'=>'text',
               ),
               "birthday" => array(
                   'type'=>'text',
               ),
               //薪酬信息
               'salary' => array(
                   'type'=>'text',
               ),
               'basesalary' => array(
                   'type'=>'text',
               ), //基本工资
               'bonus' => array(
                   'type'=>'text',
               ),  //补贴
               'allowance' => array(
                   'type'=>'text',
               ), //奖金佣金
               'stock' => array(
                   'type'=>'text',
               ), //股权收益
               //求职意向
               "seektype" => array(
                   'type'=>'text',
               ),                      // 0 全职 1，兼职， 2实习，3， 全职兼职
               "expectindustry" => array(
                   'type'=>'text',
               ),           //期望行业
               "expectfunc" => array(
                   'type'=>'text',
               ),           //期望职能
               "expectarea" => array(
                   'type'=>'text',
               ),//期望地区
               "selfintro" =>array(
                   'type'=>'text',
               ),     //自我评价
               "entrytime" => array(
                   'type'=>'text',
               ),           //入职时间  1随时，2 一周内3，一月内，4，三个月内，5，待定
               "resumekey" => array(
                   'type'=>'text',
               ),           //个人标签
               "salarytype" => array(
                   'type'=>'text',
               ),          //薪资类型 1是月薪，4是年薪，3日薪,2时薪
               "expectposition" => array(
                   'type'=>'text',
               ),        //期望职位
               "inputsalary" => array(
                   'type'=>'text',
               ),        //收入钱数
           ),

       ),
        'work' => array(
            "workid" => array(
                'type'=>'text',
            ),
            "timefrom" => array(
                'type'=>'text',
            ),
            "timeto" => array(
                'type'=>'text',
            ),
            "ccompname" => array(
                'type'=>'text',
            ),
            "workfunc" =>array(
                'type'=>'text',
            ),
            "workindustry" => array(
                'type'=>'text',
            ),
            "cposition" => array(
                'type'=>'text',
            ),
            "companysize" => array(
                'type'=>'text',
            ),
            "cdepartment" =>array(
                'type'=>'text',
            ),
            "companytype" => array(
                'type'=>'text',
            ),
            "cworkdescribe" => array(
                'type'=>'text',
            ),
            "worktype" => array(
                'type'=>'text',
            ),
            "reportperson" => array(
                'type'=>'text',
            ),
            "creportboss" => array(
                'type'=>'text',
            ),
            "cleavereason" => array(
                'type'=>'text',
            ),
            "cscore" => array(
                'type'=>'text',
            ),
            "isoverseas" => array(
                'type'=>'text',
            ),
        ),
        'schoolaward' => array(

        ),
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
);