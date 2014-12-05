function initUserFunction() {
/*
    $(function() {
*/
    $("#mainModal").on("click", ".cmdAddUser", function() {
      
        var data = dataFromForm($(this).closest('.reveal-modal'));
        console.log("lalalalalalalalalal");
        if(data['password'] !== "" && data['passwordConfirm']  !== "" && data['password'] == data['passwordConfirm'])
        {
            saveForm($("#addUserDiv"), '/auth/add',null, error("errorEmptyForm"));
        }
    });
}
function initUserRegister() {
      console.log("lalalalalala  ",$('#addUserForm'));
    //$('#addUserForm').on('invalid.fndtn.abide', function () {
    $('#addUserForm').foundation("abide");
    $('#addUserForm').on('invalid', function () {
        console.log("invalid");
        var invalid_fields = $(this).find('[data-invalid]');
        console.log(invalid_fields);
    }).on('valid', function () {
        console.log("lalalalalala");
   /*saveForm($("#addUserDiv"), '/auth/add',null, function(){
            var dest = $(".");
            if(dest.html().indexOf("Mauvaises informations de login") <= -1)
            {
                dest.append('<small class="error">Mauvaises informations de login</small>');    
            }
        });*/
    });
    /*
    function error(message)
    {
        var dest = $("#errorRegister");
        var isErrorExist = $('#errorMessage');

        if(!isErrorExist.length)
        {
            dest.append("<small class='error' id='errorMessage' >@lang('messages."+message+"')</small>");    
        }
    }*/
/*
     $("#mainModal").on("click", ".cmdAddUser", function() {
     });
  */  
//});
}