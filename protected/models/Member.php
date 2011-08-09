<?php

/**
 * This is the model class for table "bs_member".
 *
 * The followings are the available columns in table 'bs_member':
 * @property integer $m_id
 * @property string $m_name
 * @property string $m_email
 * @property string $m_username
 * @property string $m_password
 *
 * The followings are the available model relations:
 * @property Billing[] $billings
 * @property Purchase[] $purchases
 */
class Member extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Member the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bs_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('m_name, m_email, m_username, m_password', 'required'),
			array('m_name', 'length', 'max'=>50),
			array('m_email', 'length', 'max'=>100),
			array('m_username, m_password', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('m_id, m_name, m_email, m_username, m_password', 'safe', 'on'=>'search'),
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
			'billings' => array(self::HAS_MANY, 'Billing', 'bil_member_id'),
			'purchases' => array(self::HAS_MANY, 'Purchase', 'pur_member_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'm_id' => 'M',
			'm_name' => 'M Name',
			'm_email' => 'M Email',
			'm_username' => 'M Username',
			'm_password' => 'M Password',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('m_id',$this->m_id);
		$criteria->compare('m_name',$this->m_name,true);
		$criteria->compare('m_email',$this->m_email,true);
		$criteria->compare('m_username',$this->m_username,true);
		$criteria->compare('m_password',$this->m_password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}