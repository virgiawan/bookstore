<?php

    class LoginAdminAction extends CAction{
        
        public function run(){
            $data = array();
            $data['msg'] = Yii::app()->user->getFlash('msg');
            if(Yii::app()->request->isPostrequest){
                $login = new LoginForm();
                $login->attributes = $_POST;
                if($login->validate()){
                    echo "valid";
                    exit();
                }
                else{
                    print_r($login->getErrors());
                    echo "<br>.not valid";
                    exit();
                }
            }
            $this->controller->render('loginadminview',$data);
        }
        
    }

?>
