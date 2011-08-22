<?php

/**
 * This is the model class for table "bs_publisher".
 *
 * The followings are the available columns in table 'bs_publisher':
 * @property integer $p_id
 * @property string $p_publisher
 *
 * The followings are the available model relations:
 * @property Book[] $books
 */
class Publisher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Publisher the static model class
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
		return 'bs_publisher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('p_publisher', 'required'),
			array('p_publisher', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('p_id, p_publisher', 'safe', 'on'=>'search'),
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
			'books' => array(self::HAS_MANY, 'Book', 'b_publisher'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'p_id' => 'P',
			'p_publisher' => 'P Publisher',
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

		$criteria->compare('p_id',$this->p_id);
		$criteria->compare('p_publisher',$this->p_publisher,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}