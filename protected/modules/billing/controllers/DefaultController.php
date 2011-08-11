<?php

    class DefaultController extends Controller{

        public $layout = 'application.views.layouts.index';
        
        public function init(){

        }

        public function actions() {
            return array(
                'list'=>'application.modules.billing.controllers.default.ListBillingAction',
            );
        }

    }

?>