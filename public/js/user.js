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
    
      console.log("lalalalalala  ",$('#addUserForm'));
    //$('#addUserForm').on('invalid.fndtn.abide', function () {
    $('#addUserForm').on('invalid.fndtn.abide', function () {
    var invalid_fields = $(this).find('[data-invalid]');
    console.log(invalid_fields);
  }).on('valid.fndtn.abide', function () {
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