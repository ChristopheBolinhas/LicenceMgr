function dataFromForm(form) {
    var data = {};    
    form.find("input").each(function() {
        if(!(this.type == 'radio' && !this.checked) && !(this.type=='checkbox' && !this.checked)) {
            data[this.name] = $(this).val();
        }
    });
    return data;
}
function closeModal(){
    $("#mainModal").foundation('reveal', 'close');
    
}

function getTr(elem) {
    return $(elem).closest("tr");
}
function getId(tr) {
    return tr.attr("data-id");
}
function saveForm(reveal, url, callbackSuccess, callbackError) {
    $.ajax({
        url : url,
        type : 'POST',
        data : dataFromForm(reveal),
        success : function(data, statut){
            reveal.foundation('reveal', 'close');
            if (callbackSuccess) { callbackSuccess(); }
        },
        error: function() {
            
            if (callbackError) {callbackError ();}
        }
    });    
}
function setErrorMsg(msg) {
    if(msg) {
        $("#error-alert").text(msg);
        $('#error-alert').show();
        setTimeout(function(){
            $('#error-alert').hide();
        }, 5000);
    } else {
        $('#error-alert').hide();
    }    
}
function deleteItem(tr, url, callbackSuccess) {
    var id = getId(tr);        
    $.ajax({
        url : url + id,
        type : 'DELETE',
        success : function(data, statut){
            tr.hide("bind");
            tr.remove();
            if (callbackSuccess) { callbackSuccess(); }
        }
    });
}
function tabCallback(tab) {
    var a = $(tab).find("a").first();
    
    $("#homePage").hide();
    if (!a.attr("data-loaded")) {
        a.attr("data-loaded", true);
        var div = $(a.attr("href"));
        div.html("Loading ...");
        console.log(a.attr("data-url"));
        div.load(a.attr("data-url"));
    }
}
function resetEditable(source, value) {
    $(source).closest(".editable").html('<div class="value columns small-11">' + value + '</div><div class="columns small-1"><a href="#" class="button postfix right edit"><i class="fi-page-edit size-64"></i></a></div>');
}
$(function() {
    $(document).on("click", ".editable a.save", function() { 
        var edit = $(this).closest(".editable");
        var input = edit.find("input");
        input.addClass("saveLoading");
        edit.find("small.error").remove();
        var value = input.val();
        $.ajax({
            url : edit.attr("data-url"),
            data: { 
                key: edit.attr("data-name"),
                value: value
            },
            type: 'POST',
            success : function(data, statut){
                resetEditable(input, value);
            },
            error: function(data) {
                input.removeClass("saveLoading");
                input.addClass("error");
                input.parent().append('<small class="error">Erreur lors de la modification</small>');
            }
        });
    });
    $(document).on("click", ".editable a.cancel", function() { 
        var value = $(this).closest(".editable").find("input").attr("data-original");
        resetEditable(this, value);
    });
    $(document).on("click", ".editable a.edit", function() {
        var val = $(this).closest(".editable").find(".value").text().trim();
        $(this).closest(".editable").html('<div class="columns small-10"><input data-original="' + val + '" type="text" value="' + val + '"></div><div class="columns small-1"><a href="#" class="button postfix save"><i class="fi-save medium"></i></a></div><div class="columns small-1"><a href="#" class="button postfix cancel"><i class="fi-x medium"></i></a></div>');

    });
    $(document).on("keypress", ".editable input", function(e) {
        if (e.keyCode === 13) {
            $(this).closest(".editable").find("a.save").click();
        }
    });
    $(document).on("click", ".cmdCloseModal", function() {
        $(this).closest(".reveal-modal").foundation('reveal', 'close');
    });
    setErrorMsg();
});