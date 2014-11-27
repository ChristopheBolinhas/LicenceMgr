function getFile(id) {
    location.href = "/sheet/get/" + id;    
}
// Explication de l'utilisation de ce principe dans le fichier view/sheet/list.blade.php
function editSheet(that) {
    console.log("editSheet");
}
function deleteSheet(that) {
    var tr = getTr(that);
    deleteItem(tr, '/sheet/delete/');
}
$(function() {
    var modal = $("#mainModal");
    modal.on("click", ".getSheet", function() {
        console.log("getSheet");
        var id = getId(getTr(this));
        getFile(id);
    });
    modal.on("click", ".editSheet", editSheet);
    modal.on("click", ".deleteSheet", deleteSheet);
});