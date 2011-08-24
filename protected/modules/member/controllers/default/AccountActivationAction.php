<?php

    class AccountActivationAction extends CAction{
        
        public function run(){
            if(!isset($_GET['code'])){
                $this->controller->redirect($this->controller->createUrl('//book/default/list'));
            }
            $code = $_GET['code'];
            $member = Activation::model()->findByAttributes(array('a_code'=>$code));
            if($member!=null){
                $model = Member::model()->findByPk($member->a_mid);
                $data['email'] = $model->m_email;
                $model->m_activation = 1;
                $model->save();
                $this->controller->render('accountactivationview',$data);
            }
            else{
                $this->controller->redirect($this->controller->createUrl('//book/default/list'));
            }
        }
        
    }

?>
