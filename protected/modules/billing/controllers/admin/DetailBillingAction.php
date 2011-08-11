<?php

    class DetailBillingAction extends CAction{
        
        public function run(){
            if(!isset($_GET['billid'])){
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
            $billid = is_numeric($_GET['billid'])?$_GET['billid']:0;
            $data['value'] = Billing::model()->with('bilMember','bilShippingCharges')->findByPk($billid);
            if($data['value']!=null){
                $billid=$data['value']->bil_id;
                $data['purchase'] = Purchase::model()->with('purBook')->findAllByAttributes(array('pur_billing_id'=>$billid));
                $this->controller->render('detailbillingview',$data);
            }
            else{
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
        }
        
    }

?>
