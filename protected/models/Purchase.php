<?php

/**
 * This is the model class for table "bs_purchase".
 *
 * The followings are the available columns in table 'bs_purchase':
 * @property integer $pur_id
 * @property integer $pur_book_id
 * @property integer $pur_quantity
 * @property integer $pur_total_price
 * @property integer $pur_member_id
 * @property string $pur_date
 * @property integer $pur_billing_id
 *
 * The followings are the available model relations:
 * @property Book $purBook
 * @property Member $purMember
 */
class Purchase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Purchase the static model class
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
		return 'bs_purchase';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pur_book_id, pur_quantity, pur_total_price, pur_member_id, pur_date', 'required'),
			array('pur_book_id, pur_quantity, pur_total_price, pur_member_id, pur_billing_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pur_id, pur_book_id, pur_quantity, pur_total_price, pur_member_id, pur_date, pur_billing_id', 'safe', 'on'=>'search'),
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
			'purBook' => array(self::BELONGS_TO, 'Book', 'pur_book_id'),
			'purMember' => array(self::BELONGS_TO, 'Member', 'pur_member_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pur_id' => 'Pur',
			'pur_book_id' => 'Pur Book',
			'pur_quantity' => 'Pur Quantity',
			'pur_total_price' => 'Pur Total Price',
			'pur_member_id' => 'Pur Member',
			'pur_date' => 'Pur Date',
			'pur_billing_id' => 'Pur Billing',
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

		$criteria->compare('pur_id',$this->pur_id);
		$criteria->compare('pur_book_id',$this->pur_book_id);
		$criteria->compare('pur_quantity',$this->pur_quantity);
		$criteria->compare('pur_total_price',$this->pur_total_price);
		$criteria->compare('pur_member_id',$this->pur_member_id);
		$criteria->compare('pur_date',$this->pur_date,true);
		$criteria->compare('pur_billing_id',$this->pur_billing_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}