<?php

    class LoginMemberAction extends CAction{
        
        public function run(){
            if(Yii::app()->user->getState('role')!=null){
                $this->controller->redirect($this->controller->createUrl('//book/default/list'));
            }
            $data['msg'] = Yii::app()->user->getFlash('msg');
            if(Yii::app()->request->isPostRequest){
                $login = new LoginForm();
                $login->attributes = $_POST;
                if($login->validate()){
                    $login->login();
                    if(Yii::app()->user->getState('role')=='admin'){
                        Yii::app()->user->logout();
                        $this->controller->redirect($this->controller->createUrl('//login/default/login'));

                    }
                    if(isset(Yii::app()->request->cookies['buy'])){
                        $this->controller->redirect($this->controller->createUrl('//book/default/buy'));
                    }
                    else{
                        $this->controller->redirect($this->controller->createUrl('//book/default/list'));
                    }
                }
                else{
                    $msg = $login->getErrors();
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('//login/default/login'));
                }
            }
            $this->controller->render('loginmemberview',$data);
        }
        
    }

?>
