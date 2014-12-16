function initProgramFunctions(){
    $(function() {
    var modal = $("#mainModal");
    function getSelectedProgramArgs() {
        var src = getParentId();
        if(typeof src != 'undefined') {
            return src.replace("-","/");
        } else {
            return null;
        }
    }
    
    $("#cmdOpenNewProgram").click(function(){
        var selectedProgram = getSelectedProgramArgs()
        if(selectedProgram !== null) {
            modal.foundation('reveal', 'open', {
                url: '/program/add/' + selectedProgram
            });
        } else {
            setErrorMsg(msgs.selectProgramOrEditorError);
        }
    });

    modal.on("click", ".cmdNewProgram", function() {
        saveForm(modal, '/program/add', loadTree,programAddError);
    });

    function programAddError() {
        var dest = $(".programAddDiv");
        if(dest.html().indexOf(msgs.programAddError) <= -1)
        {
            dest.append('<small class="error">'+msgs.programAddError+'</small>');    
        }
    }
});
}
