<?php

    class AdminController extends Controller{
        
        public function init(){
            
        }
        
        public function actions(){
            if(Yii::app()->user->getState('role')!='admin'){
                $this->redirect($this->createUrl('//login/admin/login'));
            }
            return array(
                'list'=>'application.modules.billing.controllers.admin.ListBillingAction',
                'payment'=>'application.modules.billing.controllers.admin.PaymentStatusAction',
                'shipping'=>'application.modules.billing.controllers.admin.ShippingStatusAction',
                'detail'=>'application.modules.billing.controllers.admin.DetailBillingAction',
                'search'=>'application.modules.billing.controllers.admin.SearchBillingAction',
            );
        }
        
        
    }

?>
