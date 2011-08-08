<?php

    class AdminController extends Controller{
        
        public function init(){
            
        }
        
        public function actions(){
            return array(
                'add'=>'application.modules.book.controllers.admin.AddBookAction',
                'list'=>'application.modules.book.controllers.admin.ListBookAction',
                'update'=>'application.modules.book.controllers.admin.UpdateBookAction',
                'delete'=>'application.modules.book.controllers.admin.DeleteBookAction',
            );
        }
        
    }

?>
