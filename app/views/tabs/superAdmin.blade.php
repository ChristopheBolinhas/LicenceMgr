<div class="row">

    <div class="button-bar">
        <ul class="button-group">
            <li><a href="#" class="button small" data-reveal-id="mainModal", data-reveal-ajax="/company/add">Nouvelle entreprise</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
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
                        <a href="#" class="button split tiny">Modifier <span data-dropdown="drop-admin-1"></span></a>
                        <ul id="drop-admin-1" class="f-dropdown" data-dropdown-content>
                            <li><a href="#">Supprimer</a></li>
                            <li><a href="#">Réinitialiser mot de passe</a></li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>