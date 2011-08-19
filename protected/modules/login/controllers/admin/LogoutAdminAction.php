<?php

    class LogoutAdminAction extends CAction{
        
        public function run(){
            if(Yii::app()->user->getState('role')!='admin'){
                $this->controller->redirect($this->controller->createUrl('//login/admin/login'));
            }
            Yii::app()->user->logout();
            Yii::app()->request->cookies->clear();
            $this->controller->redirect($this->controller->createUrl('//login/admin/login'));
        }
        
    }

?>
