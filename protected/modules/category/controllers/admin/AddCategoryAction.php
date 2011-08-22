<?php

    class AddCategoryAction extends CAction{
        
        public function run(){
            $data['msg'] = Yii::app()->user->getFlash('msg');
            if(Yii::app()->request->isPostRequest){
                $model = new Category();
                $model->c_category = $_POST['c_category'];
                if($model->save()){
                    $data['msg'] = "New category added";
                }
                else{
                    $data['msg'] = "Category cannot be blank";
                }
            }
            $this->controller->render('addcategoryaction',$data);
        }
        
    }

?>
