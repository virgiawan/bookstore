<?php

    class SearchBookAction extends CAction{
        
        public function run(){
            $data['msg'] = Yii::app()->user->getFlash('msg');
            $data['value'] = "";
            $data['by'] = "";
            if(Yii::app()->request->isPostRequest){
                $by=$_POST['by'];
                if($_POST['search_key']!=null){
                    $data['key']=$key=$_POST['search_key'];
                    $itemCount=count($key)-1;
                    if($by=='b_publisher'){
                        $getPub = Publisher::model()->findByAttributes(array('p_publisher'=>$key));
                        if($getPub!=null){
                            $pid = $getPub->p_id;
                            $model = Book::model()->with('bPublisher')->findAllByAttributes(array('b_publisher'=>$pid));
                            if($model!=null){
                                $data['value'] = $model;
                            }
                            else{
                                $data['msg'] = "Buku yang Anda cari tidak tersedia";
                            }
                        }
                        else{
                            $data['msg'] = "Buku yang Anda cari tidak tersedia";
                        }
                    }
                    else{
                        $key=explode(' ',$key);
                        $sql = "SELECT * FROM bs_book WHERE ";
                        for($i=0;$i<=$itemCount;$i++){
                            $sql .= " $by LIKE '%$key[$i]%'";
                            if($i < $itemCount){
                                $sql .= " OR ";
                            }
                        }
                        $sql .= " ORDER BY b_title ASC ";
                        $model = Book::model()->with('bPublisher')->findAllBySql($sql);
                        if($model!=null){
                            $data['value'] = $model;
                        }
                        else{
                            $data['msg'] = "Buku yang Anda cari tidak tersedia";
                        }
                    }
                }
                else{
                    $data['msg'] = "Masukkan kata kunci terlebih dahulu";
                }
                $data['by'] = $by;
            }
            $this->controller->render('searchbookview',$data);
        }
        
    }

?>
