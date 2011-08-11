<?php

    class BuyBookAction extends CAction{
        
        public function run(){
            if(Yii::app()->request->isPostRequest){
                if(Yii::app()->request->cookies['bill']!=null){
                    unset(Yii::app()->request->cookies['bill']);
                }
                $bid=is_numeric($_POST['b_id'])?$_POST['b_id']:0;
                $quantity=$_POST['pur_quantity'];
                if($quantity<0){
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
                $data['value']=Book::model()->findByPk($bid);
                if($data['value']!=null){
                    $cookie_id="chart_".$data['value']->b_id."_".str_replace(" ","*",$data['value']->b_title)."_".$data['value']->b_price;
                    Yii::app()->request->cookies[$cookie_id]=new CHttpCookie($cookie_id,$quantity);
                    Yii::app()->request->cookies['buy'] = new CHttpCookie('buy','bought');
                    $this->controller->render('buybookview');
                }
                else{
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
            }
            else{
                if(!isset(Yii::app()->request->cookies['buy'])){
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
                $cookie_array=Yii::app()->request->getCookies()->toArray();
                $i=$j=0;
                foreach($cookie_array as $key=>$value){
                    $i++;
                    if(strpos($key,"chart_")!==false){
                       $j++;
                    }
                }
                if($i-1==0){
                    unset(Yii::app()->request->cookies['buy']);
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
                else if($i-1==$j){
                    $this->controller->render('buybookview');
                }
                else{
                    unset(Yii::app()->request->cookies['buy']);
                    $this->controller->redirect($this->controller->createUrl('default/new'));
                }
            }
        }
        
    }

?>
