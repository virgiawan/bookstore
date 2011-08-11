<?php

    class DeleteBookAction extends CAction{
        
        public function run(){
            if(!isset($_GET['cookie_name'])){
                $this->controller->redirect($this->controller->createUrl('default/buy'));
            }
            $cookie_name = $_GET['cookie_name'];
            $cookie_array = Yii::app()->request->getCookies()->toArray();
            foreach($cookie_array as $key=>$value){
                if(strpos($key,$cookie_name) !== false){
                    unset(Yii::app()->request->cookies[$cookie_name]);
                    $this->controller->redirect($this->controller->createUrl('default/buy'));
                }
            }
            $this->controller->redirect($this->controller->createUrl('default/new'));
        }
        
    }

?>
