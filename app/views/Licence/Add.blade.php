<form method="POST" action="/licence/add">
    <input type="hidden" name="idParent" value="{{{ $idParent }}}" />
    <h2>Ajout licence</h2>
    <div class="panel">
        <div class="row">
            <label>Nom</label>
            <input type="text" name="name" placeholder="Nom" />
        </div>
        <div class="row">
            <label>Clé</label>
            <input type="text" name="value" placeholder="Clé (ex. XXX-XXX...)" />
        </div>
        <div class="row">
            <label>
                Fichier 
                <a href="#" id="addFile" data-count="0">
                    <i class="step fi-plus size-48"></i>
                </a>
            </label>
        </div>
    </div>
    <div class="row">
        <a href="#" class="button tiny cmdAddLicence">Ajouter</a>
        <a href="#" class="button tiny cmdCloseModal">Annuler</a>
    </div>
</form>
<a class="close-reveal-modal">&#215;</a>