<?php

    class AdminController extends Controller{
        
        public function init(){
            
        }
        
        public function actions() {
            return array(
                'login'=>'application.modules.login.controllers.admin.LoginAdminAction',
            );
        }
        
    }

?>
