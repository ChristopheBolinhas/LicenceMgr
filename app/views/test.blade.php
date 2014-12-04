<!doctype html>
<html class="js" lang="en">
    <head>
    {{ HTML::style('css/foundation.css') }}
    {{ HTML::style('css/app.css') }}
    {{ HTML::style('css/jquery.fileupload.css') }}
    {{ HTML::style('js/jstree/themes/default/style.min.css') }}
    {{ HTML::style('foundation-icons/foundation-icons.css') }}    
    
    {{ HTML::script('js/vendor/modernizr.js') }}
    {{ HTML::script('js/vendor/jquery.js') }}
    {{ HTML::script('js/vendor/fastclick.js') }}
    {{ HTML::script('js/vendor/jquery.ui.widget.js') }}
    {{ HTML::script('js/jquery.fileupload.js') }}
    {{ HTML::script('js/foundation.min.js') }}
    {{ HTML::script('js/foundation/foundation.abide.js') }}
    {{ HTML::script('js/lang.js') }}

    </head>
    <body>
        <div class="row">	
            <div>
                <input data-url="/sheet/edit/1" name="name" class="autoSave" type="text"  placeholder="value">
            </div>
        </div>
        <div class="row">	
            {{startEditable("toto", "titi")}}
            dfasdfasdf
            {{endEditable()}}
        </div>
        <div class="row">	
            <input data-url="/sheet/edit/1" name="datata" class="autoSave" type="text"  placeholder="value">
        </div>
        <div class="row panel text-center" id="fileupload" data-url="/sheet/add/1">
           
            <h4>Dropez un fichier ici</h4>
            <input type="file" multiple="multiple" name="file[]"  />
            
            
        </div>
        <div class="row">
            <div id="progress" class="progress">
                <span class="meter" style="width:0%"></span>
            </div>
        </div>
        <script>
        $(function() {
            var url = '/sheet/add/1';
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {
                    $.each(data.result, function (index, file) {
                        console.log("file", file);
                        console.log("done", file.name);
                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .meter').css('width', progress+'%');
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
        </script>
    </body>
</html>
