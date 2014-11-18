<div class="row">
    <div class="button-bar">
        <ul class="button-group">
            <li><a href="#" class="button small" data-reveal-id="mainModal" data-reveal-ajax="/editor/add">Nouveau editeur</a></li>
            <li><a href="#" class="button small error" id="cmdOpenNewProgram" >Nouveau programme</a></li>

            <li><a href="#" class="button small">Exporter</a></li>
        </ul>
    </div> 
</div>
<div class="row">
    <div class="large-12 columns">
        <input type="radio" name="catalogueType" value="cComplete" id="cComplete"><label for="cComplete">Catalogue complet</label>
        <input type="radio" name="catalogueType" value="cEnterprise" id="cEnterprise" checked="checked"><label for="cEnterprise">Catalogue d'entreprise</label>

    </div>
</div>
<div class="row">
    <div class="large-4 columns">
        <h3>Programmes</h3>
        <div id="jstree">

        </div>

    </div>

    <div class="large-8 columns">
        <h3>Licences</h3>
        <a href="#" class="button tiny" id="addLicence">Ajouter licences</a>
        <div id="licences"></div>

    </div>
</div>