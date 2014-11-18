<h2>@lang('messages.userModalTitle')</h2>   

<div class="panel" id="addUserDiv">
    <div id="error" />
    <div class="row">	
        <label>@lang('messages.enterpriseLabel')</label>
        <select>
            <option value="fr">HE-ARC</option>
            <option value="fr">Jules corp.</option>
            <option value="en">Le squatt à caillou</option>
        </select>
    </div>
    <div class="row">	
        <label>@lang('messages.nameLabel')</label>
        <input type="text" name="fullname" placeholder="@lang('messages.namePlaceholder')" />
    </div>
    <div class="row">	
        <label>@lang('messages.loginLabel')</label>
        <input type="text" name="login" placeholder="@lang('messages.loginPlaceholder')" />
    </div>
    <div class="row">	
        <label>@lang('messages.emailLabel')</label>
        <input type="email" name="email" placeholder="@lang('messages.emailPlaceholder')" />
    </div>
    <div class="row">
        <label>@lang('messages.passwordLabel')</label>
        <input type="password" name="password" id="pass1" placeholder="@lang('messages.passwordPlaceholder')"/>
        <label>@lang('messages.passwordConfirmLabel')</label>
        <input type="password" name="passwordConfirm" id="pass2" placeholder="@lang('messages.passwordPlaceholder')"/>
    </div>
    <div class="row">
        <label>@lang('messages.droitsLabel')</label>
        <input id="checkbox1" type="checkbox"><label for="checkbox1">@lang('messages.droitsLabel1')</label><br/>
        <input id="checkbox2" type="checkbox"><label for="checkbox2">@lang('messages.droitsLabel2')</label><br/>
        <input id="checkbox3" type="checkbox"><label for="checkbox3">@lang('messages.droitsLabel3')</label>
    </div>
</div>

<div class="row">
    <a href="#" class="button tiny cmdAddUser">@lang('messages.newUserButton')</a>
    <a href="#" class="button tiny cmdCloseModal">@lang('messages.cancelButton')</a>
</div>
<a class="close-reveal-modal">&#215;</a>