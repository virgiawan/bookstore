<?php

    class AdminController extends Controller{
        
        public $layout = 'application.views.layouts.template';

        public function init(){
            
        }
        
        public function actions() {
            if(Yii::app()->user->getState('role')!='admin'){
                $this->redirect($this->createUrl('//login/admin/login'));
            }
            return array(
                'list'=>'application.modules.member.controllers.admin.ListMemberAction',
                'change_password'=>'application.modules.member.controllers.admin.ChangePasswordAction',
            );
        }
        
    }

?>
