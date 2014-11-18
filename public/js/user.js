$(function() {

    var modal = $("#mainModal");
    $("#cmdNewAccountModal").click(function() {
            modal.foundation('reveal', 'open', {
                url: '/auth/add/'
            });
    });
    
    /*
    $("#loginForm").on("click", ".cmdLog", function() {
        saveForm($(this).closest('#loginForm'), '/auth/login',null,function(){
            var dest = $(".loginDiv");
            if(dest.html().indexOf("Mauvaises informations de login") <= -1)
            {
                dest.append('<small class="error">Mauvaises informations de login</small>');    
            }
        });
    });
*/
        
});