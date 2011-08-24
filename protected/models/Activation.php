<?php

/**
 * This is the model class for table "bs_activation".
 *
 * The followings are the available columns in table 'bs_activation':
 * @property integer $a_id
 * @property string $a_code
 * @property integer $a_mid
 */
class Activation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Activation the static model class
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
		return 'bs_activation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('a_code, a_mid', 'required'),
			array('a_mid', 'numerical', 'integerOnly'=>true),
			array('a_code', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('a_id, a_code, a_mid', 'safe', 'on'=>'search'),
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
			'a_id' => 'A',
			'a_code' => 'A Code',
			'a_mid' => 'A Mid',
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

		$criteria->compare('a_id',$this->a_id);
		$criteria->compare('a_code',$this->a_code,true);
		$criteria->compare('a_mid',$this->a_mid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}