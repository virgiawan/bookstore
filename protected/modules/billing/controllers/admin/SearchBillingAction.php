<?php

    class SearchBillingAction extends CAction{
        
        public function run(){
            if(empty($_POST['bilsearch'])){
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
            $key = $_POST['bilsearch'];
            $key = explode("-", $key);
            if(count($key)!=3){
                $msg = "Not valid bil id";
                Yii::app()->user->setFlash('msg',$msg);
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
            $billid = is_numeric($key[0])?$key[0]:0;
            $bilkey = is_numeric($key[1])?$key[1]:0;
            $memberid = is_numeric($key[2])?$key[2]:0;
            
            $data['value']=Billing::model()->findByAttributes(array('bil_id'=>$billid,'bil_key'=>$bilkey,'bil_member_id'=>$memberid));
            if($data['value']!=null){
                $billid=$data['value']->bil_id;
                $this->controller->redirect($this->controller->createUrl('admin/detail',array('billid'=>$billid)));
            }
            else{
                $msg = "Bil id : ".implode("-", $key)." not found";
                Yii::app()->user->setFlash('msg',$msg);
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
        }
        
    }

?>
