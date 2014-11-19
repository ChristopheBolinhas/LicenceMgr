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
                               console.log('french');
                              /* $.ajax({
                                   url: "/lang/lang/fr"
                               });*/
                               setLang('fr');
                           });

$("#englishSelector").click(function()
                            {

                                console.log('english');
                                /*$.ajax({
                                    url: "/lang/lang/en"
                                });*/
                                setLang('en');
                            });

$("#germanSelector").click(function()
                           {

                               console.log('german');
                               /*$.ajax({
                                   url: "/lang/lang/de"
                               });*/
                               setLang('fr');
                           });
});