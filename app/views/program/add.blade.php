<h2>Ajout programme</h2>
<div class="panel">
    <div class="row">	
        <label>Editeur</label>
        <select id="editor_id">
            @if (count($editorList_public) > 0)
                @foreach($editorList_public as $editor)
                    <option value="{{$editor->id}}">{{$editor->name}}</option>
                @endforeach

            @endif
        </select>
    </div>
    <div class="row">	
        <label>Parent</label>
        <select id="program_parent_id">
            
        </select>
    </div>
    <div class="row">	
        <label>Nom</label>
        <input type="text" placeholder="Nom de l'éditeur" />
    </div>
    <div class="row">
        <input type="radio" name="catalogue" value="addPublicProg" id="addPublicProg" selected><label for="addPublicProg">Public</label>
        <input type="radio" name="catalogue" value="addPrivateProg" id="addPrivateProg"><label for="addPrivateProg">Privé</label>
    </div>
</div>
<div class="row">
    <a href="#" class="button [tiny small large]">Ajouter</a>
    <a href="#" class="button [tiny small large]">Annuler</a>
</div>
<a class="close-reveal-modal">&#215;</a>
<script>
    $("#editor_id").change(function()
                          {
                              $.ajax({
                                  url: "/program/programs/"+ $(this).val(),
                                  success: function(data)
                                  {
                                      var dest = $("#program_parent_id");
                                      
                                      dest.html("");
                                       dest.append('<option value="'+this.id+'">Valeur VIDE</option>');
                                      $(data).each(function()
                                                  {
                                                      dest.append('<option value="'+this.id+'">'+this.name+'</option>');
                                                  });
                                      
                                      
                                  },
                                  dataType: "json"
                              });
                          });
</script>