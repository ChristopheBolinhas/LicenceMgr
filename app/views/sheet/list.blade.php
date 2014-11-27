<h2>@lang('messages.manageFiles')</h2>
<table width="100%">
    <thead>
        <tr>
            <th>@lang('messages.nameTabTitle')</th>
            <th width="170">@lang('messages.actionTabTitle')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sheets as $sheet)
        <tr data-id="{{{ $sheet->id }}}">
            <td>{{{ $sheet->name }}}</td>
            <td>
                <a href="#" class="button split tiny text-center"><div style="display:inline" class="getSheet">@lang('messages.showKeyButton')</div> <span data-dropdown="drop-sheet-{{{ $sheet->id }}}"></span></a>
                <ul id="drop-sheet-{{{ $sheet->id }}}" class="f-dropdown" data-dropdown-content>
                    <li><a class="editSheet" href="#">@lang('messages.editSubButton')</a></li>
                    <li><a class="deleteSheet" href="#">@lang('messages.removeSubButton')</a></li>
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="panel text-center" id="newFileDropZone">
    <h4>Dropez un fichier ici</h4>
</div>
<div class="row">
    <a href="#" class="button tiny cmdCloseModal">@lang('messages.close')</a>
</div>
<a class="close-reveal-modal">&#215;</a>
<style>
#newFileDropZone {
    height:90px;
}
</style>