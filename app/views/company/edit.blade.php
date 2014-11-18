<h2>{{{ $title }}}</h2>
<input type="hidden" name="id" value="{{{$company->id}}}" />
<div class="panel">
    <div class="row">	
        <label>Nom</label>
        <input type="text" placeholder="Nom" value="{{{$company->name}}}" />
    </div>
</div>
<div class="row">
    <a href="#" class="button tiny {{{ $cmd }}}">{{{ $action }}}</a>
    <a href="#" class="button tiny cmdCloseModal">Annuler</a>
</div>
<a class="close-reveal-modal">&#215;</a>