
{{ Form::open(array('url' => 'auth/login', 'method' => 'post', 'class' => 'form-horizontal')) }}  


<div class="row">
    <div class="small-4 large-4 columns">&#8239;</div>
    <div class="small-4 large-4 columns"><center><img src="favicon-160x160.png" /></center></div>
    <div class="small-4 large-4 columns">&#8239;</div>     
</div>
<div class="row">
    <div class="small-4 large-4 columns">&#8239;</div>
    <div class="small-4 large-4 columns"><center><h2>@lang('messages.authTitle')</h2></center></div>
    <div class="small-4 large-4 columns">&#8239;</div>     
</div>
<div class="row">
    @if(Session::has('error'))
    <div data-alert class="alert-box alert" id="error-alert">
        {{ Session::get('error') }}
    </div>
    @endif
    </div>
<div class="row loginDiv">

    <div class="small-4 large-4 columns">&#8239;</div>
    <div class="small-4 large-4 columns panel">
        <div class="row">	
            <label>@lang('messages.loginLabel')</label>
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => Lang::get('messages.loginPlaceholder'))) }}
        </div>
        <div class="row">	
            <label>@lang('messages.passwordLabel')</label>
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => Lang::get('messages.passwordPlaceholder'))) }}
            {{ Form::checkbox('souvenir') }} <label for="souvenir">@lang('messages.rememberLabel')</label>
        </div>
        <div class="row">    
            <center>{{ Form::submit(Lang::get('controls.loginButton'), array('class' => 'button tiny')) }}</center>
        </div>
    </div>
    <div class="small-4 large-4 columns">&#8239;</div>


    </div>

{{ Form::close() }}
