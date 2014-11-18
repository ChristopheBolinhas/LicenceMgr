<div class="row">
    <div class="button-bar">
        <ul class="button-group">
            <li><a href="#" class="button small" data-reveal-id="mainModal" data-reveal-ajax="/editor/add">@lang('messages.newEditorButton')</a></li>
            <li><a href="#" class="button small error" id="cmdOpenNewProgram" >@lang('messages.newProgramButton')</a></li>

            <li><a href="#" class="button small">@lang('messages.exportButton')</a></li>
        </ul>
    </div> 
</div>
<div class="row">
    <div class="large-12 columns">
        <input type="radio" name="catalogueType" value="cComplete" id="cComplete"><label for="cComplete">@lang('messages.fullListLabel')</label>
        <input type="radio" name="catalogueType" value="cEnterprise" id="cEnterprise" checked="checked"><label for="cEnterprise">@lang('messages.privateListLabel')</label>

    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        <h3>@lang('messages.programTitle')</h3>
        <div id="jstree">

        </div>

    </div>

    <div class="large-8 columns">
        <h3>@lang('messages.licenceTitle')</h3>
        <a href="#" class="button tiny" id="addLicence">@lang('messages.addLicenceButton')</a>
        <div id="licences"></div>

    </div>
</div>