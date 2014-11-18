$(function() {
    var modal = $("#mainModal");
    
    modal.on("click", ".cmdNewEditor", function() {
        saveForm($(this).closest('.reveal-modal'), '/editor/add', loadTree);
    });
});