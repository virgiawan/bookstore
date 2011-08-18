<?php

class DefaultController extends Controller{
    
    public $layout = 'application.views.layouts.index';

    public function init(){
        
    }
    
    public function actions() {
        return array(
            'login'=>'application.modules.login.controllers.default.LoginMemberAction',
            'logout'=>'application.modules.login.controllers.default.LogoutMemberAction',
        );
    }
    
}