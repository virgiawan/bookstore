<?php

    class ListCategoryAction extends CAction{
        
        public function run(){
            $criteria = new CDbCriteria();
            $criteria->order = 'c_category ASC';
            
            $data['value'] = Category::model()->findAll($criteria);
            
            $this->controller->render('listcategoryview',$data);
        }
        
    }

?>
