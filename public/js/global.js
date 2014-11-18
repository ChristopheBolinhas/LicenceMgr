function dataFromForm(form) {
    var data = {};    
    form.find("input").each(function() {
        console.log("this = ", this);
        if(!(this.type == 'radio' && !this.checked)) {
            console.log("added this = ", this);
            data[this.name] = $(this).val();
            
        }
        //data[this.name] = $(this).val();
    });
    console.log("data = ", data);
    return data;
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
function tabCallback(tab) {
    var a = $(tab).find("a").first();
    if (!a.attr("data-loaded")) {
        a.attr("data-loaded", true);
        console.log("attr", a.attr("href"));
        var div = $(a.attr("href"));
        div.html("Loading ...");
        div.load(a.attr("data-url"));
        console.log("load uri", a.attr("data-url"));
    }
}
$(function() {
    $(document).on("click", ".cmdCloseModal", function() {
        $(this).closest(".reveal-modal").foundation('reveal', 'close');
    });
    setErrorMsg();
});