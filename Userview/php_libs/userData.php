<?php
class loadData extends connect{
    private $select;
    private $rows;
    private $uname;
    private $postDate;
    private $formatedDate;
    private $privateTools;
    private function getData(){
        $this->uname = $_SESSION['user_logged_in'];
        $this->select = $this->conn()->prepare("SELECT posts.userID, friends.friendID, posts.privacy, posts.postContent, posts.anyURL, posts.postTime FROM posts INNER JOIN friends ON posts.userID = friends.userID");
        $this->select->execute([$this->uname]);
        if($this->select->rowCount()){
            while($this->rows = $this->select->fetch()){
                if($this->rows['privacy'] === "Public"){
                    
                    if($this->rows['userID'] === $this->uname){
                        $this->privateTools = '<select class="privacy">
                                        <option>Public</option>
                                        <option>Private</option>
                                        <option>Friends</option>
                                    </select>';
                    }else{
                        $this->privateTools = "'Public'";
                    }
                    $this->postDate = date_create($this->rows['postTime']);
                    $this->formatedDate = date_format($this->postDate,"d M y - H:i.A");
                    echo '<div class="post-description">
                    <div class="post-details">
                        <div class="user-profile">
                            <img src="images/stkImage.jpg" alt="Profile Image">
                        </div>
                        <div class="user-name-container">
                            <div class="user-name-cage"><span><b>'.$this->rows['userID'].'</b></span></div>
                            <div class="time-lock-container">
                                <span>'.$this->formatedDate.'</span>
                                <span style="padding: 0 0 0 8px;">
                                    '.$this->privateTools.'
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="post-desc-contents">
                        <p>'.$this->rows['postContent'].'</p>
                    </div>
                </div>';
                    if(!empty($this->rows['anyURL'])){
                        echo '<div class="post-image-container">
                    <img src="images/covers/Mexico@x2.jpg" alt="Post Image">
                </div>';
                    }
                    
                }elseif($this->rows['privacy'] === "Private" && $this->rows['userID'] === $this->uname){
                    
                    if($this->rows['userID'] === $this->uname){
                        $this->privateTools = '<select class="privacy">
                                        <option>Private</option>
                                        <option>Public</option>
                                        <option>Friends</option>
                                    </select>';
                    }else{
                        $this->privateTools = "'Private'";
                    }
                    $this->postDate = date_create($this->rows['postTime']);
                    $this->formatedDate = date_format($this->postDate,"d M y - H:i.A");
                    echo '<div class="post-description">
                    <div class="post-details">
                        <div class="user-profile">
                            <img src="images/stkImage.jpg" alt="Profile Image">
                        </div>
                        <div class="user-name-container">
                            <div class="user-name-cage"><span><b>'.$this->rows['userID'].'</b></span></div>
                            <div class="time-lock-container">
                                <span>'.$this->formatedDate.'</span>
                                <span style="padding: 0 0 0 8px;">
                                    '.$this->privateTools.'
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="post-desc-contents">
                        <p>'.$this->rows['postContent'].'</p>
                    </div>
                </div>';
                    if(!empty($this->rows['anyURL'])){
                        echo '<div class="post-image-container">
                    <img src="images/covers/Mexico@x2.jpg" alt="Post Image">
                </div>';
                    }
                    
                }elseif($this->rows['privacy'] === "Friends" && $this->rows['friendID'] === $this->uname || $this->rows['userID'] === $this->uname){
                    
                    if($this->rows['userID'] === $this->uname){
                        $this->privateTools = '<select class="privacy">
                                        <option>Friends</option>
                                        <option>Public</option>
                                        <option>Private</option>
                                    </select>';
                    }else{
                        $this->privateTools = "'Friends'";
                    }
                    $this->postDate = date_create($this->rows['postTime']);
                    $this->formatedDate = date_format($this->postDate,"d M y - H:i.A");
                    echo '<div class="post-description">
                    <div class="post-details">
                        <div class="user-profile">
                            <img src="images/stkImage.jpg" alt="Profile Image">
                        </div>
                        <div class="user-name-container">
                            <div class="user-name-cage"><span><b>'.$this->rows['userID'].'</b></span></div>
                            <div class="time-lock-container">
                                <span>'.$this->formatedDate.'</span>
                                <span style="padding: 0 0 0 8px;">
                                    '.$this->privateTools.'
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="post-desc-contents">
                        <p>'.$this->rows['postContent'].'</p>
                    </div>
                </div>';
                    if(!empty($this->rows['anyURL'])){
                        echo '<div class="post-image-container">
                    <img src="images/covers/Mexico@x2.jpg" alt="Post Image">
                </div>';
                    }
                    
                }
            }
        }
    }
    protected function sendData(){
        return self::getData();
    }
    public function display(){
        return self::sendData();
    }
}
?>
