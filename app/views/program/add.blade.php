<h2>Ajout programme à {{isset($title) ? $title : ''}}</h2>
<div class="panel programAddDiv">
    @if(isset($editorId))
        <input type="hidden" name="editor_id" value="{{$editorId}}" />
    @endif
    @if(isset($programId))
        <input type="hidden" name="program_id" value="{{$programId}}" />
    @endif
    <div class="row">	
        <label>Nom</label>
        <input type="text" name="name"placeholder="Nom de l'éditeur" />
    </div>
    <div class="row">
        <input type="radio" name="catalogue" value="0" id="addPublicProg" checked><label for="addPublicProg">Public</label>
        <input type="radio" name="catalogue" value="1" id="addPrivateProg"><label for="addPrivateProg">Privé</label>
    </div>
</div>
<div class="row">
    <a href="#" class="button tiny cmdNewProgram">Ajouter</a>
    <a href="#" class="button tiny cmdCloseModal">Annuler</a>
</div>
<a class="close-reveal-modal">&#215;</a>
