<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Administration</title>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width"/>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="js/queries.js"></script>
<link rel="stylesheet" type="text/css" href="styles/index.css">
<link rel="stylesheet" type="text/css" href="styles/media.css">
</head>
<body>
<div class="navigation">
<div class="nav">
<input type="text" name="search" placeholder="Search">
<div class="results">
<ul id="allResults"></ul>
</div>
</div>
</div>
</body>
</html>