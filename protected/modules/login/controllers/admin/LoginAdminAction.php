<?php

    class LoginAdminAction extends CAction{
        
        public function run(){
            $data = array();
            $data['msg'] = Yii::app()->user->getFlash('msg');
            if(!isset($_POST['password'])){
                $msg = "Password cannot be blank";
                Yii::app()->user->setFlash('msg',$msg);
                $this->controller->redirect($this->controller->createUrl('//login/default/login'));
            }
            if(Yii::app()->request->isPostrequest){
                $login = new LoginForm();
                $login->attributes = $_POST;
                if($login->validate()){
                    $login->login();
                    if(Yii::app()->user->getState('role')=='admin'){
                        $this->controller->redirect($this->controller->createUrl('//book/admin/list'));
                    }
                    else{
                        Yii::app()->user->logout();
                        $data['msg'] = 'Incorect username or password';
                    }
                }
                else{
                    $msg = $login->getErrors();
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('//login/admin/login'));
                }
            }
            $this->controller->render('loginadminview',$data);
        }
        
    }

?>
