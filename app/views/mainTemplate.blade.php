<!doctype html>
<html class="js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>User interface</title>
        <link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon-180x180.png">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" type="image/png" href="favicon-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-TileImage" content="mstile-144x144.png">
        <meta name="msapplication-config" content="browserconfig.xml">

        {{ HTML::script('/lang/msg')}}

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

        {{--@if(Auth::check())--}}
        {{ HTML::script('js/jstree/jstree.min.js') }}
        {{ HTML::script('js/global.js') }}
        {{ HTML::script('js/tree.js') }}

        {{ HTML::script('js/licence.js') }}
        {{ HTML::script('js/sheet.js') }}
        {{ HTML::script('js/editor.js') }}
        {{ HTML::script('js/program.js') }}

        {{ HTML::script('js/superadmin.js') }}

        {{--@endif--}}

        {{ HTML::script('js/user.js') }}
    </head>
    <body>
        <div id="mainModal" class="reveal-modal large" data-reveal></div>
        @if(Auth::check())    

        <!-- Paramètre modal -->
        

        <!-- navBar start -->

        <nav class="top-bar" data-topbar role="navigation">

            <ul class="title-area">
                <li class="name">
                    <h1><a href="#"><img src="/favicon-32x32.png"> LicenceMgr</a></h1>
                </li>


            </ul>
            <section class="top-bar-section">
                <ul class="right">
                    <li class="has-dropdown">


                        @if (Config::get('app.locale') == 'en')
                        <a href="#" id="englishSelector"><img src="img/flags/en.png"/> English</a>
                        <ul class="dropdown">
                            <li><a href="#" id="frenchSelector" selected><img src="img/flags/fr.png"/> Français</a></li>
                        </ul>

                        @else
                        <a href="#" selected><img src="img/flags/fr.png"/> Français</a>
                        <ul class="dropdown">
                            <li><a href="#" id="englishSelector"><img src="img/flags/en.png"/> English</a></li>
                        </ul>
                        @endif

                    </li>
                    <li class="nameUser"><a>{{{ Auth::user()->fullname }}}</a></li>

                    <li>
                        <a href="/auth/logout" id="logout">
                            <i class="step fi-power size-48 cmdLogout"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" id="cmdOpenParameter" >
                            <i class="step fi-widget size-48 "></i>
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
                    @if(Auth::user()->IsReadOrWrite() || Auth::user()->IsAdmin())
                    <li class="tab-title" role="presentational" >
                        <a href="#panel-user" role="tab" tabindex="0" aria-selected="false" controls="panel-user" data-url="/tabs/user">
                            @lang('controls.licenceSnipetTitle')
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->IsAdmin() || Auth::user()->IsSuperAdmin())
                    <li class="tab-title" role="presentational" >
                        <a href="#panel-admin" role="tab" tabindex="1" aria-selected="false" controls="panel-admin" data-url="/tabs/admin">
                            @lang('controls.userSnipetTitle')
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->IsSuperAdmin())
                    <li class="tab-title" role="presentational" >
                        <a href="#panel-superadmin" role="tab" tabindex="2" aria-selected="false" controls="panel-superadmin" data-url="/tabs/superadmin">
                            @lang('controls.companySnipetTitle')
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="tabs-content">
                <section id="homePage">
                    @include('tabs.home')
                </section>
                @if(Auth::user()->IsReadOrWrite())
                <section role="tabpanel" aria-hidden="false" class="content" id="panel-user">

                </section>
                @endif
                @if(Auth::user()->IsSuperAdmin())
                <section role="tabpanel" aria-hidden="true" class="content" id="panel-superadmin"></section>
                @endif
                @if(Auth::user()->IsAdmin() || Auth::user()->IsSuperAdmin())
                <section role="tabpanel" aria-hidden="true" class="content" id="panel-admin"></section>
                @endif
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