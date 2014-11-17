$(function() {
    
    function getSelectedProgramArgs()
    {
        var src = getParentId();
        if(typeof src != 'undefined')
            return src.replace("-","/");
        else
            return null;
    }
    
    $("#cmdOpenNewProgram").click(function(){
        var selectedProgram = getSelectedProgramArgs()
        if(selectedProgram != null)
        {
            $("#newProgram").foundation('reveal', 'open', {
                url: '/program/add/' + getSelectedProgramArgs()
            });
        }
        else
        {
            setErrorMsg("Sélectionnez un programme dans la liste");
        }
        
        
    });
    
    
    $("#newProgram").on("click", ".cmdNew", function() {
        saveForm($(this).closest('.reveal-modal'), '/program/add', loadTree);
    });



    $("#editor_id").change(function()
    {
       
        $.ajax({
            url: "/program/programs/"+ $(this).val(),
            success: function(data)
            {
                var dest = $("#program_parent_id");
                
                
                dest.html("");
                dest.append('<option value="'+this.id+'">Valeur VIDE</option>');
                $(data).each(function()
                             {
                                 dest.append('<option value="'+this.id+'">'+this.name+'</option>');
                             });


            },
            dataType: "json"
        });
    });
});