<?php

    class AdminController extends Controller{
        
        public $layout = 'application.views.layouts.template';
        
        public function init(){
            
        }
        
        public function actions() {
            return array(
                'login'=>'application.modules.login.controllers.admin.LoginAdminAction',
                'logout'=>'application.modules.login.controllers.admin.LogoutAdminAction'
            );
        }
        
    }

?>
