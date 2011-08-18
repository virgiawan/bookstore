<?php

    class GroupingBookAction extends CAction{
        
        public function run(){
            $data['msg'] = Yii::app()->user->getFlash('msg');
            if(!isset($_GET['gid']) || (!isset($_GET['cid']) && !isset($_GET['pid']))){
                $this->controller->redirect($this->controller->createUrl('default/list'));
            }
            if(isset($_GET['cid']))$cid = is_numeric($_GET['cid'])?$_GET['cid']:0;
            if(isset($_GET['pid']))$pid = is_numeric($_GET['pid'])?$_GET['pid']:0;
            $group = ($_GET['gid']=='category')?'category':'publisher';
            if($group=='category'){
                $criteria = new CDbCriteria();
                $criteria->order = 'b_id DESC';
                $itemCount = Book::model()->count($criteria);
                
                $pages = new CPagination($itemCount);
                $pages->pageSize = 9;
                $pages->applyLimit($criteria);
                
                $data['value'] = Book::model()->with()->findAllByAttributes(array('b_category'=>$cid),$criteria);
                $grouping = Category::model()->findByPk($cid);
                $data['grouping'] = 'Kategori';
                $data['criteria'] = $grouping->c_category;
                if($data['value']==null){
                    if($data['criteria']!=null){
                        $msg = "Buku dengan kategori ".$grouping->c_category." belum tersedia";
                        Yii::app()->user->setFlash('msg',$msg);
                    }
                    $this->controller->redirect($this->controller->createUrl('default/list'));
                }
                else{
                   
                    $data['pages']=$pages;
                    $this->controller->render('listbookview',$data);
                }
            }
            else if($group=='publisher'){
                $criteria = new CDbCriteria();
                $criteria->order = 'b_id DESC';
                $itemCount = Book::model()->count($criteria);
                
                $pages = new CPagination($itemCount);
                $pages->pageSize = 9;
                $pages->applyLimit($criteria);
                
                $data['value'] = Book::model()->findAllByAttributes(array('b_publisher'=>$pid),$criteria);
                $grouping = Publisher::model()->findByPk($pid);
                $data['grouping'] = 'Penerbit';
                $data['criteria'] = $grouping->p_publisher;
                if($data['value']==null){
                    if($data['criteria']!=null){
                        $msg = "Buku dengan penerbit ".$grouping->p_publisher." belum tersedia";
                        Yii::app()->user->setFlash('msg',$msg);
                    }
                    $this->controller->redirect($this->controller->createUrl('default/list'));
                }
                else{
                    $data['pages']=$pages;
                    $this->controller->render('listbookview',$data);
                }
            }
        }
        
    }

?>
