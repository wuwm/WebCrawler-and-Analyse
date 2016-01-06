/**
 * Created by Wu on 12/12/15.
 */
function refresh(){
    window.location.reload();
}
$("#start").click(function(){
    $.get("http://115.159.31.63/SEProjectWeb/startScrapy.php", function(data, status){
    });
    alert("进程已经开始，请进入状态界面查看");
});
$("#end").click(function(){
    $.get("http://115.159.31.63/SEProjectWeb/endScrapy.php", function(data, status){
    });
});
$("#refresh").click(function(){
    window.location.reload();
});

$(document).ready(function () {

});