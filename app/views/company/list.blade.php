<table width="100%">
    <thead>
        <tr>
            <th>@lang('messages.nameTabTitle')</th>
            <th width="170">@lang('messages.actionTabTitle')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
        <tr data-id="{{{ $company->id }}}">
            <td>{{{ $company->name }}}</td>
            <td>
                <a href="#" class="button split tiny"><div style="display:inline" class="editCompany">@lang('messages.editSubButton')</div> <span data-dropdown="drop-company-{{{ $company->id }}}"></span></a>
                <ul id="drop-company-{{{ $company->id }}}" class="f-dropdown" data-dropdown-content>
                    <li><a href="#" class="deleteCompany">@lang('messages.removeSubButton')</a></li>
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>