<!doctype html>
<html class="js" lang="en">
    <head>
        {{ HTML::style('css/foundation.css') }}
        {{ HTML::style('js/jstree/themes/default/style.min.css') }}
        {{ HTML::style('foundation-icons/foundation-icons.css') }}    

        {{ HTML::script('js/vendor/modernizr.js') }}
        {{ HTML::script('js/vendor/jquery.js') }}
        {{ HTML::script('js/vendor/fastclick.js') }}
        {{ HTML::script('js/foundation.min.js') }}
        {{ HTML::script('js/lang.js') }}
        <style>
            .saveLoading {
                background:url('/js/jstree/themes/default/throbber.gif') no-repeat right center;
            }
        </style>
        <script>
            $(document).on("click", ".editable", function() {
                console.log("this", this);
                var input = $(this);
                input.addClass("saveLoading");
                input.parent().find("small.error").remove();
                $.ajax({
                    url : input.attr("data-url"),
                    data: { 
                        key: input.attr("name"),
                        value: input.val()
                    },
                    dataType : 'json',
                    type: 'POST',
                    success : function(data, statut){
                        input.removeClass("saveLoading");
                    },
                    error: function(data) {
                        console.log("start append")
                        input.removeClass("saveLoading");
                        input.parent().append('<small class="error">Erreur lors de la modification</small>'); 
                        console.log("end append")
                    }
                });
            });
        </script>
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
    </body>
</html>
