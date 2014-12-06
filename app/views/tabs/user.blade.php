<div class="row">
    @if(Auth::user()->IsAdmin() || Auth::user()->IsWrite())
    <div class="button-bar">
        <ul class="button-group">
            <!--<li><a href="#" class="button small" data-reveal-id="mainModal" data-reveal-ajax="/editor/add">@lang('messages.newEditorButton')</a></li>-->
            <li><a class="button small" id="cmdOpenNewEditor">@lang('controls.newEditorButton')</a></li>

            <li><a class="button small error" id="cmdOpenNewProgram" >@lang('controls.newProgramButton')</a></li>

            <!--<li><a class="button small">@lang('messages.exportButton')</a></li>-->
        </ul>
    </div> 
    @endif
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
        @if(Auth::user()->IsWrite() || Auth::user()->IsAdmin())
        <a href="#" class="button tiny" id="addLicence">@lang('controls.addLicenceButton')</a>
        @endif
        <div id="licences"></div>

    </div>
</div>
<script>
    initTreeFunction();
    initEditorFunctions();
    initProgramFunctions();
    initLicenceFunctions();
</script>