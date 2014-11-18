<table width="100%">
    <thead>
        <tr>
            <th>Nom</th>
            <th witdh="200">Actions<th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
        <tr data-id="{{{ $company->id }}}">
            <td>{{{ $company->name }}}</td>
            <td>
                <a href="#" class="button split tiny"><div style="display:inline" class="editCompany">Modifier</div> <span data-dropdown="drop-company-{{{ $company->id }}}"></span></a>
                <ul id="drop-company-{{{ $company->id }}}" class="f-dropdown" data-dropdown-content>
                    <li><a href="#" class="deleteCompany">Supprimer</a></li>
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>