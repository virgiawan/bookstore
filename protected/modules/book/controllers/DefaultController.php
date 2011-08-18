<?php

class DefaultController extends Controller{
    
    public $layout='application.views.layouts.index';
    public $defaultAction = 'list';
    
    public function init(){
        
    }

    public function actions(){
        if(Yii::app()->user->getState('role')){
             return array(
                'bill'=>'application.modules.book.controllers.default.CreateBillAction',
                'delete'=>'application.modules.book.controllers.default.DeleteBookAction',
                'list'=>'application.modules.book.controllers.default.ListBookAction',
                'buy'=>'application.modules.book.controllers.default.BuyBookAction',
                'detail'=>'application.modules.book.controllers.default.DetailBookAction',
                'confirm'=>'application.modules.book.controllers.default.ConfirmBookAction',
                'grouping'=>'application.modules.book.controllers.default.GroupingBookAction',
            );
        }
        else{
            return array(
                'delete'=>'application.modules.book.controllers.default.DeleteBookAction',
                'list'=>'application.modules.book.controllers.default.ListBookAction',
                'buy'=>'application.modules.book.controllers.default.BuyBookAction',
                'detail'=>'application.modules.book.controllers.default.DetailBookAction',
                'confirm'=>'application.modules.book.controllers.default.ConfirmBookAction',
                'grouping'=>'application.modules.book.controllers.default.GroupingBookAction',
            );
        }
    }
    
}