<?php

/**
 * This is the model class for table "bs_book".
 *
 * The followings are the available columns in table 'bs_book':
 * @property integer $b_id
 * @property string $b_title
 * @property integer $b_category
 * @property integer $b_publisher
 * @property string $b_author
 * @property string $b_description
 * @property integer $b_stock
 * @property integer $b_price
 * @property string $b_image
 * @property integer $b_year
 *
 * The followings are the available model relations:
 * @property Category $bCategory
 * @property Publisher $bPublisher
 */
Yii::import('application.extensions.upload.Upload');
class Book extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Book the static model class
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
		return 'bs_book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('b_title, b_category, b_publisher, b_author, b_description, b_stock, b_price, b_year', 'required'),
			array('b_category, b_publisher, b_stock, b_price, b_year', 'numerical', 'integerOnly'=>true),
                        array('b_image','file','types'=>'jpg,png,gif','on'=>'add','allowEmpty'=>false),
                        array('b_image','file','types'=>'jpg,png,gif','on'=>'update','allowEmpty'=>true),
			array('b_title', 'length', 'max'=>300),
			array('b_author', 'length', 'max'=>100),
			array('b_image', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('b_id, b_title, b_category, b_publisher, b_author, b_description, b_stock, b_price, b_image, b_year', 'safe', 'on'=>'search'),
		);
	}
        
        public function safeAttributes(){
            return array(
                'add'=>'b_title,b_category,b_publisher,b_author,b_description,b_stock,b_price,b_image,b_year',
                'update'=>'b_title,b_category,b_publisher,b_author,b_description,b_stock,b_price,b_image,b_year',
            );
        }
        
        protected function afterValidate() {
            parent::afterValidate();
            if(isset($this->b_image->name) && ($this->scenario=='add' || $this->scenario=='update')){
                $sep=DIRECTORY_SEPARATOR;
                $path=Yii::app()->basePath.$sep.'..'.$sep.'imgbook'.$sep.'ori'.$sep.$this->b_image->name;
                if($this->b_image->saveAs($path)){
                    $this->_uploadImg($path);
                }
            }
        }
        
        private function _uploadImg($img){
            $sep=DIRECTORY_SEPARATOR;
            $handle=new Upload($img);
            if($handle->uploaded){
                $handle->image_resize=true;
                $handle->image_x=300;
                $handle->image_ratio_y=true;
                $handle->process(Yii::app()->basePath.$sep.'..'.$sep.'imgbook'.$sep.'resize'.$sep);
                if($handle->processed){
                    $this->b_image=$handle->file_dst_name;
                }
            }
            return true;
        }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'bCategory' => array(self::BELONGS_TO, 'Category', 'b_category'),
			'bPublisher' => array(self::BELONGS_TO, 'Publisher', 'b_publisher'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'b_id' => 'B',
			'b_title' => 'Title',
			'b_category' => 'Category',
			'b_publisher' => 'Publisher',
			'b_author' => 'Author',
			'b_description' => 'Description',
			'b_stock' => 'Stock',
			'b_price' => 'Price',
			'b_image' => 'Image',
			'b_year' => 'Year',
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

		$criteria->compare('b_id',$this->b_id);
		$criteria->compare('b_title',$this->b_title,true);
		$criteria->compare('b_category',$this->b_category);
		$criteria->compare('b_publisher',$this->b_publisher);
		$criteria->compare('b_author',$this->b_author,true);
		$criteria->compare('b_description',$this->b_description,true);
		$criteria->compare('b_stock',$this->b_stock);
		$criteria->compare('b_price',$this->b_price);
		$criteria->compare('b_image',$this->b_image,true);
		$criteria->compare('b_year',$this->b_year);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}