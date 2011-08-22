<?php

    class PaymentStatusAction extends CAction{
        
        public function run(){
            if(!isset($_GET['billid'])){
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
            $billid=is_numeric($_GET['billid'])?$_GET['billid']:0;
            $model = Billing::model()->findByPk($billid);
            if($model!=null){
                $model->bil_status=1;
                if($model->save()){
                    $getPur = Purchase::model()->findAllByAttributes(array('pur_billing_id'=>$billid));
                    foreach($getPur as $gp){
                        $book = Book::model()->findByPk($gp->pur_book_id);
                        $stock = $book->b_stock;
                        $book->b_stock = $stock - $gp->pur_quantity;
                        if(!$book->save()){
                            print_r($book->getErrors());
                        }
                    }
                    $msg = "Bil id : ".$model->bil_id."-".$model->bil_key."-".$model->bil_member_id." paid";
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('admin/list'));
                }
                else{
                    $msg = $model->getErrors();
                    Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->redirect($this->controller->createUrl('admin/list'));
                }
            }
            else{
                $this->controller->redirect($this->controller->createUrl('admin/list'));
            }
        }
        
    }

?>
