<!-- Ajout éditeur -->
<h2>Ajout éditeur</h2>
<div class="panel">
    <div class="row">	
        <label>Nom</label>
        <input name="name" type="text" placeholder="Nom de l'éditeur" />
    </div>
    <div class="row">
        <input type="radio" name="cataloguePu" value="addPublicEdit" id="addPublicEdit" checked><label for="addPublicEdit">Public</label>
        <input type="radio" name="cataloguePr" value="addPrivateEdit" id="addPrivateEdit"><label for="addPrivateEdit">Privé</label>
    </div>
</div>
<div class="row">
    <a href="#" class="button tiny cmdNew">Ajouter</a>
    <a href="#" class="button tiny cmdCloseModal">Annuler</a>
</div>
<a class="close-reveal-modal">&#215;</a>