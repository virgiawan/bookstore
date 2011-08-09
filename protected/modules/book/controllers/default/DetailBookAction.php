<?php

    class DetailBookAction extends CAction{
        
        public function run(){
            if(!isset($_GET['bid'])){
                $this->controller->redirect($this->controller->createUrl('default/new'));
            }
            $bid=is_numeric($_GET['bid'])?$_GET['bid']:0;
            $data['value']=Book::model()->with('bCategory','bPublisher')->findByPk($bid);
            if($data['value']!=null){
                $this->controller->render('detailbookview',$data);
            }else{
                $this->controller->redirect($this->controller->createUrl('default/new'));
            }
        }
        
    }

?>
