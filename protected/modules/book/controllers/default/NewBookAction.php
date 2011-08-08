<?php
    
    class NewBookAction extends CAction{
        
        public function run(){
            $criteria = new CDbCriteria();
            $criteria->order='b_id DESC';
            $criteria->limit=9;
            
            $data['value']=Book::model()->findAll($criteria);
            $this->controller->render('newbookview',$data);
        }
        
    }
    
?>
