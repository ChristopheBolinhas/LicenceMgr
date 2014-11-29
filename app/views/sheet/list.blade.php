<h2>@lang('messages.manageFiles')</h2>
<table width="100%" id="sheetTable">
    <thead>
        <tr>
            <th>@lang('messages.nameTabTitle')</th>
            <th>@lang('messages.fileNameTabTitle')</th>
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
    <div id="progress" class="progress">
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
    var url = '/sheet/add/1';
    $('#fileupload').fileupload({
        url: $('#fileupload').attr("data-url"),
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result, function (index, file) {
                $("#sheetTable tbody").append(file.html);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .meter').css('width', progress+'%');
        },
        error:function(e, data) {
            console.log("error");
            console.log("error.e", e);
            console.log("error.data", data);
        }
    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
</script>
