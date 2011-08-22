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
        
    }

?>
