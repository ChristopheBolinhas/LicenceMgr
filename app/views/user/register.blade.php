<h2>@lang('messages.userModalTitle')</h2>   

<div class="panel" id="addUserDiv">
    <div id="error" />
    <div class="row">	
        <label>@lang('messages.enterpriseLabel')</label>
        <select name="selectCompanies">
        @if(isset($companies))
            @foreach ($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        @endif
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
        <input type="password" name="password" id="passwordBase" placeholder="@lang('messages.passwordPlaceholder')"/>
        <label>@lang('messages.passwordConfirmLabel')</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="@lang('messages.passwordPlaceholder')"/>
    </div>
    <div class="row">
        <label>@lang('messages.rightsLabel')</label>
        @foreach ($roles as $role)
            <input id="{{$role->id}}" type="checkbox"><label for="{{$role->id}}"><?php echo Lang::get("role.$role->id") ?></label><br/>
        @endforeach
    </div>
    <div class="row">
        <label>@lang('messages.activeLabel')</label>
        <input id="checkbox1" type="checkbox"><label for="checkbox1">@lang('messages.activeBoxLabel')</label><br/>
    </div>
</div>

<div class="row">
    <a href="#" class="button tiny cmdAddUser">@lang('messages.newUserButton')</a>
    <a href="#" class="button tiny cmdCloseModal">@lang('messages.cancelButton')</a>
</div>
<a class="close-reveal-modal">&#215;</a>