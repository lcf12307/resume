<?php

/**
 * This is the model class for table "common_answer".
 *
 * The followings are the available columns in table 'common_answer':
 * @property integer $id
 * @property integer $qid
 * @property string $name
 * @property string $answer
 * @property string $detail
 * @property integer $uid
 * @property integer $addtime
 * @property integer $like
 * @property integer $unlike
 * @property integer $comment
 * @property integer $status
 */
class Answer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'common_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qid, uid, addtime, like, unlike, comment, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>36),
			array('answer, detail', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, qid, name, answer, detail, uid, addtime, like, unlike, comment, status', 'safe', 'on'=>'search'),
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
			'qid' => 'Qid',
			'name' => 'Name',
			'answer' => 'Answer',
			'detail' => 'Detail',
			'uid' => 'Uid',
			'addtime' => 'Addtime',
			'like' => 'Like',
			'unlike' => 'Unlike',
			'comment' => 'Comment',
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
		$criteria->compare('qid',$this->qid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('addtime',$this->addtime);
		$criteria->compare('like',$this->like);
		$criteria->compare('unlike',$this->unlike);
		$criteria->compare('comment',$this->comment);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Answer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
