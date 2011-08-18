<?php

    class ListCategoryAction extends CAction{
        
        public function run(){
            $criteria = new CDbCriteria();
            $criteria->order = 'c_category ASC';
            $itemCount = Category::model()->count($criteria);
            
            $pages = new CPagination($itemCount);
            $pages->pageSize = 20;
            $pages->applyLimit($criteria);
            
            $data['value'] = Category::model()->findAll($criteria);
            $data['pages'] = $pages;
            
            $this->controller->render('listcategoryview',$data);
        }
        
    }

?>
