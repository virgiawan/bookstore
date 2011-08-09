<?php

    class BuyBookAction extends CAction{
        
        public function run(){
            if(Yii::app()->request->isPostRequest){
                $bid=is_numeric($_POST['b_id'])?$_POST['b_id']:0;
                $quantity=$_POST['pur_quantity'];
                if($quantity<0){
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
                $data['value']=Book::model()->findByPk($bid);
                if($data['value']!=null){
                    $cookie_id="chart_".$data['value']->b_id."_".str_replace(" ","*",$data['value']->b_title)."_".$data['value']->b_price;
                    Yii::app()->request->cookies[$cookie_id]=new CHttpCookie($cookie_id,$quantity);
                    $this->controller->render('buybookview');
                }
                else{
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
            }
            else{
                $this->controller->redirect($this->controller->createUrl('default/new'));
            }
        }
        
    }

?>
