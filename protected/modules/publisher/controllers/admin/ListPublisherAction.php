<?php

    class ListPublisherAction extends CAction{
        
        public function run(){
            $criteria = new CDbCriteria();
            $criteria->order = 'p_publisher ASC';
            $itemCount = Publisher::model()->count($criteria);
            
            $pages = new CPagination($itemCount);
            $pages->pageSize = 20;
            $pages->applyLimit($criteria);
            
            $data['value'] = Publisher::model()->findAll($criteria);
            $data['pages'] = $pages;
            
            $this->controller->render('listpublisherview',$data);
        }
        
    }

?>
