<?php

    class DeleteBookAction extends CAction{
        
        public function run(){
            $sep=DIRECTORY_SEPARATOR;
            if(!isset($_GET['bid'])){
                $msg="Book not found";
                Yii::app()->user->setFlash('msg',$msg);
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
            $bid=is_numeric($_GET['bid'])?$_GET['bid']:0;
            $model=Book::model()->findByPk($bid);
            if($model!=null){
                $model->delete();
                $msg="Book ".$model->b_title." deleted";
                Yii::app()->user->setFlash('msg',$msg);
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
            else{
                $msg="Delete book failed";
                Yii::app()->user->setFlash('msg',$msg);
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
        }
        
    }

?>
