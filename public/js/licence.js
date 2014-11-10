function loadLicence(id) {
    $.ajax({
        url : "/licence/list/" + id,
        success: function(data) {
            $("#licences").html(data);
        },
        type: "POST"
    });
}
function getLicenceTr(elem) {
    return $(elem).closest("tr");
}
function getLicenceId(tr) {
    return tr.attr("data-id");
}
$(function() {
     $("#licences").on("click", ".showLicence", function() {
         var tr = getLicenceTr(this);
         var id = getLicenceId(tr);
         var tdLic = tr.find("td.licence");
         if (!tdLic.is("[data-lic]")) {
             tdLic.html("Loading...");
             $.ajax({
                 url : '/licence/key/' + id,
                 dataType : 'json',
                 success : function(data, statut){
                     console.log("lic post", data);
                     tdLic.html(data[0]);
                     tdLic.attr("data-lic", true);
                 }

             });
         }
         
     });
    $("#licences").on("click", ".editLicence", function() {
         console.log("editLicence")
         var id = getLicenceId(getLicenceTr(this));
     });
    $("#licences").on("click", ".deleteLicence", function() {
         console.log("deleteLicence")
         var id = getLicenceId(getLicenceTr(this));
     });
    $("#licences").on("click", ".downloadLicence", function() {
        // TODO dowmload file
        var fileId = $(this).attr("data-id");
     });
});