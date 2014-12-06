function initEditorFunctions(){
    var modal = $("#mainModal");
    $(function() {
        

        modal.on("click", ".cmdNewEditor", function() {
            saveForm($(this).closest('.reveal-modal'), '/editor/add', loadTree);
        });
    });
    
    $("#cmdOpenNewEditor").click(function(){
            modal.foundation('reveal', 'open', {
                url: '/editor/add/'
           
            });
    });
    
   

}

