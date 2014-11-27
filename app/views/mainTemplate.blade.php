<!doctype html>
<html class="js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>User interface</title>
    
    {{ HTML::style('css/foundation.css') }}
    {{ HTML::style('js/jstree/themes/default/style.min.css') }}
    {{ HTML::style('foundation-icons/foundation-icons.css') }}    
    
    {{ HTML::script('js/vendor/modernizr.js') }}
    {{ HTML::script('js/vendor/jquery.js') }}
    {{ HTML::script('js/vendor/fastclick.js') }}
    {{ HTML::script('js/foundation.min.js') }}
    {{ HTML::script('js/lang.js') }}
      
    @if(Auth::check())
        {{ HTML::script('js/jstree/jstree.min.js') }}
        {{ HTML::script('js/global.js') }}
        {{ HTML::script('js/tree.js') }}
        @if (Auth::user()->isReadOrWrite())
            {{ HTML::script('js/licence.js') }}
            {{ HTML::script('js/sheet.js') }}
            {{ HTML::script('js/editor.js') }}
            {{ HTML::script('js/program.js') }}
        @endif
        @if (Auth::user()->isSuperAdmin())
            {{ HTML::script('js/superadmin.js') }}
        @endif
    @endif
            
    {{ HTML::script('js/user.js') }}
    </head>
    <body>
        <div id="mainModal" class="reveal-modal small" data-reveal></div>
        @if(Auth::check())    

        <!-- Paramètre modal -->
        <div id="parameterModal" class="reveal-modal small" data-reveal>
            <h2>Paramètres</h2>
            <div class="panel">
                <h3>Général</h3>
                <div class="row">	
                    <label>Nom</label>
                    <input type="text" value="Jules Laville" />
                </div>
                <div class="row">	
                    <label>Email</label>
                    <input type="email" value="jules@laville.ch" />
                </div>
            </div>
            <div class="panel">
                <h3>Mot de passe</h3>
                <div class="row">	
                    <label>Nouveau mot de passe :</label>
                    <input type="password" placeholder="******" />
                </div>
                <div class="row">	
                    <label>Confirmer le mot de passe :</label>
                    <input type="password" placeholder="******" />
                </div>
            </div>
            <div class="row">
                <a href="#" class="button tiny">Enregistrer</a>
                <a href="#" class="button tiny cmdCloseModal">Annuler</a>
            </div>
            <a class="close-reveal-modal">&#215;</a>
        </div>


        <!-- navBar start -->

        <nav class="top-bar" data-topbar role="navigation">

            <ul class="title-area">
                <li class="name">
                    <h1><a href="#"><i class="fi-key"></i> LicenceMgr</a></h1>
                </li>


            </ul>
            <section class="top-bar-section">
                <ul class="right">
                    <li class="has-dropdown">
                        <a href="#" id="frenchSelector" selected><img src="img/flags/fr.png"/> Français</a>
                        <ul class="dropdown">
                            <li><a href="#" id="englishSelector"><img src="img/flags/en.png"/> English</a></li>
                            <li><a href="#" id="germanSelector"><img src="img/flags/de.png"/> Deutsch</a></li>
                        </ul>
                    </li>
                    <li class="nameUser"><a>@lang('messages.guestNavLabel')</a></li>

                    <li>
                        <a href="/auth/logout" id="logout">
                            <i class="step fi-power size-48 cmdLogout"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-reveal-id="parameterModal">
                            <i class="step fi-widget size-48"></i>
                        </a>
                    </li>
                    <li class="divider"></li>
                </ul>
            </section>
        </nav>
        <!-- Nav bar end -->
        <!-- Main panel -->

        <div class="panel">
            <div data-alert class="alert-box alert" id="error-alert"></div>
            <div class="row">
                <ul class="tabs" data-tab role="tablist">
                    <li class="tab-title active" role="presentational" ><a href="#panel-user" role="tab" tabindex="0" aria-selected="true" controls="panel-user" data-loaded="true">@lang('messages.licenceSnipetTitle')</a></li>
                    <li class="tab-title" role="presentational" ><a href="#panel-admin" role="tab" tabindex="1" aria-selected="false" controls="panel-admin" data-url="/tabs/admin">@lang('messages.userSnipetTitle')</a></li>
                    <li class="tab-title" role="presentational" ><a href="#panel-superadmin" role="tab" tabindex="2" aria-selected="false" controls="panel-superadmin" data-url="/tabs/superadmin">@lang('messages.companySnipetTitle')</a></li>
                </ul>
            </div>
            <div class="tabs-content">
                <section role="tabpanel" aria-hidden="false" class="content active" id="panel-user">
                    @include('tabs.user')
                </section>
                <section role="tabpanel" aria-hidden="true" class="content" id="panel-superadmin"></section>
                <section role="tabpanel" aria-hidden="true" class="content" id="panel-admin"></section>
            </div>

        </div>
        @else
        <script>
            function tabCallback() {}
        </script>
        @include("user.login")
        @endif
        <!-- End main panel -->
        <script>
            $(document).foundation({
                tab: {
                    callback : tabCallback
                }
            });
        </script>

    </body>
</html>