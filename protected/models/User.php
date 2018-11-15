<?php

/**
 * This is the model class for table "common_user".
 *
 * The followings are the available columns in table 'common_user':
 * @property integer $id
 * @property string $openid
 * @property string $name
 * @property string $icon
 * @property string $grade
 * @property string $phone
 * @property string $password
 * @property integer $rid
 * @property integer $addtime
 * @property integer $status
 * @property integer $type
 * @property integer $did
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
			array('rid, addtime, status', 'numerical', 'integerOnly'=>true),
			array('openid', 'length', 'max'=>120),
			array('name, icon, grade, password', 'length', 'max'=>36),
			array('phone', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, openid, name, icon, grade, phone, addtime, status, type, did', 'safe', 'on'=>'search'),
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
			'openid' => 'Openid',
			'name' => 'Name',
			'icon' => 'Icon',
			'grade' => 'Grade',
			'phone' => 'Phone',
			'password' => 'Password',
//			'rid' => 'Rid',
			'addtime' => 'Addtime',
			'status' => 'Status',
			'type' => 'Type',
			'did' => 'Did',
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

		$criteria->select= ' t.id,t.openid,t.name,t.icon, t.grade, t.phone, t.password, t.rid, t.addtime, t.status, t.type';
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.openid',$this->openid,true);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.icon',$this->icon,true);
		$criteria->compare('t.grade',$this->grade,true);
		$criteria->compare('t.phone',$this->phone,true);
		$criteria->compare('t.password',$this->password,true);
		$criteria->compare('t.rid',$this->rid);
		$criteria->compare('t.addtime',$this->addtime);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.type',$this->type);
		if (Yii::app()->user->getDivision() != Yii::app()->params['adminDivision']){
            $criteria->compare('common_role.did',Yii::app()->user->getDivision());
        }
		$criteria->join = 'LEFT JOIN common_role ON common_role.id=t.rid';
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
