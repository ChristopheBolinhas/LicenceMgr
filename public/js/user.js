$(function() {
    var modal = $("#mainModal");
    var div = $("#parameter");
    $("#cmdOpenParameter").click(function() {
        modal.foundation('reveal', 'open', {
            url: '/auth/param/'
        });
    });   
});


function initListUser(){
    var modal = $("#mainModal");
    var div = $("#listUser");
    div.on("click", ".editUser", function() {
        var id = getId(getTr(this));
        modal.foundation('reveal', 'open', {
            url: '/auth/edit/' + id
        });
    });
    
    div.on("click", ".deleteUser", function() {
        var tr = getTr(this);
        var id = getId(tr);        
        $.ajax({
            url : '/auth/delete/' + id,
            type : 'DELETE',
            success : function(data, statut){
                tr.remove();
            }
        });
     });
     
    loadUsers();
}

function loadUsers() {
    $.ajax({
        url : "/auth/list",
        success: function(data) {
            $("#listUser").html(data);
            $("#listUser").foundation();
        },
        type: "GET"
    });
}

function initUserRegister() {
    $('#addUserForm').foundation("abide");
    $('#addUserForm').on('invalid', function () {
        console.log("invalid");
        var invalid_fields = $(this).find('[data-invalid]');
        console.log(invalid_fields);
    }).on('valid', function () {
        console.log("ajout");
        //TODO : ARGUMENT DANS LA FONCTION DE CALLBACK ERROR
        //L'ERROR NE S'AFFICHE PAS
            saveForm($(this).closest('.reveal-modal'), '/auth/add',loadUsers, function() {
            
            var dest = $("#addUserForm");
            var isErrorExist = $('#errorMessage');
            if(isErrorExist.length <= 0)
            {
                dest.append("<small class='error' id='errorMessage' >@lang('messages.errorEmptyPassword')</small>");    
            }
         });
     });
    
    $('#editUserForm').foundation("abide");
    $('#editUserForm').on('invalid', function () {
        console.log("invalid");
        var invalid_fields = $(this).find('[data-invalid]');
        console.log(invalid_fields);
    }).on('valid', function () {
        console.log("edit");
        
            saveForm($(this).closest('.reveal-modal'), '/auth/edit',loadUsers, function() {
            
            var dest = $("#addUserForm");
            var isErrorExist = $('#errorMessage');
            if(isErrorExist.length <= 0)
            {
                dest.append("<small class='error' id='errorMessage' >@lang('messages.errorEmptyPassword')</small>");    
            }
         });
     });
}