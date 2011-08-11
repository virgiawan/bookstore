<?php

class DefaultController extends Controller{
    
    public $layout='application.views.layouts.index';
    
    public function init(){
        
    }
    
    public function actions(){
        return array(
            'new'=>'application.modules.book.controllers.default.NewBookAction',
            'buy'=>'application.modules.book.controllers.default.BuyBookAction',
            'detail'=>'application.modules.book.controllers.default.DetailBookAction',
            'confirm'=>'application.modules.book.controllers.default.ConfirmBookAction',
            'delete'=>'application.modules.book.controllers.default.DeleteBookAction',
            'bill'=>'application.modules.book.controllers.default.CreateBillAction',
        );
    }
    
}