<div class="row">

    <div class="button-bar">
        <ul class="button-group">
            <li><a href="#" class="button small" id="cmdNewAccountModal">@lang('messages.newAccountButton')</a></li>

        </ul>
    </div> 
</div>
<div class="row">
    <div class="large-12 columns">
        <table>
            <thead>
                <tr>
                    <th>@lang('messages.loginTabTitle')</th>
                    <th>@lang('messages.nameTabTitle')</th>
                    <th>@lang('messages.roleTabTitle')</th>
                    <th>@lang('messages.activeTabTitle')</th>
                    <th>@lang('messages.companyTabTitle')</th>
                    <th>@lang('messages.actionTabTitle')</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>jules</td>
                    <td>Jules Laville</td>
                    <td>Grand admin GODLIKE</td>
                    <td><input id="activated" type="checkbox" disabled checked></td>
                    <td>HE-ARC</td>
                    <td>
                        <a href="#" class="button split tiny">@lang('messages.editButton') <span data-dropdown="drop-admin-1"></span></a>
                        <ul id="drop-admin-1" class="f-dropdown" data-dropdown-content>								
                            <li><a href="#">@lang('messages.removeSubButton')</a></li>
                            <li><a href="#">@lang('messages.resetPasswordSubButton')</a></li> 
                        </ul>
                    </td>	
                </tr>
                <tr>
                    <td>caillou</td>
                    <td>Stéphane Chatelat</td>
                    <td>Lecture seul</td>
                    <td><input id="activated" type="checkbox" disabled></td>
                    <td>Le squat</td>
                    <td>
                        <a href="#" class="button split tiny">Modifier <span data-dropdown="drop-admin-2"></span></a>
                        <ul id="drop-admin-2" class="f-dropdown" data-dropdown-content>								
                            <li><a href="#">Supprimer</a></li>
                            <li><a href="#">Réinitialiser mot de passe</a></li> 
                        </ul>
                    </td>		
                </tr>
            </tbody>
        </table>
    </div>
</div>