
    @if(isset($user))
            <h2>Paramètres</h2>
            <div class="panel">
                <h3>Général</h3>
                <div class="row">	
                    <label>Nom</label>
                    <input type="text" value="Jules Laville" />
                </div>
                <div class="row">	
                    <label>Email</label>
                    <input type="email" value="jules@laville.ch" />
                </div>
            </div>
            <div class="panel">
                <h3>Mot de passe</h3>
                <div class="row">	
                    <label>Nouveau mot de passe :</label>
                    <input type="password" placeholder="******" />
                </div>
                <div class="row">	
                    <label>Confirmer le mot de passe :</label>
                    <input type="password" placeholder="******" />
                </div>
            </div>
            <div class="row">
                <a href="#" class="button tiny">Enregistrer</a>
                <a href="#" class="button tiny cmdCloseModal">Annuler</a>
            </div>
            <a class="close-reveal-modal">&#215;</a>
    @endif
        