<?php
    Yii::import('application.extensions.fbsdk30.Facebook');
    class FacebookComponent extends CApplicationComponent{
        
        public function fbInit(){
            //inisiasi
            $fbconfig['appId']='139902336101090';
            $fbconfig['secret']='2564d38779c46cf48e531d90775135f9';
	
            //create object facebook
            try{
                $facebook = new Facebook(array(
                    'appId' => $fbconfig['appId'],
                    'secret' => $fbconfig['secret'],
                ));
                return $facebook;
            }catch(Exception $e){
                echo $e->getTraceAsString();
                $facebook=null;
                return $facebook;
            }
        }
        
        public function postFacebook($mid, $status){
            $model = Member::model()->findByPk($mid);
            $fbid=$model->m_fbid;
            $fbtoken=$model->m_fbtoken;
            //Facebook Wall Update
            $link = "http://4sum1.net/bookstore/";
            $from = "Obral Buku";
            $to = $fbid;
            $name = "www.ObralBuku.com";
            $description = "ObralBuku.com menjual buku lebih murah di bandingkan toko buku lainnya. Buktikan!";
            $caption = "Toko buku online";
            $params = array(
                        'access_token'=>$fbtoken, 
                        'message'=>$status,
                        'link'=>$link,
                        'from'=>$from,
                        'to'=>$to,
                        'name'=>$name,
                        'description'=>$description,
                        'caption'=>$caption,
                    );
            $url = "https://graph.facebook.com/$fbid/feed";
            $ch = curl_init();
            curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_VERBOSE => true
            ));
            try{
                $result = curl_exec($ch);
                return true;
            }catch(Exception $e){
                $e->getTraceAsString();
                return false;
            }
        }
        
        public function addBookFacebook($fbid, $fbtoken, $status, $pict){
            //Facebook Wall Update
            $link = "http://4sum1.net/bookstore/";
            $from = "Obral Buku";
            $to = $fbid;
            $picture = "http://4sum1.net/bookstore/imgbook/resize/".$pict;
            $name = "www.ObralBuku.com";
            $description = "ObralBuku.com menjual buku lebih murah di bandingkan toko buku lainnya. Buktikan!";
            $caption = "Toko buku online";
            $params = array(
                        'access_token'=>$fbtoken, 
                        'message'=>$status,
                        'link'=>$link,
                        'from'=>$from,
                        'to'=>$to,
                        'name'=>$name,
                        'description'=>$description,
                        'caption'=>$caption,
                        'picture'=>$picture,
                    );
            $url = "https://graph.facebook.com/$fbid/feed";
            $ch = curl_init();
            curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_POSTFIELDS => $params,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_VERBOSE => true
            ));
            try{
                $result = curl_exec($ch);
                return true;
            }catch(Exception $e){
                $e->getTraceAsString();
                return false;
            }
        }
        
    }

?>
