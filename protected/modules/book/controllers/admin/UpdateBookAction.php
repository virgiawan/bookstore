<?php

    class UpdateBookAction extends CAction{
        
        public function run(){
            $data['msg']=Yii::app()->user->getFlash('msg');
            $data['category']=Category::model()->findAll();
            $data['publisher']=Publisher::model()->findAll();
            if(Yii::app()->request->isPostRequest){
                $bid=is_numeric($_POST['bid'])?$_POST['bid']:0;
                $model=Book::model()->findByPk($bid);
                $model->scenario='update';
                $model->attributes=$_POST;
                if($model->save()){
                    $msg="Book updated";
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('admin/list'));
                }
                else{
                    $msg=$model->getErrors();
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('admin/update',array('bid'=>$bid)));
                }
            }else{
                if(!isset($_GET['bid'])){
                    $msg="Book not found";
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('admin/list'));
                }
                $bid=is_numeric($_GET['bid'])?$_GET['bid']:0;
                $data['value']=Book::model()->findByPk($bid);
                if($data['value']!=null){
                    $this->controller->render('updatebookview',$data);
                }
                else{
                    $msg="Book not found";
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('admin/list'));
                }
            }
        }
        
    }

?>
