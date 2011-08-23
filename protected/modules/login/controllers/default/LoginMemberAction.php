<?php
    class LoginMemberAction extends CAction{
        
        public function run(){
            if(Yii::app()->user->getState('role')!=null){
                $this->controller->redirect($this->controller->createUrl('//book/default/list'));
            }
            $data['msg'] = Yii::app()->user->getFlash('msg');
            
            
            //Facebook Connect
            $facebook = Yii::app()->facebook->fbInit();
            //get user id
            $user = $facebook->getUser();
            //graph API facebook
            if($user){
                try{
                    $user_profile=$facebook->api('/me');
                }catch(FacebookApiException $e){
                    error_log($e);
                    $user=null;
                }
            }
            if($user){
                $this->controller->redirect($this->controller->createUrl('//login/default/fb_login'));
            }
            else{
                $data['fblogin']=$facebook->getLoginUrl(array('scope'=>'offline_access,publish_stream,email,publish_actions'));
            }//end Facebook Connect
            
            
            if(Yii::app()->request->isPostRequest){
                $login = new LoginForm();
                if(!isset($_POST['password'])){
                    $msg = "Password cannot be blank";
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('//login/default/login'));
                }
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
