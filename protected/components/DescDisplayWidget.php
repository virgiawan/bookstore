<?php

    class DescDisplayWidget extends CWidget{
        public $_desc;
        
        public function run(){
            $data['desc']=isset($this->_desc)?$this->_desc:"";
            $this->render('application.components.views.descdisplayview',$data);
        }
    }

?>
