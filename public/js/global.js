function dataFromForm(form) {
    var data = {};
    form.find("input").each(function() {
        data[this.name] = $(this).val();
    });
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
            if (callbackError) {
                callbackError ();
            } else {
                alert("Erreur lors de la modification, veuillez controler vos champs !");
            }
        }
    });    
}
$(function() {
    $(document).on("click", ".cmdCloseModal", function() {
        $(this).closest(".reveal-modal").foundation('reveal', 'close');
    });
});