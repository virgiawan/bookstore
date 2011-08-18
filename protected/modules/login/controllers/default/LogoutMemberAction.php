<?php

    class LogoutMemberAction extends CAction{
        
        public function run(){
            Yii::app()->user->logout();
            Yii::app()->request->cookies->clear();
            $this->controller->redirect($this->controller->createUrl('//book/default/list'));
        }
        
    }

?>
