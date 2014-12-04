//Fichier javascript de la gestion des langues
function setLang(lang){
    $.ajax({
        url: "/lang/lang/"+lang,
        success : function(){
            document.location.reload(true);
        }
    });
}


$(function() {
    $("#frenchSelector").click(function()
                               {
                                   setLang('fr');
                               });

    $("#englishSelector").click(function(){
                                    setLang('en');
                                });

    $("#germanSelector").click(function(){
                                   setLang('de');
                               });
});