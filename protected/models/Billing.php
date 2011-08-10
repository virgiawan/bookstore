<?php

/**
 * This is the model class for table "bs_billing".
 *
 * The followings are the available columns in table 'bs_billing':
 * @property integer $bil_id
 * @property string $bil_key
 * @property integer $bil_member_id
 * @property string $bil_address_destination
 * @property integer $bil_shipping_charges_id
 * @property integer $bil_total_price
 * @property string $bil_message
 * @property string $bil_date
 * @property integer $bil_status
 *
 * The followings are the available model relations:
 * @property Member $bilMember
 * @property Shipingcharges $bilShippingCharges
 */
class Billing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Billing the static model class
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
		return 'bs_billing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bil_key, bil_member_id, bil_address_destination, bil_shipping_charges_id, bil_total_price, bil_message, bil_date', 'required'),
			array('bil_member_id, bil_shipping_charges_id, bil_total_price, bil_status', 'numerical', 'integerOnly'=>true),
			array('bil_key', 'length', 'max'=>32),
			array('bil_address_destination', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bil_id, bil_key, bil_member_id, bil_address_destination, bil_shipping_charges_id, bil_total_price, bil_message, bil_date, bil_status', 'safe', 'on'=>'search'),
		);
	}
        
        public function safeAttributes(){
            return array(
                'add'=>'bil_key, bil_member_id, bil_address_destination, bil_shipping_charges_id, bil_total_price,bil_date',
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
			'bilMember' => array(self::BELONGS_TO, 'Member', 'bil_member_id'),
			'bilShippingCharges' => array(self::BELONGS_TO, 'Shipingcharges', 'bil_shipping_charges_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bil_id' => 'Bil',
			'bil_key' => 'Bil Key',
			'bil_member_id' => 'Bil Member',
			'bil_address_destination' => 'Bil Address Destination',
			'bil_shipping_charges_id' => 'Bil Shipping Charges',
			'bil_total_price' => 'Bil Total Price',
			'bil_message' => 'Bil Message',
			'bil_date' => 'Bil Date',
			'bil_status' => 'Bil Status',
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

		$criteria->compare('bil_id',$this->bil_id);
		$criteria->compare('bil_key',$this->bil_key,true);
		$criteria->compare('bil_member_id',$this->bil_member_id);
		$criteria->compare('bil_address_destination',$this->bil_address_destination,true);
		$criteria->compare('bil_shipping_charges_id',$this->bil_shipping_charges_id);
		$criteria->compare('bil_total_price',$this->bil_total_price);
		$criteria->compare('bil_message',$this->bil_message,true);
		$criteria->compare('bil_date',$this->bil_date,true);
		$criteria->compare('bil_status',$this->bil_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}