<?php

    class RegisterMemberAction extends CAction{
        
        public function run(){
            if(Yii::app()->user->getState('role')!=null){
                $this->controller->redirect($this->controller->createUrl('//book/default/list'));
            }
            $data['value']="";
            $data['msg'] = Yii::app()->user->getFlash('msg');
            if(Yii::app()->request->isPostRequest){
                $model = new Member();
                $model->scenario = 'add';
                $model->attributes = $_POST;
                if($_POST['m_password']!=""){
                    if($_POST['m_password']!=$_POST['re_password']){
                        $data['msg'] = 'Password yang Anda ketik tidak sama';
                        $model->m_password = "";
                        $data['value'] = $model;
                        $this->controller->render('registermemberview',$data);
                    }
                    else{
                        $model->m_password = md5($_POST['m_password']);
                    }
                }
                if($model->save()){
                    $member = Member::model()->findByAttributes(array('m_email'=>$_POST['m_email']));
                    $mid = $member->m_id;
                    Yii::app()->request->cookies['registration'] = new CHttpCookie('registration','registered');
                    $this->controller->redirect($this->controller->createUrl('default/confirm',array('mid'=>$mid)));
                }else{
                    $data['msg'] = $model->getErrors();
                }
                $data['value'] = $model;
            }
            $this->controller->render('registermemberview',$data);
        }
        
    }

?>
