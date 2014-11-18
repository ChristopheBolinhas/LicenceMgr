<!-- Ajout éditeur -->
<h2>@lang('messages.editorModalTitle')</h2>
<div class="panel">
    <div class="row">	
        <label>@lang('messages.nameLabel')</label>
        <input name="name" type="text" placeholder="@lang('messages.editorNamePlaceholder')" />
    </div>
    <div class="row">
        <input type="radio" name="catalogue" value="0" id="addPublicEdit" checked><label for="addPublicEdit">@lang('messages.publicLabel')</label>
        <input type="radio" name="catalogue" value="5" id="addPrivateEdit"><label for="addPrivateEdit">@lang('messages.privateLabel')</label>
    </div>
</div>
<div class="row">
    <a href="#" class="button tiny cmdNewEditor">@lang('messages.addButton')</a>
    <a href="#" class="button tiny cmdCloseModal">@lang('messages.cancelButton')</a>
</div>
<a class="close-reveal-modal">&#215;</a>