<table width="100%">
    <thead>
        <tr>
            <th width="200">Nom</th>
            <th>Licence</th>
            <th width="170">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($licences as $licence)
        <tr data-id="{{{ $licence->id }}}">
            <td>{{{ $licence->name }}}</td>
            <td class="licence">*****</td>
            <td>
                <a href="#" class="button split tiny text-center"><div style="display:inline" class="showLicence">Afficher la clé</div> <span data-dropdown="drop-lic-{{{ $licence->id }}}"></span></a>
                <ul id="drop-lic-{{{ $licence->id }}}" class="f-dropdown" data-dropdown-content>
                    <li><a class="editLicence" href="#">Modifier</a></li>
                    <li><a class="deleteLicence" href="#">Supprimer</a></li>
                    @foreach ($licence->sheets as $file)
                    <li><a class="downloadLicence" data-id="{{{ $file->id }}}" href="#">Télécharger '{{{ $file->name }}}'</a></li>
                    @endforeach
                </ul>
            </td>            
        </tr>
        @endforeach
    </tbody>
</table>