<?php
require_once "connect.php";
if(isset($_POST['checkAvailability'])){
    class chkAvailability extends connect{
        private $select;
        private $logUname;
        private $email;
        private function getUname(){
            $this->logUname = htmlentities($_POST['checkAvailability']);
            if(!empty($this->logUname)){
                if(preg_match("/^[0-9a-zA-Z - @ .]*$/",$this->logUname)){
                    $this->email = $this->logUname;
                    $this->select = $this->conn()->prepare("SELECT * FROM login WHERE username = ? OR email = ?");
                    $this->select->execute([$this->logUname,$this->email]);
                    if($this->select->rowCount()){
                        echo '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 426.667 426.667" style="enable-background:new 0 0 426.667 426.667;" xml:space="preserve">
<path style="fill:#6AC259;" d="M213.333,0C95.518,0,0,95.514,0,213.333s95.518,213.333,213.333,213.333
	c117.828,0,213.333-95.514,213.333-213.333S331.157,0,213.333,0z M174.199,322.918l-93.935-93.931l31.309-31.309l62.626,62.622
	l140.894-140.898l31.309,31.309L174.199,322.918z"/>
</svg>';
                    }else{
                        echo '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 496.158 496.158" style="enable-background:new 0 0 496.158 496.158;" xml:space="preserve">
<path style="fill:#E04F5F;" d="M496.158,248.085c0-137.021-111.07-248.082-248.076-248.082C111.07,0.003,0,111.063,0,248.085
	c0,137.002,111.07,248.07,248.082,248.07C385.088,496.155,496.158,385.087,496.158,248.085z"/>
<path style="fill:#FFFFFF;" d="M277.042,248.082l72.528-84.196c7.91-9.182,6.876-23.041-2.31-30.951
	c-9.172-7.904-23.032-6.876-30.947,2.306l-68.236,79.212l-68.229-79.212c-7.91-9.188-21.771-10.216-30.954-2.306
	c-9.186,7.91-10.214,21.77-2.304,30.951l72.522,84.196l-72.522,84.192c-7.91,9.182-6.882,23.041,2.304,30.951
	c4.143,3.569,9.241,5.318,14.316,5.318c6.161,0,12.294-2.586,16.638-7.624l68.229-79.212l68.236,79.212
	c4.338,5.041,10.47,7.624,16.637,7.624c5.069,0,10.168-1.749,14.311-5.318c9.186-7.91,10.22-21.77,2.31-30.951L277.042,248.082z"/>
</svg>';
                    }
                }else{
                    echo '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 496.158 496.158" style="enable-background:new 0 0 496.158 496.158;" xml:space="preserve">
<path style="fill:#E04F5F;" d="M496.158,248.085c0-137.021-111.07-248.082-248.076-248.082C111.07,0.003,0,111.063,0,248.085
	c0,137.002,111.07,248.07,248.082,248.07C385.088,496.155,496.158,385.087,496.158,248.085z"/>
<path style="fill:#FFFFFF;" d="M277.042,248.082l72.528-84.196c7.91-9.182,6.876-23.041-2.31-30.951
	c-9.172-7.904-23.032-6.876-30.947,2.306l-68.236,79.212l-68.229-79.212c-7.91-9.188-21.771-10.216-30.954-2.306
	c-9.186,7.91-10.214,21.77-2.304,30.951l72.522,84.196l-72.522,84.192c-7.91,9.182-6.882,23.041,2.304,30.951
	c4.143,3.569,9.241,5.318,14.316,5.318c6.161,0,12.294-2.586,16.638-7.624l68.229-79.212l68.236,79.212
	c4.338,5.041,10.47,7.624,16.637,7.624c5.069,0,10.168-1.749,14.311-5.318c9.186-7.91,10.22-21.77,2.31-30.951L277.042,248.082z"/>
</svg>';
                }
            }else{
                echo '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 496.158 496.158" style="enable-background:new 0 0 496.158 496.158;" xml:space="preserve">
<path style="fill:#E04F5F;" d="M496.158,248.085c0-137.021-111.07-248.082-248.076-248.082C111.07,0.003,0,111.063,0,248.085
	c0,137.002,111.07,248.07,248.082,248.07C385.088,496.155,496.158,385.087,496.158,248.085z"/>
<path style="fill:#FFFFFF;" d="M277.042,248.082l72.528-84.196c7.91-9.182,6.876-23.041-2.31-30.951
	c-9.172-7.904-23.032-6.876-30.947,2.306l-68.236,79.212l-68.229-79.212c-7.91-9.188-21.771-10.216-30.954-2.306
	c-9.186,7.91-10.214,21.77-2.304,30.951l72.522,84.196l-72.522,84.192c-7.91,9.182-6.882,23.041,2.304,30.951
	c4.143,3.569,9.241,5.318,14.316,5.318c6.161,0,12.294-2.586,16.638-7.624l68.229-79.212l68.236,79.212
	c4.338,5.041,10.47,7.624,16.637,7.624c5.069,0,10.168-1.749,14.311-5.318c9.186-7.91,10.22-21.77,2.31-30.951L277.042,248.082z"/>
</svg>';
            }
        }
        protected function chkUname(){
            return self::getUname();
        }
        public function allResults(){
            return self::chkUname();
        }
    }
    $userCheck_objective = new chkAvailability();
    $userCheck_objective->allResults();
}
?>
