<?php

    class DeleteBookAction extends CAction{
        
        public function run(){
            if(!isset($_GET['cookie_name'])){
                $this->controller->redirect($this->controller->createUrl('default/buy'));
            }
            $cookie_name = $_GET['cookie_name'];
            if(Yii::app()->request->cookies[$cookie_name]!=null){
                unset(Yii::app()->request->cookies[$cookie_name]);
                $cookie_array = Yii::app()->request->getCookies()->toArray();
                $count_array = count($cookie_array);
                if($count_array!=2){
                    $this->controller->redirect($this->controller->createUrl('default/buy'));
                }
                else{
                    unset(Yii::app()->request->cookies['buy']);
                    $this->controller->redirect($this->controller->createUrl('default/list')); 
                }
            }
            else{
                $this->controller->redirect($this->controller->createUrl('default/list'));
            }
        }
        
    }

?>
