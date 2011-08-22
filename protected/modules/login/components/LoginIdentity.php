<?php

    class LoginIdentity extends CUserIdentity{
        
        public function authenticate() {
            $db = Yii::app()->db;
            
            if($this->password=="fblogin"){
                $sql = "SELECT * FROM bs_member WHERE
                        m_email='".$this->username."'";
            }
            else{
                $sql = "SELECT * FROM bs_member WHERE
                        m_email='".$this->username."' AND
                        m_password='".md5($this->password)."'";
            }
            
            $result = $db->createCommand($sql)->queryRow();
            
            if($result!==false){
                $this->errorCode = 0;
                $this->setState('name', $result['m_name']);
                $this->setState('id', $result['m_id']);
                if($result['m_id']==1){
                    $this->setState('role', 'admin');
                }
                else{
                    $this->setState('role', 'customer');
                }
                return true;
            }
            else{
                return false;
            }
            
        }
        
    }

?>
