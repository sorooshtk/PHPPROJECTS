<?php
require_once "config_sess.php";
require_once "config_url.php";
require_once "connect.php";
if(isset($_POST['changePrivacy'])){
    class privacyChange extends connect{
        private $update;
        private $uname;
        private $privacy;
        private $privacyArray;
        private function getPrivacy(){
            $this->uname = $_SESSION['user_logged_in'];
            $this->privacy = htmlentities($_POST['changePrivacy']);
            $this->privacyArray = array("Public","Private","Friends");
            if(!empty($this->privacy)){
                if(preg_match("/^[A-z]*$/",$this->privacy)){
                    if(in_array($this->privacy,$this->privacyArray)){
                        $this->update = $this->conn()->prepare("UPDATE posts SET privacy = ? WHERE userID = ?");
                        if($this->update->execute([$this->privacy,$this->uname])){
                            echo 'Chaged Saved Successfully';
                        }else{
                            echo 'Connection Faield!!!';
                        }
                    }else{
                        echo 'Only 3 categories allowed. (Public, Private, Friends)';
                    }
                }else{
                    echo 'Only letters allowed.';
                }
            }else{
                echo 'Please select privacy range.';
            }
        }
        protected function setPrivacy(){
            return self::getPrivacy();
        }
        public function saveChanges(){
            return self::setPrivacy();
        }
    }
    $privacyChange_Objective = new privacyChange();
    $privacyChange_Objective->saveChanges();
}
?>
