<?php

    class ListBillingAction extends CAction{
        
        public function run(){
            $data['msg'] = Yii::app()->user->getFlash('msg');
            $criteria = new CDbCriteria();
            $criteria->order = 'bil_date DESC';
            $itemCount = Billing::model()->count();
            
            $pages = new CPagination($itemCount);
            $pages->pageSize = 20;
            $pages->applyLimit($criteria);
            
            $data['value'] = Billing::model()->with('bilMember','bilShippingCharges')->findAll($criteria);
            $data['pages'] = $pages;
            $this->controller->render('listbillingview',$data);
        }
        
    }

?>
