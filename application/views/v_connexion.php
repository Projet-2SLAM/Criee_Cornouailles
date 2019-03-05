<div id="connexion">
<?php 	
		echo validation_errors(); 
        echo form_open ('form/connexion');
        
        $login = array
            (
                'type'  => 'text',
                'name'  => 'login',
                'id'    => 'login',
                'value' => set_value('login'),
                'placeholder' => 'Login'
            );

            echo form_input($login);
            echo'<br/><br/>';
            
            $mdp = array
            (
                'type'  => 'password',
                'name'  => 'mdp',
                'id'    => 'mdp',
                'value' => set_value('mdp'),
                'placeholder' => 'Mot de passe'
            );
            
            echo form_input($mdp);
            echo'<br/><br/>';
?>      
        <input type="submit" class="btn btn-info" value="Valider" />
        </form>

</div>