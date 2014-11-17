function dataFromForm(form) {
    var data = {};
    form.find("input").each(function() {
        data[this.name] = $(this).val();
    });
    console.log("dataFromForm", data);
    return data;
}
function saveForm(reveal, url, callbackSuccess, callbackError) {
    console.log("reveal", reveal);
    $.ajax({
        url : url,
        type : 'POST',
        data : dataFromForm(reveal),
        success : function(data, statut){
            reveal.foundation('reveal', 'close');
            if (callbackSuccess) { callbackSuccess(); }
        },
        error: function() {
            alert("Erreur lors de la modification, veuillez controler vos champs !");
            if (callbackError) {callbackError ();}
        }
    });    
}
$(function() {
    $(document).on("click", ".cmdCloseModal", function() {
        $(this).closest(".reveal-modal").foundation('reveal', 'close');
    });
});