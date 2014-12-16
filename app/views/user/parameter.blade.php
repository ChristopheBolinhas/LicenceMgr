@if(isset($user))
<h2>@lang('messages.parameterTitle')</h2>
<form data-abide="ajax" id="parameterForm">
    <div class="panel">
        <h3>@lang('messages.generalTitle')</h3>
        <div class="row">	
            <label>@lang('messages.nameLabel')
                <input type="text" name="fullname" required pattern="[a-zA-Z]+" value="{{{$user->fullname}}}" />
            </label>
            <small class="error" id="nameError">@lang('errors.nameError')</small>
        </div>
        <div class="row">	
            <label>@lang('messages.emailLabel')
                <input type="email" required name="email" value="{{{$user->email}}}" />
            </label>
            <small class="error" id="emailError">@lang('errors.emailError')</small>
        </div>
    </div>
    <div class="panel">
        <h3>@lang('messages.passwordTitle')</h3>
        <div class="row">	
            <label>@lang('messages.newPasswordLabel') :
                <input type="password" name="password" id="passwordBase" placeholder="@lang('messages.passwordPlaceholder')" />
            </label>
        </div>
        <div class="row">	
            <label>@lang('messages.confirmNewPasswordLabel') :
                <input type="password" data-equalto="passwordBase" placeholder="@lang('messages.passwordPlaceholder')" />
            </label>
            <small class="error" id="passwordConfirmError">@lang('errors.passwordConfirmError')</small>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="button tiny">@lang('controls.saveButton')</button>
        <a href="#" class="button tiny cmdCloseModal">@lang('controls.cancelButton')</a>
    </div>
</form>
<a class="close-reveal-modal">&#215;</a>
<script>initParameterUser()</script>
@endif
