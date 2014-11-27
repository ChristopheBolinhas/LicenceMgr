<h2>@lang('messages.userModalTitle')</h2>   

<div class="panel" id="addUserDiv">
    <div id="errorRegister"/>
    <div class="row">	
        <label>@lang('messages.enterpriseLabel')</label>
        <select name="companies">
        @if(isset($companies))
            @foreach ($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        @endif
        </select>
    </div>
    <div class="row">	
        <label>@lang('messages.nameLabel')</label>
        <input type="text" name="fullname" value="{{{isset($user) ? $user->fullname:''}}}" placeholder="@lang('messages.namePlaceholder')" />
    </div>
    <div class="row">	
        <label>@lang('messages.loginLabel')</label>
        <input type="text" name="login" value="{{{isset($user) ? $user->username:''}}}" placeholder="@lang('messages.loginPlaceholder')" />
    </div>
    <div class="row">	
        <label>@lang('messages.emailLabel')</label>
        <input type="email" name="email" value="{{{isset($user) ? $user->email:''}}}" placeholder="@lang('messages.emailPlaceholder')" />
    </div>
    <div class="row">
        <label>@lang('messages.passwordLabel')</label>
        <input type="password" name="password" id="passwordBase" placeholder="@lang('messages.passwordPlaceholder')"/>
        <label>@lang('messages.passwordConfirmLabel')</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="@lang('messages.passwordPlaceholder')"/>
    </div>
    <div class="row">
        <label>@lang('messages.rightsLabel')</label>
        @if(isset($roles))
        @foreach ($roles as $role)
            @if(isset($user))
            <input id="{{$role->id}}" type="checkbox" {{$user->IsInRole($role->code) ? 'checked':''}}><label for="{{$role->id}}"><?php echo Lang::get("role.$role->id") ?></label><br/>
            @else
            <input id="{{$role->id}}" name="role{{$role->id}}" type="checkbox"><label for="{{$role->id}}"><?php echo Lang::get("role.$role->id") ?></label><br/>
            @endif
        @endforeach
        @endif
    </div>
    <div class="row">
        <label>@lang('messages.activeLabel')</label>
        <input id="active" name="isActive" type="checkbox"><label for="checkbox1">@lang('messages.activeBoxLabel')</label><br/>
    </div>
</div>

<div class="row">
    <a href="#" class="button tiny cmdAddUser">@lang('messages.newUserButton')</a>
    <a href="#" class="button tiny cmdCloseModal">@lang('messages.cancelButton')</a>
</div>
<a class="close-reveal-modal">&#215;</a>