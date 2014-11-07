<table>
    <thead>
        <tr>
            <th width="200">Nom</th>
            <th width="250">Licence</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($licences as $licence)
        <tr data-id="{{{ $licence->id }}}">
            <td>{{{ $licence->name }}}</td>
            <td>{{{ $licence->value }}}</td>
            <td>
                <a href="#" class="button split tiny text-center showLicence">Afficher la clé <span data-dropdown="drop-1"></span></a>
                <ul id="drop-1" class="f-dropdown" data-dropdown-content>								
                    <li><a class="editLicence" href="#">Modifier</a></li>
                    <li><a class="deleteLicence" href="#">Supprimer</a></li>
                    <li><a class="downloadLicence" href="#">Télécharger</a></li> 
                </ul>	
            </td>

        </tr>
        @endforeach
    </tbody>
</table>