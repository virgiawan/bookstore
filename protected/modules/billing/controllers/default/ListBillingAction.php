<?php

    class ListBillingAction extends CAction{
        
        public function run(){
            $memberid=Yii::app()->user->getState('id');
            $criteria = new CDbCriteria();
            $criteria->order='bil_date DESC';
            $itemCount = Billing::model()->count();
            
            $pages = new CPagination($itemCount);
            $pages->pageSize = 20;
            $pages->applyLimit($criteria);
            
            $data['value'] = Billing::model()->with('bilShippingCharges')->findAllByAttributes(array('bil_member_id'=>$memberid),$criteria);
            $data['pages'] = $pages;
            
            $this->controller->render('listbillingview',$data);
        }
        
    }

?>
