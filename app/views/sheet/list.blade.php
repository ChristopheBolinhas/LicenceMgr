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
            <td>{{startEditable("name", "/sheet/edit/".$sheet->id)}}{{{ $sheet->name }}}{{endEditable()}}</td>
            <td>
                <a href="#" class="button split tiny text-center"><div style="display:inline" class="getSheet">@lang('messages.showSheetButton')</div> <span data-dropdown="drop-sheet-{{{ $sheet->id }}}"></span></a>
                <ul id="drop-sheet-{{{ $sheet->id }}}" class="f-dropdown" data-dropdown-content>
                       <!-- JL : Je sais c'est mal, mais le fonctionnement classique (modal.on('click', '.class', fct)) ne marche pas, j'y ai passé une bonne heure, regardé avec christophe, et je n'ai pas trouvé la source du problème. donc je retourne au sources -->
                    <li><a onclick="deleteSheet(this)" href="#">@lang('messages.removeSubButton')</a></li>
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