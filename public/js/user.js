$(function() {
    /*	
    $("#cmdAddUser").on("click",function()
        {   
            $.ajax({
                url: "/company/companies/",
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
        });*/

    /*
    $("#loginForm").on("click", ".cmdLog", function() {
        saveForm($(this).closest('#loginForm'), '/auth/login',null,function(){
            var dest = $(".loginDiv");
            if(dest.html().indexOf("Mauvaises informations de login") <= -1)
            {
                dest.append('<small class="error">Mauvaises informations de login</small>');    
            }
        });
    });
*/

    $("#mainModal").on("click", ".cmdAddUser", function() {
      
        var data = dataFromForm($(this).closest('.reveal-modal'));
        console.log("lalalalalalalalalal");
        if(data['password'] !== "" && data['passwordConfirm']  !== "" && data['password'] == data['passwordConfirm'])
        {
            saveForm($("#addUserDiv"), '/auth/add',null, error("errorEmptyForm"));
        }
        else
        {
            error("errorNotSamePassword");
        }
    });
    
    function error(message)
    {
        var dest = $("#errorRegister");
        var isErrorExist = $('#errorMessage');

        if(!isErrorExist.length)
        {
            dest.append("<small class='error' id='errorMessage' >@lang('messages."+message+"')</small>");    
        }
    }
/*
     $("#mainModal").on("click", ".cmdAddUser", function() {
     });
  */  
});