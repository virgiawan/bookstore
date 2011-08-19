<?php

    class LogoutMemberAction extends CAction{
        
        public function run(){
            $mid = Yii::app()->user->getState('id');
            $itemCount = Purchase::model()->countByAttributes(array('pur_member_id'=>$mid,'pur_billing_id'=>""));
            for($i=1;$i<=$itemCount;$i++){
                $model = Purchase::model()->findByAttributes(array('pur_member_id'=>$mid,'pur_billing_id'=>""));
                if($model!=null){
                    $model->delete();
                }
            }
            Yii::app()->user->logout();
            Yii::app()->request->cookies->clear();
            $this->controller->redirect($this->controller->createUrl('//book/default/list'));
        }
        
    }

?>
