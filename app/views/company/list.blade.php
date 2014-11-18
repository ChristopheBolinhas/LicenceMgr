<table width="100%">
    <thead>
        <tr>
            <th>Nom</th>
            <th witdh="200">Actions<th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
        <tr>
            <td>{{{ $company->name }}}</td>
            <td>
                <a href="#" class="button split tiny">Modifier <span data-dropdown="drop-company-{{{ $company->id }}}"></span></a>
                <ul id="drop-company-{{{ $company->id }}}" class="f-dropdown" data-dropdown-content>
                    <li><a href="#">Supprimer</a></li>
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>