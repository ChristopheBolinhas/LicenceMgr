function loadLicence(id) {
    $("#addLicence").attr("data-id", id);
    if (id && id.indexOf("program") >= 0) {
        $.ajax({
            url : "/licence/list/" + id,
            success: function(data) {
                $("#licences").html(data);
                $("#licences").foundation();
            },
            type: "POST"
        });
    } else {
        $("#licences").html('<h4>Veuillez séléctionner un programme.</h4>');
    }
}

function addFile() {
    var count = parseInt($(this).attr("data-count"));
    count ++;    
    $(this).parent().append('<input type="file" name="file-'+ count +'"/>');
    $(this).attr("data-count", count)
}
function getParentId() {
    return $("#addLicence").attr("data-id");
}
function reloadLicence() {
    loadLicence(getParentId());
}
function initLicenceFunctions(){
    $(function() {
        var modal = $("#mainModal");
        $("#licences").on("click", ".showLicence", function() {
            var tr = getTr(this);
            var id = getId(tr);
            var tdLic = tr.find("td.licence");
            if (!tdLic.is("[data-lic]")) {
                tdLic.html("Loading...");
                $.ajax({
                    url : '/licence/key/' + id,
                    dataType : 'json',
                    success : function(data, statut){
                        tdLic.html(data[0]);
                        tdLic.attr("data-lic", true);
                    }
                });
            }         
        });
        $("#licences").on("click", ".editLicence", function() {
            var id = getId(getTr(this));
            modal.foundation('reveal', 'open', {
                url: '/licence/edit/' + id
            });
        });
        $("#licences").on("click", ".deleteLicence", function() {
            var tr = getTr(this);
            deleteItem(tr, '/licence/delete/');
        });
        $("#licences").on("click", ".downloadLicence", function() {
            // TODO dowmload file
            var fileId = $(this).attr("data-id");
            getFile(fileId);
        });
        $("#addLicence").click(function() {
            var parentId = getParentId();
            if (parentId && parentId.indexOf("program") >= 0) {
                modal.foundation('reveal', 'open', {
                    url: '/licence/add/' + parentId
                });
            } else {
                setErrorMsg("Veuillez séléctionner un programme !");
            }
        });
        modal.on("click", ".cmdAddFile", addFile);
        modal.on("click", ".cmdEditLicence", function() {
            saveForm($(this).closest('.reveal-modal'), '/licence/edit', reloadLicence);
        });
        modal.on("click", ".cmdAddLicence", function() {
            saveForm($(this).closest('.reveal-modal'), '/licence/add', reloadLicence);
        });
    });
}

