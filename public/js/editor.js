/*function dataFromForm(form) {
    var data = {};
    form.find("input").each(function() {
        data[this.name] = $(this).val();
    });
    return data;
}*/


$(function() {
    
    
    $("#newEditeur").on("click", ".cmdNew", function() {
        saveForm($(this).closest('.reveal-modal'), '/editor/add', loadTree);
    });
});