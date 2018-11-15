<?php

/**
 * This is the model class for table "common_question".
 *
 * The followings are the available columns in table 'common_question':
 * @property integer $id
 * @property integer $cid
 * @property string $name
 * @property string $question
 * @property string $detail
 * @property integer $uid
 * @property integer $star
 * @property integer $answer
 * @property integer $addtime
 * @property integer $status
 */
class Question extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'common_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid, uid, star, answer, addtime, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>36),
			array('question, detail', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cid, name, question, detail, uid, star, answer, addtime, status', 'safe', 'on'=>'search'),
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
			'cid' => 'Cid',
			'name' => 'Name',
			'question' => 'Question',
			'detail' => 'Detail',
			'uid' => 'Uid',
			'star' => 'Star',
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

        $criteria->select= ' t.id,t.cid,t.name,t.question, t.detail, t.uid, t.star, t.answer, t.addtime, t.status';
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.cid',$this->cid);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.question',$this->question,true);
		$criteria->compare('t.detail',$this->detail,true);
		$criteria->compare('t.uid',$this->uid);
		$criteria->compare('t.star',$this->star);
		$criteria->compare('t.answer',$this->answer);
		$criteria->compare('t.addtime',$this->addtime);
		$criteria->compare('t.status',$this->status);

        $criteria->join = 'LEFT JOIN common_user ON common_user.id=t.uid LEFT JOIN common_role ON common_role.id = common_user.rid';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
