@if(isset($users))
        <table width="100%">
            <thead>
                <tr>
                    <th>@lang('messages.loginTabTitle')</th>
                    <th>@lang('messages.nameTabTitle')</th>
                    <th>@lang('messages.roleTabTitle')</th>
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
                    <td>
                        {{{$user->companyName()}}}
                    </td>
                    <td>

                        <a href="#" class="button split tiny"><div style="display:inline" class="editUser">@lang('controls.editButton')</div> <span data-dropdown="drop-user-{{{ $user->id }}}"></span></a>
                <ul id="drop-user-{{{ $user->id }}}" class="f-dropdown" data-dropdown-content>							
                            <li><a class="deleteUser">@lang('controls.removeSubButton')</a></li>
                        </ul>
                  
                    </td>	
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif