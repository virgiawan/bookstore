<?php

    class AdminController extends Controller{
        
        public $layout = 'application.views.layouts.template';
        
        public function init(){
            
        }
        
        public function actions(){
            if(Yii::app()->user->getState('role')!='admin'){
                $this->redirect($this->createUrl('//login/admin/login'));
            }
            return array(
                'add'=>'application.modules.book.controllers.admin.AddBookAction',
                'list'=>'application.modules.book.controllers.admin.ListBookAction',
                'update'=>'application.modules.book.controllers.admin.UpdateBookAction',
                'delete'=>'application.modules.book.controllers.admin.DeleteBookAction',
            );
        }
        
    }

?>
