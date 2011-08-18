<?php

    class ListPublisherAction extends CAction{
        
        public function run(){
            $criteria = new CDbCriteria();
            $criteria->order = 'p_publisher ASC';
            
            $data['value'] = Publisher::model()->findAll($criteria);
            
            $this->controller->render('listpublisherview',$data);
        }
        
    }

?>
