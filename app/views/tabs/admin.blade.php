
<div class="row">

    <div class="button-bar">
        <ul class="button-group">
            <li><a href="#" class="button small" data-reveal-id="mainModal" data-reveal-ajax="/auth/add">@lang('messages.newAccountButton')</a></li>
        </ul>
    </div> 
</div>
<div class="row">
    <div class="large-12 columns">
        @if(isset($users))
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
                @foreach($users as $user)
                <tr data-id="{{{ $user->id }}}">
                    <td>{{{$user->username}}}</td>
                    <td>{{{$user->fullname}}}</td>
                    <td>
                    @foreach($user->roles as $role)
                        <?php echo Lang::get("role.$role->id") ?><br/>
                    @endforeach
                    </td>
                    <td><input id="activated" type="checkbox" disabled checked></td>
                    <td>
                        {{{$user->companyName()}}}
                    </td>
                    <td>
                        <a href="#" class="button split tiny" data-reveal-id="mainModal" data-reveal-ajax="/auth/edit/{{{ $user->id }}}">@lang('messages.editButton') <span data-dropdown="drop-user-{{{ $user->id }}}"></span></a>
                <ul id="drop-user-{{{ $user->id }}}" class="f-dropdown" data-dropdown-content>							
                            <li><a href="#">@lang('messages.removeSubButton')</a></li>
                            <li><a href="#">@lang('messages.resetPasswordSubButton')</a></li> 
                        </ul>
                    </td>	
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
<script>initUserFunction();</script>