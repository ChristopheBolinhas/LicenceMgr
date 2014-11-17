<h2>{{{ $title }}}</h2>
<input type="hidden" name="id" value="{{{$licence->id}}}" />
<input type="hidden" name="idParent" value="{{{ $idParent }}}" />
<div class="panel">
    <div class="row">
        <label>Nom</label>
        <input type="text" name="name" placeholder="Nom" value="{{{$licence->name}}}" />
    </div>
    <div class="row">
        <label>Clé</label>
        <input type="text" name="value" placeholder="Clé (ex. XXX-XXX...)" value="{{{$licence->value}}}" />
    </div>
</div>
<div class="row">
    <a href="#" class="button tiny {{{ $cmd }}}">{{{ $action }}}</a>
    <a href="#" class="button tiny cmdCloseModal">Annuler</a>
</div>
<a class="close-reveal-modal">&#215;</a>