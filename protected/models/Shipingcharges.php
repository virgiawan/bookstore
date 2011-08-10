<?php

/**
 * This is the model class for table "bs_shipingcharges".
 *
 * The followings are the available columns in table 'bs_shipingcharges':
 * @property integer $sc_id
 * @property string $sc_location
 * @property integer $sc_cost
 *
 * The followings are the available model relations:
 * @property Billing[] $billings
 */
class Shipingcharges extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Shipingcharges the static model class
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
		return 'bs_shipingcharges';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sc_location, sc_cost', 'required'),
			array('sc_cost', 'numerical', 'integerOnly'=>true),
			array('sc_location', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sc_id, sc_location, sc_cost', 'safe', 'on'=>'search'),
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
			'billings' => array(self::HAS_MANY, 'Billing', 'bil_shipping_charges_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sc_id' => 'Sc',
			'sc_location' => 'Sc Location',
			'sc_cost' => 'Sc Cost',
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

		$criteria->compare('sc_id',$this->sc_id);
		$criteria->compare('sc_location',$this->sc_location,true);
		$criteria->compare('sc_cost',$this->sc_cost);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}