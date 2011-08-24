<?php

    class RegisterConfirmationAction extends CAction{
        
        public function run(){
            if(Yii::app()->request->cookies['registration']!=null){
                unset(Yii::app()->request->cookies['registration']);
                $mid=is_numeric($_GET['mid'])?$_GET['mid']:0;
                $data['value'] = Member::model()->findByPk($mid);
                if($data['value']!=null){
                    $code = md5($data['value']->m_id);
                    $email = $data['value']->m_email;
                    $model = new Activation();
                    $model->a_code = $code;
                    $model->a_mid = $data['value']->m_id;
                    $model->save();
                    Yii::app()->email->emailActivation($email,$code);
                    $this->controller->render('registerconfirmationview',$data);
                }
                else{
                    $this->controller->redirect($this->controller->createUrl('//book/default/list'));
                }
            }
            else{
                $this->controller->redirect($this->controller->createUrl('//book/default/list'));
            }
        }
        
    }

?>
