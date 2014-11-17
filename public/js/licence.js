function loadLicence(id) {
    $("#addLicence").attr("data-id", id);
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
function addFile() {
    var count = parseInt($(this).attr("data-count"));
    count ++;    
    $(this).append('<input type="file" name="file-'+ count +'"/>');
    $(this).attr("data-count", count)
}
function getParentId() {
     return $("#addLicence").attr("data-id");
}
function reloadLicence() {
    loadLicence(getParentId());
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
        $("#newLicence").foundation('reveal', 'open', {
            url: '/licence/edit/' + id
        });
     });
    $("#licences").on("click", ".deleteLicence", function() {
        var tr = getLicenceTr(this);
        var id = getLicenceId(tr);
        
        $.ajax({
            url : '/licence/delete/' + id,
            type : 'DELETE',
            success : function(data, statut){
                tr.hide("bind");
                tr.remove();
            }

        });
     });
    $("#licences").on("click", ".downloadLicence", function() {
        // TODO dowmload file
        var fileId = $(this).attr("data-id");
     });
    $("#addLicence").click(function() {
        var parentId = getParentId();
        if (parentId && parentId.indexOf("program") >= 0) {
            console.log("Add Licence");
            $("#newLicence").foundation('reveal', 'open', {
                url: '/licence/add/' + parentId
            });
        } else {
            alert("Veuillez séléctionner un programme !");
        }
    });
    $("#newLicence").on("click", "#addFile", addFile);
    $("#newLicence").on("click", ".cmdEdit", function() {
        var reveal = $(this).closest(".reveal-modal");
         $.ajax({
             url : '/licence/edit',
             type : 'POST',
             data : dataFromForm(reveal),
             success : function(data, statut){
                 reveal.foundation('reveal', 'close');
             },
             error: function() {
                alert("Erreur lors de la modification, veuillez controler vos champs !");
             }
        });
    });
    $("#newLicence").on("click", ".cmdEditLicence", function() {
        saveForm($(this).closest('.reveal-modal'), '/licence/edit', reloadLicence);
    });
    $("#newLicence").on("click", ".cmdAddLicence", function() {
        saveForm($(this).closest('.reveal-modal'), '/licence/add', reloadLicence);
    });
});