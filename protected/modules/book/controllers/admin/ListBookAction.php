<?php

    class ListBookAction extends CAction{
        
        public function run(){
            $data['msg']=Yii::app()->user->getFlash('msg');
            $criteria = new CDbCriteria();
            $criteria->order='b_title ASC';
            $itemCount=Book::model()->count($criteria);
            
            $pages = new CPagination($itemCount);
            $pages->pageSize=20;
            $pages->applyLimit($criteria);
            
            $data['value']=Book::model()->with('bPublisher','bCategory')->findAll($criteria);
            $data['pages']=$pages;
            $this->controller->render('listbookview',$data);
        }
        
    }

?>
