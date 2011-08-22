<?php

    class PriceDisplayWidget extends CWidget{
        public $_price;
        
        public function run(){
            $length=strlen($this->_price);
            $loop=floor($length/3);
            $i=0;
            if($length%3==0){
                $loop-=1;
            }
            $price=strrev($this->_price);
            for($loop;$loop>=0;$loop--){
                $temporary=strrev(substr($price, $i, 3));
                if($loop==0){
                    $temp[]=$temporary;
                }
                else{
                    $temp[]=".".$temporary;
                }
                $i+=3;
            }
            $temp=array_reverse($temp);
            $data['price']=implode("",$temp);
            $this->render('application.components.views.pricedisplayview',$data);
        }
        
    }

?>
