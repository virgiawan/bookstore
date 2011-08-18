<?php

    class ListMemberAction extends CAction{
        
        public function run(){
            $criteria = new CDbCriteria();
            $criteria->order = 'm_name ASC';
            $itemCount = Member::model()->count($criteria);
            
            $pages = new CPagination($itemCount);
            $pages->pageSize = 20;
            $pages->applyLimit($criteria);
            
            $data['value'] = Member::model()->findAll($criteria);
            $data['pages'] = $pages;
            
            $this->controller->render('listmemberview',$data);
            
        }
        
    }

?>
