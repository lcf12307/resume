<?php


class ResumeForm extends CFormModel
{

    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;
//    public $cname;
//    public $efirstname;
//    public $ename;
//    public $sex;
//    public $workyear;
//    public $mobilephone;
//    public $email;
//    public $current_situation;
//    public $area;
//    public $idtype;
//    public $idcard;
//    public $hukou;
//    public $marriage;
//    public $politics_status;
//    public $contacttype;
//    public $othercontacts;
//    public $stature;
//    public $address;
//    public $zipcode;
//    public $homepage;
//    public $birthday;
//    public $salary;
//    public $basesalary;
//    public $bonus;
//    public $allowance;
//    public $stock;
//    public $seektype;
//    public $expectindustry;
//    public $expectfunc;
//    public $expectarea;
//    public $selfintro;
//    public $entrytime;
//    public $resumekey;
//    public $salarytype;
//    public $expectposition;
//    public $inputsalary;
//    public $work;
//    public $schoolaward;
//    public $schooljob;
//    public $project;
//    public $education;
//    public $skilllanguage;
//    public $skillcertification;
//    public $skilltrain;



    public function rules()
    {
        return array(
            // name, email, subject and body are required
            array('name, email, subject, body', 'required'),
            // email has to be a valid email address
            array('email', 'email'),
            // verifyCode needs to be entered correctly
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'verifyCode'=>'Verification Code',
        );
    }
}