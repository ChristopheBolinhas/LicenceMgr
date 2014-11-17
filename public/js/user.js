$(function() {

 $("#loginModal").on("click", ".cmdLog", function() {
        saveForm($(this).closest('.reveal-modal'), '/auth/login', reloadLicence);
    });
    
});