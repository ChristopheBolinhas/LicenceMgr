function dataFromForm(form) {
    var data = {};
    form.find("input").each(function() {
        data[this.name] = $(this).val();
    });
    return data;
}


$(function() {
    
    //Add function
	$("#addLicence").click(function() {
			console.log("Add Licence");
			$("#newLicence").foundation('reveal', 'open', {
				url: '/editor/add/' + $("#addLicence").attr("data-id")
			});
		});
    
    
    $("#newEditeur").on("click", ".cmdNew", function() {
        var reveal = $(this).closest(".reveal-modal");
         $.ajax({
            url : '/editor/add',
            type : 'POST',
            data : dataFromForm(reveal),
            success : function(data, statut){
               reveal.foundation('reveal', 'close');
            }
        });
    });
});