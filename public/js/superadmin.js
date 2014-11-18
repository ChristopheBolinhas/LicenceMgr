$(function() {
    var modal = $("#mainModal");
    modal.on("click", ".cmdEditCompany", function() {
        saveForm($(this).closest('.reveal-modal'), '/company/edit', loadCompanies);
    });
    modal.on("click", ".cmdAddCompany", function() {
        saveForm($(this).closest('.reveal-modal'), '/company/add', loadCompanies);
    });
    
});
function loadCompanies() {
    console.log("loadCompanies");
    $.ajax({
        url : "/company/list",
        success: function(data) {
            $("#listCompanies").html(data);
                $("#listCompanies").foundation();
        },
        type: "GET"
    });
}