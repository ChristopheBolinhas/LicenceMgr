  
    {{ Form::open(array('url' => 'auth/login', 'method' => 'post', 'class' => 'form-horizontal panel')) }}  
    <h2>Authentification</h2>
 @if(Session::has('error'))
    <div data-alert class="alert-box alert" id="error-alert">
        {{ Session::get('error') }}
    </div>
    @endif     
    <div class="panel loginDiv">
        <div class="row">	
            <label>Login</label>
            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Nom')) }}
        </div>
        <div class="row">	
            <label>Mot de passe</label>
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Mot de passe')) }}
            {{ Form::checkbox('souvenir') }} <label for="souvenir">Se souvenir de moi ?</label>
        </div>
        <div class="row">    
            {{ Form::submit('Envoyer', array('class' => 'button tiny')) }}
        </div>
    </div>    
    {{ Form::close() }}
