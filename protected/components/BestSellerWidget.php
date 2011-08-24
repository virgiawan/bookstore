<?php

    class BestSellerWidget extends CWidget{
        
        public function run(){
            $criteria = new CDbCriteria();
            $criteria->order = 'b_stock ASC';
            $criteria->limit = 4;
            
            $data['value'] = Book::model()->findAll($criteria);
            
            $this->render('application.components.views.bestsellerview',$data);
            
        }
        
    }

?>
