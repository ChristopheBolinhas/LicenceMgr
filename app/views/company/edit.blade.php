<h2>{{{ $title }}}</h2>
<input type="hidden" name="id" value="{{{$company->id}}}" />
<div class="panel">
    <div class="row">	
        <label>@lang('messages.nameLabel')</label>
        <input type="text" placeholder="@lang('messages.companyNamePlaceholder')" value="{{{$company->name}}}" />
    </div>
</div>
<div class="row">
    <a href="#" class="button tiny {{{ $cmd }}}">{{{ $action }}}</a>
    <a href="#" class="button tiny cmdCloseModal">@lang('message.cancelButton')</a>
</div>
<a class="close-reveal-modal">&#215;</a>