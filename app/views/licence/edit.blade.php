<h2>{{{ $title }}}</h2>
<input type="hidden" name="id" value="{{{$licence->id}}}" />
<input type="hidden" name="idParent" value="{{{ $idParent }}}" />
<div class="panel">
    <div class="row">
        <label>@lang('messages.nameLabel')</label>
        <input type="text" name="name" placeholder="@lang('messages.licenceNamePlaceholder')" value="{{{$licence->name}}}" />
    </div>
    <div class="row">
        <label>@lang('messages.keyLabel')</label>
        <input type="text" name="value" placeholder="@lang('messages.keyPlaceholder')" value="{{{$licence->value}}}" />
    </div>
</div>
<div class="row">
    <a href="#" class="button tiny {{{ $cmd }}}">{{{ $action }}}</a>
    <a href="#" class="button tiny cmdCloseModal">@lang('controls.cancelButton')</a>
</div>
<a class="close-reveal-modal">&#215;</a>