<h2>@lang('messages.userModalTitle')</h2>   
<form data-abide="ajax" id="addUserForm">
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
            <label>@lang('messages.nameLabel')
                <input type="text" required pattern="[a-zA-Z]+" name="fullname" value="{{{isset($user) ? $user->fullname:''}}}" placeholder="@lang('messages.namePlaceholder')" />
            </label>
        <small class="error" id="nameError">@lang('messages.nameError')</small>
        </div>
        <div class="row">	
            <label>@lang('messages.loginLabel')
                <input type="text" required pattern="alpha_numeric" name="login" value="{{{isset($user) ? $user->username:''}}}" placeholder="@lang('messages.loginPlaceholder')" />
            </label>
        <small class="error" id="loginError">@lang('messages.loginError')</small>
        </div>
        <div class="row">	
            <label>@lang('messages.emailLabel')
                <input type="email" required name="email" value="{{{isset($user) ? $user->email:''}}}" placeholder="@lang('messages.emailPlaceholder')" />
            </label>
            <small class="error" id="emailError">@lang('messages.emailError')</small>
        </div>
        <div class="row">
            <label>@lang('messages.passwordLabel')
                <input type="password" name="password" id="passwordBase" placeholder="@lang('messages.passwordPlaceholder')"/>
            </label>
            <small class="error" id="passwordError">@lang('messages.passwordError')</small>
        </div>
        <div class="row">
            <label>@lang('messages.passwordConfirmLabel')
                <input type="password" data-equalto="passwordBase" name="passwordConfirm" id="passwordConfirm" placeholder="@lang('messages.passwordPlaceholder')"/>
            </label>
            <small class="error" id="passwordConfirmError">@lang('messages.passwordConfirmError')</small>
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
        <button type="submit" class="button tiny">{{$submitText}}</button>
        <!-- A SUPPRIMER <a href="#" class="button tiny cmdAddUser">@lang('messages.newUserButton')</a>
        -->
        <a href="#" class="button tiny cmdCloseModal">@lang('messages.cancelButton')</a>
    </div>
</form>
    <a class="close-reveal-modal">&#215;</a>

<script>initUserRegister();</script>