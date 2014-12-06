<div class="row">
    <div class="button-bar">
        <ul class="button-group">
            <li><a href="#" class="button small" data-reveal-id="mainModal" data-reveal-ajax="/company/add">@lang('controls.addCompany')</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="large-12 columns" id="listCompanies">@lang('messages.loading')</div>
</div>
<script>
    initCompany();
</script>