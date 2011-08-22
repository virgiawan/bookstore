<?php

    class ListShippingAction extends CAction{
  
        public function run(){
            $criteria = new CDbCriteria();
            $criteria->order = 'sc_location ASC';
            
            $data['value'] = Shipingcharges::model()->findAll($criteria);
            $this->controller->render('listshippingview',$data);
        }
        
    }

?>