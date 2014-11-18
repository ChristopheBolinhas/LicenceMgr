
@if(isset($title))
    <h2>@lang('messages.programModalTitle', array('name'=>$title))</h2>
@else
    <h2>@lang('messages.programModalTitle', array('name'=>'aucun'))</h2>
@endif

<div class="panel programAddDiv">
    @if(isset($editorId))
        <input type="hidden" name="editor_id" value="{{$editorId}}" />
    @endif
    @if(isset($programId))
        <input type="hidden" name="program_id" value="{{$programId}}" />
    @endif
    <div class="row">	
        <label>@lang('messages.nameLabel')</label>
        <input type="text" name="name"placeholder="@lang('messages.programNamePlaceholder')" />
    </div>
    <div class="row">
        <input type="radio" name="catalogue" value="0" id="addPublicProg" checked><label for="addPublicProg">@lang('messages.publicLabel')</label>
        <input type="radio" name="catalogue" value="1" id="addPrivateProg"><label for="addPrivateProg">@lang('messages.privateLabel')</label>
    </div>
</div>
<div class="row">
    <a href="#" class="button tiny cmdNewProgram">@lang('messages.addButton')</a>
    <a href="#" class="button tiny cmdCloseModal">@lang('messages.cancelButton')</a>
</div>
<a class="close-reveal-modal">&#215;</a>
