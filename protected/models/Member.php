<?php

/**
 * This is the model class for table "bs_member".
 *
 * The followings are the available columns in table 'bs_member':
 * @property integer $m_id
 * @property string $m_name
 * @property string $m_address
 * @property string $m_email
 * @property string $m_password
 * @property integer $m_activation
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
			array('m_name, m_address, m_email, m_password', 'required'),
                        array('m_email','email'),
			array('m_activation', 'numerical', 'integerOnly'=>true),
			array('m_name', 'length', 'max'=>50),
			array('m_address, m_email', 'length', 'max'=>100),
			array('m_password', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('m_id, m_name, m_address, m_email, m_password, m_activation', 'safe', 'on'=>'search'),
		);
	}
        
        public function safeAttributes(){
            return array(
                'add'=>'m_name,m_address,m_email,m_password',
                'update'=>'m_name,m_address,m_email,m_password',
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
			'm_name' => 'Name',
			'm_address' => 'Address',
			'm_email' => 'Email',
			'm_password' => 'Password',
			'm_activation' => 'Activation',
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
		$criteria->compare('m_address',$this->m_address,true);
		$criteria->compare('m_email',$this->m_email,true);
		$criteria->compare('m_password',$this->m_password,true);
		$criteria->compare('m_activation',$this->m_activation);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}