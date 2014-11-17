$(function() {

 $("#loginModal").on("click", ".cmdLog", function() {
        saveForm($(this).closest('.reveal-modal'), '/auth/login',null,function(){
            var dest = $(".loginDiv");
            if(dest.html().indexOf("Mauvaises informations de login") <= -1)
            {
                dest.append('<small class="error">Mauvaises informations de login</small>');    
            }
        });
    });
 
});