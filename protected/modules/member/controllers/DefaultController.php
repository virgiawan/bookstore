<?php

class DefaultController extends Controller{
    
    public $layout = 'application.views.layouts.index';
    
    public function init(){
        
    }
    
    public function actions() {
        if(Yii::app()->user->getState('role')!=null){
            return array(
                'change_password'=>'application.modules.member.controllers.default.ChangePasswordAction',
            );
        }
        else{
            return array(
                'register'=>'application.modules.member.controllers.default.RegisterMemberAction',
                'confirm'=>'application.modules.member.controllers.default.RegisterConfirmationAction',
                'change_password'=>'application.modules.member.controllers.default.ChangePasswordAction',
            );
        }
    }
    
}