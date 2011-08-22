<?php

    class ShippingStatusAction extends CAction{
        
        public function run(){
            Yii::app()->user->getFlash('msg');
            if(!isset($_GET['billid'])){
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
            $billid = is_numeric($_GET['billid'])?$_GET['billid']:0;
            $model = Billing::model()->findByPk($billid);
            if($model!=null){
                $model->bil_shipping_status=1;
                if($model->save()){
                    $msg = "Bil id : ".$model->bil_id."-".$model->bil_key."-".$model->bil_member_id." book sent";
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('admin/list'));
                }
                else{
                    $msg = $model->getErrors();
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('admin/list'));
                }
            }
            else{
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
        }
        
    }

?>
