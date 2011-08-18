<?php
    
    class ListBookAction extends CAction{
        
        public function run(){
            $data['grouping'] = '';
            $data['msg'] = Yii::app()->user->getFlash('msg');
            $criteria = new CDbCriteria();
            $criteria->order='b_id DESC';
            $itemCount = Book::model()->count($criteria);
            
            $pages = new CPagination($itemCount);
            $pages->pageSize = 9;
            $pages->applyLimit($criteria);
            
            $data['value']=Book::model()->findAll($criteria);
            $data['pages']=$pages;
            $this->controller->render('listbookview',$data);
        }
        
    }
    
?>
