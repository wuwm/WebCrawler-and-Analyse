/**
 * Created by Wu on 12/12/15.
 */
function refresh(){
    window.location.reload();
}
$("#start").click(function(){
    $.get("http://115.159.31.63/SEProjectWeb/startScrapy.php", function(data, status){
    });
    setInterval("refresh()",2000);
});
$("#end").click(function(){
    $.get("http://115.159.31.63/SEProjectWeb/endScrapy.php", function(data, status){
    });
    clearInterval();
});
$("#refresh").click(function(){
    window.location.reload();
});

$(document).ready(function () {

});