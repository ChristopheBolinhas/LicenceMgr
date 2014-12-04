<h2>@lang('messages.manageFiles')</h2>
<table width="100%" id="sheetTable">
    <thead>
        <tr>
            <th>@lang('messages.nameTabTitle')</th>
            <th width="170">@lang('messages.fileNameTabTitle')</th>
            <th width="170">@lang('messages.actionTabTitle')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sheets as $sheet)
            @include('sheet.row', array('sheet'=>$sheet))
        @endforeach
    </tbody>
</table>
<div class="row panel text-center" id="fileupload" data-url="/sheet/add/{{{$licence_id}}}">
    <h4>Dropez un fichier ici</h4>
    <input type="file" multiple="multiple" name="file[]"  />
</div>
<div class="row">
    <div id="progress" class="progress radius">
        <span class="meter" style="width:0%"></span>
    </div>
</div>
<div class="row">
    <a href="#" class="button tiny cmdCloseModal">@lang('messages.close')</a>
</div>
<a class="close-reveal-modal">&#215;</a>
<style>
#fileupload {
    height:90px;
}
</style>
<script>
    $("#mainModal").foundation();
    sheetUpload.dropZone = $(sheetUpload.dropZoneSel);
    $('#fileupload').fileupload(sheetUpload).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
</script>
