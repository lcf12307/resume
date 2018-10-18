<?php

/**
 * This is the model class for table "common_user".
 *
 * The followings are the available columns in table 'common_user':
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property integer $phone
 * @property string $password
 * @property integer $rid
 * @property integer $pid
 * @property integer $question
 * @property integer $answer
 * @property integer $addtime
 * @property integer $status
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'common_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phone, rid, pid, question, answer, addtime, status', 'numerical', 'integerOnly'=>true),
			array('name, icon, password', 'length', 'max'=>36),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, icon, phone, password, rid, pid, question, answer, addtime, status', 'safe', 'on'=>'search'),
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
			'icon' => 'Icon',
			'phone' => 'Phone',
			'password' => 'Password',
			'rid' => 'Rid',
			'pid' => 'Pid',
			'question' => 'Question',
			'answer' => 'Answer',
			'addtime' => 'Addtime',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('rid',$this->rid);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('question',$this->question);
		$criteria->compare('answer',$this->answer);
		$criteria->compare('addtime',$this->addtime);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
