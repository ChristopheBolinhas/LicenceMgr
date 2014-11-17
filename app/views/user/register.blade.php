<h2>Création d'un utilisateur</h2>
		<div class="panel">
			<div class="row">	
				<label>Entreprise</label>
				<select>
					<option value="fr">HE-ARC</option>
					<option value="fr">Jules corp.</option>
					<option value="en">Le squatt à caillou</option>
				 </select>
			</div>
			<div class="row">	
				<label>Login</label>
				<input type="text" placeholder="Login" />
			</div>
			<div class="row">	
				<label>Email</label>
				<input type="email" placeholder="user@mysite.com" />
			</div>
			<div class="row">
				<label>Droits</label>
				<input id="checkbox1" type="checkbox"><label for="checkbox1">Utilisateur lecture</label>
				<input id="checkbox2" type="checkbox"><label for="checkbox2">Gestionnaire de clés</label>
				<input id="checkbox3" type="checkbox"><label for="checkbox3">EUh un autre role encore</label>
			</div>
		</div>
		
		<div class="row">
				<a href="#" class="button [tiny small large]">Créer utilisateur</a>
				<a href="#" class="button [tiny small large] cmdCloseModal">Annuler</a>
		</div>
		<a class="close-reveal-modal">&#215;</a>