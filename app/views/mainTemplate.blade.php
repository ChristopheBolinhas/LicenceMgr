<!doctype html>
<html class="js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>User interface</title>
    
    {{ HTML::style('css/foundation.css') }}
    {{ HTML::style('js/jstree/themes/default/style.min.css') }}
    {{ HTML::style('foundation-icons/foundation-icons.css') }}
    
    
    {{ HTML::script('js/vendor/modernizr.js') }}
    {{ HTML::script('js/vendor/jquery.js') }}
    {{ HTML::script('js/vendor/fastclick.js') }}
    {{ HTML::script('js/foundation.min.js') }}
    {{ HTML::script('js/jstree/jstree.min.js') }}
    {{ HTML::script('js/tree.js') }}
	</head>
	<body>
	<!-- Modals definitions -->
	
	<!-- Ajout éditeur -->
	<div id="newEditeur" class="reveal-modal small" data-reveal>
		<h2>Ajout éditeur</h2>
		<div class="panel">
			<div class="row">	
				<label>Nom</label>
				<input type="text" placeholder="Nom de l'éditeur" />
			</div>
			<div class="row">
				<input type="radio" name="catalogue" value="addPublicEdit" id="addPublicEdit"><label for="addPublicEdit">Public</label>
				<input type="radio" name="catalogue" value="addPrivateEdit" id="addPrivateEdit"><label for="addPrivateEdit">Privé</label>
			</div>
		</div>
		<div class="row">
				<a href="#" class="button [tiny small large]">Ajouter</a>
				<a href="#" class="button [tiny small large]">Annuler</a>
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<!-- Ajout programme -->
	<div id="newProgramme" class="reveal-modal small" data-reveal>
		<h2>Ajout programme</h2>
		<div class="panel">
			<div class="row">	
				<label>Editeur</label>
				<select>
          @if (count($editorList_public) > 0)
            @foreach($editorList_public as $editor)
          <option value="{{$editor->id}}">{{$editor->name}}</option>
            @endforeach
          
          @endif
				 </select>
			</div>
			<div class="row">	
				<label>Parent</label>
				<select>
					<option value="fr">-- None --</option>
					<option value="fr">Microsft</option>
					<option value="en">HP</option>
					<option value="de">Oracle</option>
					<option value="it">JetBrain</option>
				 </select>
			</div>
			<div class="row">	
				<label>Nom</label>
				<input type="text" placeholder="Nom de l'éditeur" />
			</div>
			<div class="row">
				<input type="radio" name="catalogue" value="addPublicProg" id="addPublicProg"><label for="addPublicProg">Public</label>
				<input type="radio" name="catalogue" value="addPrivateProg" id="addPrivateProg"><label for="addPrivateProg">Privé</label>
			</div>
		</div>
		<div class="row">
				<a href="#" class="button [tiny small large]">Ajouter</a>
				<a href="#" class="button [tiny small large]">Annuler</a>
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<!-- Ajout licence -->
	<div id="newLicence" class="reveal-modal small" data-reveal>
		<h2>Ajout licence</h2>
		<div class="panel">	
			<div class="row">	
				<label>Description</label>
				<input type="text" placeholder="Description" />
			</div>
			<div class="row">	
				<label>Clé</label>
				<input type="text" placeholder="Clé (ex. XXX-XXX...)" />
			</div>
			<div class="row">
				<center><b>OU</b></center>
			</div>
			<div class="row">	
				<label>Fichier</label>
				<input type="file" placeholder="Chemin de la clé" />
			</div>
		</div>
		<div class="row">
				<a href="#" class="button [tiny small large]">Ajouter</a>
				<a href="#" class="button [tiny small large]">Annuler</a>
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<!-- Login modal -->
	<div id="loginModal" class="reveal-modal small" data-reveal>
		<h2>Authentification</h2>
		<div class="panel">
			<div class="row">	
				<label>Login</label>
				<input type="text" placeholder="Login" />
			</div>
			<div class="row">	
				<label>Mot de passe</label>
				<input type="password" placeholder="******" />
			</div>
		</div>
		<div class="row">
				<a href="#" class="button [tiny small large]">Ajouter</a>
				<a href="#" class="button [tiny small large]">Annuler</a>
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<!-- Login modal -->
	<div id="newAccountModal" class="reveal-modal small" data-reveal>
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
				<a href="#" class="button [tiny small large]">Annuler</a>
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<!-- Entreprise modal -->
	<div id="newCompanyModal" class="reveal-modal small" data-reveal>
		<h2>Ajout d'une entreprise</h2>
		<div class="panel">
			<div class="row">	
				<label>Nom</label>
				<input type="text" placeholder="Nom" />
			</div>
			<div class="row">	
				<label>Abbrévation</label>
				<input type="text" placeholder="Ex. : HE-ARC" />
			</div>
			<div class="row">	
				<label>Site internet</label>
				<input type="text" placeholder="www.monsite.ch" />
			</div>
			<div class="row">	
				<label>Email référent</label>
				<input type="email" placeholder="user@mysite.com" />
			</div>
		</div>
		<div class="row">
				<a href="#" class="button [tiny small large]">Créer l'entreprise</a>
				<a href="#" class="button [tiny small large]">Annuler</a>
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	
	<!-- Paramètre modal -->
	<div id="parameterModal" class="reveal-modal small" data-reveal>
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
			<a href="#" class="button [tiny small large]">Enregistrer</a>
			<a href="#" class="button [tiny small large]">Annuler</a>
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	
	<!-- navBar start -->
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
		<li class="name">
		  <h1><a href="#"><i class="fi-key"></i> LicenceMgr</a></h1>
		</li>
		
		 
		</ul>
		<section class="top-bar-section">
            <ul class="right">

                <li class="has-form">
                    <select>
                        <option value="fr">Français</option>
                        <option value="en">English</option>
                        <option value="de">Deutsch</option>
                        <option value="it">Italian</option>
                     </select>
                </li>
                <li class="name"><a>Invité</a></li>

                <li>
                    <a href="#" data-reveal-id="loginModal">
                        <i class="step fi-power size-48"></i>
                    </a>
                </li>
                <li>
                    <a href="#" data-reveal-id="parameterModal">
                        <i class="step fi-widget size-48"></i>
                    </a>
                </li>
                <li class="divider"></li>
            </ul>
		</section>
  </nav>
  <!-- Nav bar end -->
  <!-- Main panel -->
  <div class="panel">
	<div class="row">
		<ul class="tabs" data-tab role="tablist">
			<li class="tab-title active" role="presentational" ><a href="#panel-user" role="tab" tabindex="0" aria-selected="true" controls="panel-user">Gestion des licences</a></li>
			<li class="tab-title" role="presentational" ><a href="#panel-admin" role="tab" tabindex="0"aria-selected="false" controls="panel-admin">Gestion des utilisateurs</a></li>
		</ul>
	</div>
	<div class="tabs-content">
		<section role="tabpanel" aria-hidden="false" class="content active" id="panel-user">
			<div class="row">
				<div class="button-bar">
					<ul class="button-group">
						<li><a href="#" class="button small" data-reveal-id="newEditeur">Nouveau editeur</a></li>
						<li><a href="#" class="button small" data-reveal-id="newProgramme">Nouveau programme</a></li>
						
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
				<div class="large-2 columns">
					<h3>Programmes</h3>
						<div id="jstree">
							
						</div>
		
				</div>
			
				<div class="large-10 columns">
					<h3>Licences</h3>
					<a href="#" class="button tiny" data-reveal-id="newLicence">Ajouter licences</a>
                    <div id="licences"></div>
					
				</div>
			</div>			
		</section>
		<section role="tabpanel" aria-hidden="true" class="content" id="panel-admin">
			<div class="row">
				
				<div class="button-bar">
					<ul class="button-group">
						<li><a href="#" class="button small" data-reveal-id="newCompanyModal">Nouvelle entreprise</a></li>
						<li><a href="#" class="button small" data-reveal-id="newAccountModal">Nouveau compte</a></li>
						
					</ul>
				</div> 
			</div>
			<div class="row">
				<div class="large-12 columns">
					<table>
						<thead>
							<tr>
								<th>Login</th>
								<th>Nom</th>
								<th>Rôle</th>
								<th>Activé</th>
								<th>Entreprise</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>jules</td>
								<td>Jules Laville</td>
								<td>Grand admin GODLIKE</td>
								<td><input id="activated" type="checkbox" disabled checked></td>
								<td>HE-ARC</td>
								<td>
									<a href="#" class="button split tiny">Modifier <span data-dropdown="drop-admin-1"></span></a>
									<ul id="drop-admin-1" class="f-dropdown" data-dropdown-content>								
										<li><a href="#">Supprimer</a></li>
										<li><a href="#">Réinitialiser mot de passe</a></li> 
									</ul>
								</td>	
							</tr>
							<tr>
								<td>caillou</td>
								<td>Stéphane Chatelat</td>
								<td>Lecture seul</td>
								<td><input id="activated" type="checkbox" disabled></td>
								<td>Le squat</td>
								<td>
									<a href="#" class="button split tiny">Modifier <span data-dropdown="drop-admin-2"></span></a>
									<ul id="drop-admin-2" class="f-dropdown" data-dropdown-content>								
										<li><a href="#">Supprimer</a></li>
										<li><a href="#">Réinitialiser mot de passe</a></li> 
									</ul>
								</td>		
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
  
  
  </div>
  <!-- End main panel -->
	
	</body>
</html>