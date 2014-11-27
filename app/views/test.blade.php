<!doctype html>
<html class="js" lang="en">
    <head>
        {{ HTML::style('css/foundation.css') }}>
        {{ HTML::style('css/app.css') }}
        {{ HTML::style('js/jstree/themes/default/style.min.css') }}
        {{ HTML::style('foundation-icons/foundation-icons.css') }}    

        {{ HTML::script('js/vendor/modernizr.js') }}
        {{ HTML::script('js/vendor/jquery.js') }}
        {{ HTML::script('js/vendor/fastclick.js') }}
        {{ HTML::script('js/foundation.min.js') }}
        {{ HTML::script('js/lang.js') }}
        {{ HTML::script('js/global.js') }}

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
