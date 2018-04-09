<?php
class loginner extends connect{
    private $select;
    private $rows;
    private $uname;
    private $email;
    private $pass;
    private $hash_pass;
    private $dateTime;
    private $updateLog;
    private function getUser(){
        $this->uname = htmlentities($_POST['username']);
        $this->email = $this->uname;
        $this->pass = htmlentities($_POST['password']);
        $this->dateTime = date('Y-m-d H:i:s');
        if(!empty($this->uname) && !empty($this->pass)){
            if(preg_match("/^[0-9a-zA-Z - @ .]*$/",$this->uname)){
                $this->select = $this->conn()->prepare("SELECT * FROM login WHERE username = ? OR email = ?");
                $this->select->execute([$this->uname,$this->email]);
                if($this->select->rowCount()){
                    while($this->rows = $this->select->fetch()){
                        $this->hash_pass = $this->rows['password'];
                        if(password_verify($this->pass,$this->hash_pass)){
                            $this->updateLog = $this->conn()->prepare("UPDATE login SET logs = ? WHERE username = ?");
                            if($this->updateLog->execute([$this->dateTime,$this->uname])){
                                if($this->rows['status'] == "1"){
                                    $_SESSION['user_logged_in'] = $this->rows['username'];
                                    header("Location: /index");
                                }else{
                                    echo '<div style="background-color:hsla(343, 100%, 35%, 0.05);padding:0 4px 0 4px;margin:6px 0 0 0;border:1px solid hsla(343, 100%, 35%, 0.4);"><span class="logErrs">Dear <b>'.$this->rows['username'].'</b>, your account has been blocked/disabled due to violent the rules.<br>Do not take any action and wait a month to use your account again.<br>Thanks...</span></div>';
                                }
                            }else{
                                echo '<div style="background-color:hsla(343, 100%, 35%, 0.05);padding:0 4px 0 4px;margin:6px 0 0 0;border:1px solid hsla(343, 100%, 35%, 0.4);"><span class="logErrs">Connection Failed!</span></div>';
                            }
                        }else{
                            echo '<div style="background-color:hsla(343, 100%, 35%, 0.05);padding:0 4px 0 4px;margin:6px 0 0 0;border:1px solid hsla(343, 100%, 35%, 0.4);"><span class="logErrs">Incorrect username or password.</span></div>';
                        }
                    }
                }else{
                    echo '<div style="background-color:hsla(343, 100%, 35%, 0.05);padding:0 4px 0 4px;margin:6px 0 0 0;border:1px solid hsla(343, 100%, 35%, 0.4);"><span class="logErrs">Invalid username/email.</span></div>';
                }
            }else{
                echo '<div style="background-color:hsla(343, 100%, 35%, 0.05);padding:0 4px 0 4px;margin:6px 0 0 0;border:1px solid hsla(343, 100%, 35%, 0.4);"><span class="logErrs">Please use a valid email address.</span></div>';
            }
        }else{
            echo '<div style="background-color:hsla(343, 100%, 35%, 0.05);padding:0 4px 0 4px;margin:6px 0 0 0;border:1px solid hsla(343, 100%, 35%, 0.4);"><span class="logErrs">Please fill all required fields.</span></div>';
        }
    }
    protected function checkUser(){
        return self::getUser();
    }
    public function startNewSession(){
        return self::checkUser();
    }
}
?>
