<?php

    class CreateBillAction extends CAction{
        
        public function run(){
            $date=date('Y-m-d');
            Yii::app()->user->getFlash('msg');
            if(Yii::app()->request->cookies['bill']==null){
                if(Yii::app()->request->isPostRequest){
                    unset(Yii::app()->request->cookies['buy']);
                    $model = new Billing();
                    $model->scenario='add';
                    $model->attributes=$_POST;
                    $model->bil_date=date('Y-m-d');
                    $model->bil_member_id=1;
                    if($model->save()){
                        $criteria = new CDbCriteria();
                        $criteria->order='bil_id DESC';
                        $criteria->limit=1;
                        $getBil=Billing::model()->with('bilShippingCharges','bilMember')->findByAttributes(array('bil_member_id'=>1), $criteria);
                        $bilId=$getBil->bil_id;
                        $array_cookie=Yii::app()->request->getCookies()->toArray();
                        foreach($array_cookie as $key=>$value){
                            if(strpos($key, "pur_id_")!==false){
                                $exp=explode("_",$key);
                                $pur_id=$exp[2];
                                $setPur=Purchase::model()->findByPk($pur_id);
                                $setPur->pur_billing_id=$bilId;
                                if(!$setPur->save()){
                                    print_r($setPur->getErrors());
                                }
                            }
                        }
                        Yii::app()->request->cookies->clear();
                        Yii::app()->request->cookies['bill'] = new CHttpCookie('bill','valid');
                        $msg="Billing Anda telah dibuat";
                        $data['value']=$getBil;
                        $data['purchase']=Purchase::model()->with('purBook')->findAllByAttributes(array('pur_billing_id'=>$bilId,'pur_date'=>$date,'pur_billing_id'=>""));
                        $data['msg']=Yii::app()->user->setFlash('msg',$msg);
                        $this->controller->render('createbillview',$data);
                    }
                    else{
                        $data['msg']=$model->getErrors();
                        $criteria = new CDbCriteria();
                        $criteria->order='pur_id DESC';
                        $data['value']=Purchase::model()->with('purBook')->findAllByAttributes(array('pur_member_id'=>1,'pur_date'=>$date,'pur_billing_id'=>""), $criteria);
                        $data['shippingcharges']=Shipingcharges::model()->findAll();
                        $this->controller->render('confirmbookview',$data);
                    }
                }
                else{
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
            }
            else{
                if(Yii::app()->request->cookies['bill']!=null){
                    $criteria = new CDbCriteria();
                    $criteria->order='bil_id DESC';
                    $criteria->limit=1;
                    $getBil=Billing::model()->with('bilShippingCharges','bilMember')->findByAttributes(array('bil_member_id'=>1), $criteria);
                    $bilId=$getBil->bil_id;
                    $data['value']=$getBil;
                    $msg="Billing Anda telah dibuat";
                    $data['purchase']=Purchase::model()->with('purBook')->findAllByAttributes(array('pur_billing_id'=>$bilId,'pur_date'=>$date,'pur_billing_id'=>""));
                    $data['msg']=Yii::app()->user->setFlash('msg',$msg);
                    $this->controller->render('createbillview',$data);
                }
                else{
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
            }
        }
        
    }

?>
