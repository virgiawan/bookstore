<?php

    class FbLoginMemberAction extends CAction{
        
        public function run(){
            $facebook = Yii::app()->facebook->fbInit();
            //get user id
            $user = $facebook->getUser();
            if($user===0){
		$this->controller->redirect($this->controller->createUrl('//book/default/list'));
            }else{
		try{
                    $email=$facebook->api('/me?fields=email');
                    $data=$facebook->api('/me');
                    $token=$facebook->getAccessToken();
		}catch(Exception $e){
                    $e->getTraceAsString();
                    exit();
		}
            }
            $checkToken = Member::model()->findByAttributes(array('m_email'=>$email['email'],'m_token'=>""));
            $checkMember = Member::model()->findByAttributes(array('m_email'=>$email['email']));
            if($checkToken!=null){
               $model = Member::model()->findByPk($email['email']);
               if($model!=null){
                   $model->m_token = $token;
                   $model->save();
               }
            }
            else if($checkMember==null){
                $model = new Member();
                $model->m_token = $token;
                $model->m_address = $data['location']['name'];
                $model->m_email = $email['email'];
                $model->m_name = $data['name'];
                $model->save();
            }
            $login = new LoginForm();
            $login->username = $email['email'];
            $login->password = "fblogin";
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
        
    }

?>
