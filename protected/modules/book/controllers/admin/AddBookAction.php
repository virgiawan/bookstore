<?php

    class AddBookAction extends CAction{
        
        public function run(){
            //$data['action']=$this->controller->createUrl('add');
            $data['msg']=Yii::app()->user->getFlash('msg');
            $data['value']='';
            $data['category'] = Category::model()->findAll();
            $data['publisher'] = Publisher::model()->findAll();
            if(Yii::app()->request->isPostRequest){
                $model = new Book();
                $model->scenario='add';
                $model->attributes=$_POST;
                if(CUploadedFile::getInstance($model,'b_image')){
                    $model->b_image=CUploadedFile::getInstance($model,'b_image');
                }
                if($model->save()){
                    $msg="Book added";
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('admin/list'));
                }
                else{
                    $data['msg']=$model->getErrors();
                }
                $data['value']=$model;
            }
            $this->controller->render('addbookview',$data);
        }
        
    }

?>
