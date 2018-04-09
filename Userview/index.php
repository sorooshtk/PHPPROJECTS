<?php
date_default_timezone_set("Canada/Central");
require_once "php_libs/config_sess.php";
require_once "php_libs/config_url.php";
if(isset($_SESSION['user_logged_in'])){
    header("Location: /userview");
}else{
    require_once "php_libs/connect.php";
    require_once "php_libs/login.php";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<title>Dreams - Login</title>
<link rel="stylesheet" type="text/css" href="styles/index.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="js/queries.js"></script>
<script type="text/javascript">
$(document).ready(function(){
});
</script>
</head>
<body>
    <div class="body-cotent-layer">
        <div class="login-form-container">
            <form method="post" action="/index" enctype="multipart/form-data">
                <div><input type="text" name="username" class="logUname" value="<?php echo isset($_POST['login']) ? $_POST['username'] : '' ?>" placeholder="Username or Email">
                <span class="unameStatus">&nbsp;</span></div>
                <div style="margin:6px 0 0 0;"><input type="password" name="password" id="logPass" placeholder="Password">
                <span class="passView"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 488.85 488.85" style="enable-background:new 0 0 488.85 488.85;" xml:space="preserve">
                    <g>
	                   <path d="M244.425,98.725c-93.4,0-178.1,51.1-240.6,134.1c-5.1,6.8-5.1,16.3,0,23.1c62.5,83.1,147.2,134.2,240.6,134.2 s178.1-51.1,240.6-134.1c5.1-6.8,5.1-16.3,0-23.1C422.525,149.825,337.825,98.725,244.425,98.725z M251.125,347.025 c-62,3.9-113.2-47.2-109.3-109.3c3.2-51.2,44.7-92.7,95.9-95.9c62-3.9,113.2,47.2,109.3,109.3 C343.725,302.225,302.225,343.725,251.125,347.025z M248.025,299.625c-33.4,2.1-61-25.4-58.8-58.8c1.7-27.6,24.1-49.9,51.7-51.7 c33.4-2.1,61,25.4,58.8,58.8C297.925,275.625,275.525,297.925,248.025,299.625z"/>
                    </g>
                    </svg></span></div>
                <div style="margin:6px 0 0 0;"><input type="submit" name="login" class="btnLogin" value="Login"></div>
                <?php
                    if(isset($_POST['login'])){
                        $login_objective = new loginner();
                        $login_objective->startNewSession();
                    }
                ?>
            </form>
        </div>
        <footer class="footer">
            <?php echo "Dreams&nbsp;&copy;&nbsp;".date("Y")."<br>Powered by <b><a href='https://bit.ly/2HhLWxd' target='_blank'>SorooshTK</a></b>"?>
        </footer>
    </div>
</body>
</html>
