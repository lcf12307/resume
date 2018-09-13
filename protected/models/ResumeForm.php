<?php


class ResumeForm extends CFormModel
{

    public $type;
    public $cname;
    public $efirstname;
    public $ename;
    public $sex;
    public $workyear;
    public $mobilephone;
    public $email;
    public $current_situation;
    public $area;
    public $idtype;
    public $idcard;
    public $hukou;
    public $marriage;
    public $politics_status;
    public $contacttype;
    public $othercontacts;
    public $stature;
    public $address;
    public $zipcode;
    public $homepage;
    public $birthday;
    public $salary;
    public $basesalary;
    public $bonus;
    public $allowance;
    public $stock;
    public $seektype;
    public $expectindustry;
    public $expectfunc;
    public $expectarea;
    public $selfintro;
    public $entrytime;
    public $resumekey;
    public $salarytype;
    public $expectposition;
    public $inputsalary;
    public $work;
    public $schoolaward;
    public $schooljob;
    public $project;
    public $education;
    public $skilllanguage;
    public $skillcertification;
    public $skilltrain;



    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'cname'=>'姓名',
            'workyear' => '开始工作年份',
            'mobilephone' => '手机号',
            'email' => '电子邮箱'
        );
    }
}