function loadLicence(id) {
    $.ajax({
        url : "/licence/list/" + id,
            success: function(data) {
                $("#licences").html(data);
            }
    });
}
$(function() {
     $("#licences").on("click", ".edit", function() {
         console.log("edit")
     });
});