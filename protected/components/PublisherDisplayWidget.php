<?php

    class PublisherDisplayWidget extends CWidget{
        
        public function run(){
            $criteria = new CdBcriteria();
            $criteria->order = 'p_publisher ASC';
            $criteria->limit = 10;
            
            $data['value'] = Publisher::model()->findAll($criteria);
            $this->render('application.components.views.publisherdisplayview',$data);
        }
        
    }

?>
