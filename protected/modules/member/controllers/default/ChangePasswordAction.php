<?php

    class ChangePasswordAction extends CAction{
        
        public function run(){
            if(Yii::app()->user->getState('role')==null){
                $this->controller->redirect($this->controller->createUrl('//book/default/list'));
            }
            $mid = Yii::app()->user->getState('id');
            $model = Member::model()->findByPk($mid);
            $data['msg'] = Yii::app()->user->getFlash('msg');
            if(Yii::app()->request->isPostRequest){
                if($_POST['old_pwd']==null || $_POST['m_password']==null || $_POST['re_password']==null){
                    $data['msg'] = 'All field cannot be blank';
                    $this->controller->render('changepasswordview',$data);
                }
                else if(md5($_POST['old_pwd'])==$model->m_password){
                    if($_POST['m_password']!=""){
                        if($_POST['m_password']!=$_POST['re_password']){
                            $data['msg'] = 'Password yang Anda ketik tidak sama';
                            $this->controller->render('changepasswordview',$data);
                        }
                        else{
                            $model->m_password = md5($_POST['m_password']);
                        }
                        if($model->save()){
                            $data['msg'] = 'Change password completed';
                            $this->controller->render('changepasswordview',$data);
                        }
                        else{
                            $data['msg'] = 'Change password failed';
                            $this->controller->render('changepasswordview',$data);
                        }
                    }
                }
                else{
                    $data['msg'] = "Old password incorrect";
                    $this->controller->render('changepasswordview',$data);
                }
            }
            $this->controller->render('changepasswordview',$data);
        }
        
    }

?>
