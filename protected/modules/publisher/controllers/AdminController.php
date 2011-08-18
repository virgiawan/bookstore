<?php

    class AdminController extends Controller{
        
        public function init(){
            
        }
        
        public function actions(){
            if(Yii::app()->user->getState('role')!='admin'){
                $this->redirect($this->createUrl('//login/admin/login'));
            }
            return array(
                'list'=>'application.modules.publisher.controllers.admin.ListPublisherAction',
                'add'=>'application.modules.publisher.controllers.admin.AddPublisherAction',
            );
        }
        
    }

?>
