function getFile(id) {
    location.href = "/sheet/get/" + id;    
}
$(function() {
    var modal = $("#mainModal");
    modal.on("click", ".deleteSheet", function() {
        console.log("deleteSheet");
        var tr = getTr(this);
        deleteItem(tr, '/sheet/delete/');
    });
    modal.on("click", ".getSheet", function() {
        console.log("getSheet");
        var id = getId(getTr(this));
        getFile(id);
    });
    //modal.on("click", ".deleteSheet", deleteSheet);
    
});