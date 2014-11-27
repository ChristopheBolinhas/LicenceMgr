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
            .editable div.columns {
                padding:0px;
            }
            .editable input {
                margin:0px;
            }
        </style>
        <script>
            function reset(source, value) {
                console.log
                $(source).closest(".editable").html('<div class="value columns small-11">' + value + '</div><div class="columns small-1"><a href="#" class="button postfix right edit"><i class="fi-page-edit size-64"></i></a></div>');
            }
            $(document).on("click", ".editable a.save", function() { 
                console.log("save");
                var edit = $(this).closest(".editable");
                var input = edit.find("input");
                input.addClass("saveLoading");
                edit.find("small.error").remove();
                console.log("this", this);
                console.log("input", input);
                console.log("edit", edit);
                var value = input.val();
                $.ajax({
                    url : '/licence/list/program-1/'+edit.attr("data-url"),
                    data: { 
                        key: edit.attr("data-name"),
                        value: value
                    },
                    type: 'POST',
                    success : function(data, statut){
                        reset(input, value);
                    },
                    error: function(data) {
                        input.removeClass("saveLoading");
                        input.addClass("error");
                        input.parent().append('<small class="error">Erreur lors de la modification</small>');
                    }
                });
            });
            $(document).on("click", ".editable a.cancel", function() { 
                console.log("cancel");
                var value = $(this).closest(".editable").find("input").attr("data-original");
		        reset(this, value);
            });
            $(document).on("click", ".editable a.edit", function() {
                var val = $(this).closest(".editable").find(".value").text().trim();
                console.log("val", val);
                $(this).closest(".editable").html('<div class="columns small-10"><input data-original="' + val + '" type="text" value="' + val + '"></div><div class="columns small-1"><a href="#" class="button postfix save"><i class="fi-save medium"></i></a></div><div class="columns small-1"><a href="#" class="button postfix cancel"><i class="fi-x medium"></i></a></div>');
                
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
