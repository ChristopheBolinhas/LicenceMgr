function loadLicence(id) {
    $.ajax({
        url : "/licence/list/" + id,
            success: function(data) {
                $("#licences").html(data);
            }
    });
}
function getLicenceId(elem) {
    return $(elem).closest("tr").attr("data-id");
}
$(function() {
     $("#licences").on("click", ".showLicence", function() {
         console.log("showLicence")
         var id = getLicenceId(this);
     });
    $("#licences").on("click", ".editLicence", function() {
         console.log("editLicence")
         var id = getLicenceId(this);
     });
    $("#licences").on("click", ".deleteLicence", function() {
         console.log("deleteLicence")
         var id = getLicenceId(this);
     });
    $("#licences").on("click", ".downloadLicence", function() {
         console.log("downloadLicence")
         var id = getLicenceId(this);
     });
});