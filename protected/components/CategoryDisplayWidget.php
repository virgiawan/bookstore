<?php

    class CategoryDisplayWidget extends CWidget{
        
        public function run(){
            $criteria = new CDbCriteria();
            $criteria->order = 'c_category ASC';
            $criteria->limit = 10;
            
            $data['value'] = Category::model()->findAll($criteria);
            $this->render('application.components.views.categorydisplayview',$data);
        }
        
    }

?>
