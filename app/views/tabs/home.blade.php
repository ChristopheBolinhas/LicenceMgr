<div class="row">
    <div class="large-12 columns">
        <h3>@lang("messages.homeTitle") {{{ Auth::user()->fullname }}} </h3>
        <p>@lang("messages.homeIntro")</p>
        <ul>
            @if(Auth::user()->IsRead())
                <li>@lang("messages.readerDescription")</li>
            @endif
            @if(Auth::user()->IsWrite())
                <li>@lang("messages.writerDescription")</li>
            @endif
            @if(Auth::user()->IsAdmin())
                <li>@lang("messages.adminDescription")</li>
            @endif
            @if(Auth::user()->IsSuperAdmin())
                <li>@lang("messages.superAdminDescription")</li>
            @endif
        </ul>
        <p>@lang("messages.homeOutro")</p>
    </div>
</div>