function loadTree() {
    var tree = $('#jstree');
    tree.jstree('refresh');
}
function treeChange(e, data) {
    if (data.selected.length > 0) {
        var node = data.instance.get_node(data.selected[0]);
        var tab = node.id.split("-");
        var type = tab[0];
        var id = tab[1]
        console.log("Selected", node);
        
        loadLicence(node.id);
    } else {
        console.log("No selected");
    }
}
function loadLicence(id) {
    $.ajax({
        url : "/licence/list/" + id,
            success: function(data) {
                $("#licences").html(data);
            }
    });
}
$(function() {
    $('#jstree')
        .on('changed.jstree', treeChange)
        .jstree({
            'core' : {
                "multiple" : false,
                'data' : {
                    'url' : '/TreeView/tree/',
                    'data' : function (node) {
                        return node;
                    }
                }
            }
        });
})