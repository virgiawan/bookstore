<?php

    class ConfirmBookAction extends CAction{
        
        public function run(){
            $data['msg']=Yii::app()->user->getFlash('msg');
            if(Yii::app()->request->cookies['buy']!=null){
                if(Yii::app()->request->isPostRequest){
                    unset(Yii::app()->request->cookies['buy']);
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
                        $model->pur_date= date('Y-m-d');
                        if(!$model->save()){
                            print_r($model->getErrors());
                        }
                        else{
                            $date=date('Y-m-d');
                            $criteria = new CDbCriteria();
                            $criteria->order='pur_id DESC';
                            $criteria->limit=1;
                            $getPur=Purchase::model()->findByAttributes(array('pur_member_id'=>1,'pur_date'=>$date,'pur_billing_id'=>""), $criteria);
                            $purId=$getPur->pur_id;
                            $cookies_id="pur_id_".$purId;
                            Yii::app()->request->cookies[$cookies_id] = new CHttpCookie($cookies_id, $purId);
                        }
                    }
                    $date=date('Y-m-d');
                    $criteria = new CDbCriteria();
                    $criteria->order='pur_id DESC';
                    $data['value']=Purchase::model()->with('purBook')->findAllByAttributes(array('pur_member_id'=>1,'pur_date'=>$date,'pur_billing_id'=>""), $criteria);
                    $data['shippingcharges']=Shipingcharges::model()->findAll();
                    Yii::app()->request->cookies['confirm'] = new CHttpCookie('confirm','confirmed');
                    $this->controller->render('confirmbookview',$data);
                }
                else{
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
            }
            else{
                if(Yii::app()->request->cookies['confirm']!=null){
                    $date=date('Y-m-d');
                    $criteria = new CDbCriteria();
                    $criteria->order='pur_id DESC';
                    $data['value']=Purchase::model()->with('purBook')->findAllByAttributes(array('pur_member_id'=>1,'pur_date'=>$date,'pur_billing_id'=>""), $criteria);
                    $data['shippingcharges']=Shipingcharges::model()->findAll();
                    $this->controller->render('confirmbookview',$data);
                }
                else{
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
            }
        }
        
    }

?>
