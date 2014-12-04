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
    dropZoneSel:"#fileupload",
    add: function(e, data) {
        if(data.originalFiles.length && data.originalFiles[0].size > 100*1024) {
            alert("Fichier trop grand !");
        } else {
            data.submit();
        }
    },
    done: function (e, data) {
        $.each(data.result, function (index, file) {
            $("#sheetTable tbody").append(file.html);
            $("#sheetTable tbody tr:last-child").foundation();
        });
        reloadLicence();
    },
    progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .meter').css('width', progress+'%');
    }
}