<?php

    class ConfirmBookAction extends CAction{
        
        public function run(){
            if(Yii::app()->request->isPostRequest){
                $i=count($_POST['pur_book_id']);
                $pur_book_id=$_POST['pur_book_id'];
                $pur_quantity=$_POST['pur_quantity'];
                $pur_total_price=$_POST['pur_total_price'];
                for($j=0;$j<$i;$j++){
                    $model = new Purchase();
                    $model->pur_member_id=1;
                    $model->pur_book_id=$pur_book_id[$j];
                    $model->pur_quantity=$pur_quantity[$j];
                    $model->pur_total_price=$pur_total_price[$j];
                    $model->pur_date_time = new CDbExpression('NOW()');
                    if(!$model->save()){
                        print_r($model->getErrors());
                    }
                }
                $criteria = new CDbCriteria();
                $criteria->order='pur_id DESC';
                $data['value']=Purchase::model()->with('purBook')->findAllByAttributes(array('pur_member_id'=>1), $criteria);
                Yii::app()->request->cookies['confirm'] = new CHttpCookie('confirm','confirmed');
                $this->controller->render('confirmbookview',$data);
            }
            else{
                if(Yii::app()->request->cookies['confirm']==null){
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
                else{
                    $criteria = new CDbCriteria();
                    $criteria->order='pur_id DESC';
                    $data['value']=Purchase::model()->with('purBook')->findAllByAttributes(array('pur_member_id'=>1), $criteria);
                    $this->controller->render('confirmbookview',$data);
                }
            }
        }
        
    }

?>
