function getFile(id) {
    location.href = "/sheet/get/" + id;    
}
$(function() {
    var modal = $("#mainModal");
    modal.on("click", ".deleteSheet", function() {
        var tr = getTr(this);
        deleteItem(tr, '/sheet/delete/', reloadLicence);
    });
    modal.on("click", ".getSheet", function() {
        var id = getId(getTr(this));
        getFile(id);
    });
});
var sheetUpload = {
    url: $('#fileupload').attr("data-url"),
    dataType: 'json',
    done: function (e, data) {
        $.each(data.result, function (index, file) {
            $("#sheetTable tbody").append(file.html);
        });
        reloadLicence();
    },
    progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .meter').css('width', progress+'%');
    }
}