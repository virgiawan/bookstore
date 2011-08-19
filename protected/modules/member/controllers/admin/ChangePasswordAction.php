<?php

    class ChangePasswordAction extends CAction{
         public function run(){
            $mid = Yii::app()->user->getState('id');
            $model = Member::model()->findByPk($mid);
            $data['msg'] = Yii::app()->user->getFlash('msg');
            if(Yii::app()->request->isPostRequest){
                if($_POST['old_pwd']==null || $_POST['m_password']==null || $_POST['re_password']==null){
                    $data['msg'] = 'All field cannot be blank';
                }
                else if(md5($_POST['old_pwd'])==$model->m_password){
                    if($_POST['m_password']!=""){
                        if($_POST['m_password']!=$_POST['re_password']){
                            $data['msg'] = 'Password yang Anda ketik tidak sama';
                        }
                        else{
                            $model->m_password = md5($_POST['m_password']);
                            if($model->save()){
                                $data['msg'] = 'Change password completed';
                            }
                            else{
                                $data['msg'] = 'Change password failed';
                            }
                        }
                    }
                }
                else{
                    $data['msg'] = "Old password incorrect";
                }
            }
            $this->controller->render('changepasswordview',$data);
        }
    }

?>
