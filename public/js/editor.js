/*function dataFromForm(form) {
    var data = {};
    form.find("input").each(function() {
        data[this.name] = $(this).val();
    });
    return data;
}*/


$(function() {
    
    //Add function
	/*$("#addLicence").click(function() {
			console.log("Add Licence");
			$("#newLicence").foundation('reveal', 'open', {
				url: '/editor/add/' + $("#addLicence").attr("data-id")
			});
		});*/
    
    
    $("#newEditeur").on("click", ".cmdNew", function() {
        saveForm($(this).closest('.reveal-modal'), '/editor/add', loadTree);
    });
});