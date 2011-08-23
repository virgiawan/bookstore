<?php

    class AddBookAction extends CAction{
        
        public function run(){
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
                $pict = $model->b_image->getName();
                if($model->save()){
                    $msg="Book added";
                    Yii::app()->user->setFlash('msg',$msg);
                    $status = "Buku baru : ".$_POST['b_title']." | Pengarang : ".$_POST['b_author']." | Penerbit : ".$_POST['b_publisher']." | Harga : Rp ".$_POST['b_price'].",00";
                    $criteria = new CDbCriteria();
                    $criteria->condition = 'm_fbid != "" ';
                    $member = Member::model()->findAll($criteria);
                    foreach($member as $m){
                        Yii::app()->facebook->addBookFacebook($m->m_fbid, $m->m_fbtoken, $status, $pict);
                    }
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
