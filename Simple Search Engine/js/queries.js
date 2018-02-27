$(function(){
    $("input").keyup(function(){
        var search = $("input").val();
        $.post("../phps/search.php",{
            search: search
        },function(data,status){
            $("#allResults").html(data);
        });
    });
});
