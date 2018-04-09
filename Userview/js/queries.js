$(function(){
    $(".passView").click(function(){
        var logPass = document.getElementById("logPass");
        if(logPass.type === "password"){
            logPass.type = "text";
            $(".passView svg g path").css("fill","#15b300");
        }else{
            logPass.type = "password";
            $(".passView svg g path").css("fill","#000");
        }
    });
    $(".logUname").keyup(function(){
        var logUname = $(".logUname").val();
        $.post("../php_libs/usercheck.php",{
            checkAvailability: logUname
        },function(data,status){
            $(".unameStatus").html(data);
        });
    });
    $(".privacy").on("change",function(){
        var privacy = $(".privacy").val();
        $.post("../php_libs/changePrivacy.php",{
            changePrivacy: privacy
        },function(data,status){
            alert(data);
        });
    });
});
