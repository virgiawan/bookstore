<?php

class DefaultController extends Controller{
    
    public $layout = 'application.views.layouts.index';
    
    public function init(){
        
    }
    
    public function actions() {
        if(Yii::app()->user->getState('role')!=null){
            return array(
                'changepassword'=>'application.modules.member.controllers.default.ChangePasswordAction',
            );
        }
        else{
            return array(
                'register'=>'application.modules.member.controllers.default.RegisterMemberAction',
                'confirm'=>'application.modules.member.controllers.default.RegisterConfirmationAction',
                'changepassword'=>'application.modules.member.controllers.default.ChangePasswordAction',
            );
        }
    }
    
}