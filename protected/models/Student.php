<?php

/**
 * This is the model class for table "common_student".
 *
 * The followings are the available columns in table 'common_student':
 * @property integer $id
 * @property string $name
 * @property string $studentId
 * @property string $icon
 * @property string $phone
 * @property integer $birthday
 * @property integer $sex
 * @property integer $pid
 * @property integer $tid
 * @property integer $question
 * @property integer $answer
 * @property integer $addtime
 * @property integer $status
 * @property integer $grad
 */
class Student extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'common_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('birthday, sex, pid, tid, question, answer, addtime, status, grad', 'numerical', 'integerOnly'=>true),
			array('name, studentId', 'length', 'max'=>36),
			array('icon', 'length', 'max'=>100),
			array('phone', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, studentId, icon, phone, birthday, sex, pid, tid, question, answer, addtime, status, grad', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'studentId' => 'Student',
			'icon' => 'Icon',
			'phone' => 'Phone',
			'birthday' => 'Birthday',
			'sex' => 'Sex',
			'pid' => 'Pid',
			'tid' => 'Tid',
			'question' => 'Question',
			'answer' => 'Answer',
			'addtime' => 'Addtime',
			'status' => 'Status',
			'grad' => 'Grad',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

        $criteria->compare('t.id',$this->id);
        $criteria->compare('t.name',$this->name,true);
        $criteria->compare('t.icon',$this->icon,true);
        $criteria->compare('t.phone',$this->phone,true);
        $criteria->compare('t.grad',$this->grad);
        $criteria->compare('t.birthday',$this->birthday);
        $criteria->compare('t.sex',$this->sex);
        $criteria->compare('t.pid',$this->pid);
        $criteria->compare('t.tid',$this->tid);
        $criteria->compare('t.question',$this->question);
        $criteria->compare('t.answer',$this->answer);
        $criteria->compare('t.addtime',$this->addtime);
        $criteria->compare('t.status',$this->status);
        if (Yii::app()->user->getDivision() != Yii::app()->params['adminDivision']){
            $criteria->compare('common_role.did',Yii::app()->user->getDivision());
        }
        $criteria->join = 'LEFT JOIN common_user ON common_user.id=t.tid LEFT JOIN common_role ON common_role.id = common_user.rid';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
