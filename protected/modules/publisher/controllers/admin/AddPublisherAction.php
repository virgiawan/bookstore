<?php

    class AddPublisherAction extends CAction{
        
        public function run(){
            $data['msg'] = Yii::app()->user->getFlash('msg');
            if(Yii::app()->request->isPostRequest){
                $model = new Publisher();
                $model->p_publisher = $_POST['p_publisher'];
                if($model->save()){
                    $data['msg'] = "New publisher added";
                }
                else{
                    $data['msg'] = "Publisher cannot be blank";
                }
            }
            $this->controller->render('addpublisherview',$data);
        }
        
    }

?>
