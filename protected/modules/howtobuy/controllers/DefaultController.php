<?php

class DefaultController extends Controller{
    
    public $layout = 'application.views.layouts.index';
    
    public function init(){
        
    }
    
    public function actions(){
        return array(
            'how_to_buy'=>'application.modules.howtobuy.controllers.default.HowToBuyAction',
        );
    }
    
}