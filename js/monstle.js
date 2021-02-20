$(function(){

    var txtoldpassword= $('.oldpassword');
    $('.show-old-pass').hover(
         function()   {
            txtoldpassword.attr("type", "text");
        },
         function(){
            txtoldpassword.attr("type","password"); 
        }
    )
})