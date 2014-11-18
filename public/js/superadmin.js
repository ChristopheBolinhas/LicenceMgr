function initCompany() {
    var modal = $("#mainModal");
    modal.on("click", ".cmdEditCompany", function() {
        saveForm($(this).closest('.reveal-modal'), '/company/edit', loadCompanies);
    });
    modal.on("click", ".cmdAddCompany", function() {
        saveForm($(this).closest('.reveal-modal'), '/company/add', loadCompanies);
    }); 
    var div = $("#listCompanies");
    div.on("click", ".editCompany", function() {
        var id = getId(getTr(this));
        modal.foundation('reveal', 'open', {
            url: '/company/edit/' + id
        });    
        
    });
    $("#listCompanies").on("click", ".deleteCompany", function() {
        var tr = getTr(this);
        var id = getId(tr);        
        $.ajax({
            url : '/company/delete/' + id,
            type : 'DELETE',
            success : function(data, statut){
                tr.remove();
            }
        });
     });
    loadCompanies();
}
function loadCompanies() {
    $.ajax({
        url : "/company/list",
        success: function(data) {
            $("#listCompanies").html(data);
            $("#listCompanies").foundation();
        },
        type: "GET"
    });
}