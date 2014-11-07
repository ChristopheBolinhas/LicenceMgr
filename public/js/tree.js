function loadTree() {
    var tree = $('#jstree');
    tree.jstree('refresh');
}
function treeChange(e, data) {
    if (data && data.selected.length > 0) {
        var node = data.instance.get_node(data.selected[0]);
        /*
        var tab = node.id.split("-");
        var type = tab[0];
        var id = tab[1]
        */
        //console.log("Selected", node);
        
        loadLicence(node.id);
    } else {
        //console.log("No selected");
        $("#licences").html('<h4>Veuillez séléctionner un programme.</h4>');
    }
}

function getTreeUrl() {
    return '/TreeView/tree/' + $('#cComplete').is(':checked') + "/";
}
$(function() {
    $('#jstree')
        .on('changed.jstree', treeChange)
        .jstree({
            'core' : {
                "multiple" : false,
                'data' : {
                    'url' : getTreeUrl
                }
            }
        });
    $('input[name="catalogueType"]').change(loadTree);
    treeChange();
})