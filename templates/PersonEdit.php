<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Metody generowania przekrojow pionowych obiektow 3D</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

	<?php
		echo '<link rel="stylesheet" href="'.getConf()->app_url.'/css/style.css">';
		echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/helper_functions.js"></script>';
	?>

</head>

<body style="margin: 20px;">

    <div class="bottom-margin">

	<?php
		echo '<form action="'.getConf()->action_url.'personSave" method="post" class="pure-form pure-form-aligned">';
			echo '<fieldset>';
				echo '<div class="pure-control-group">';
					echo '<label for="id_imie">Imię: </label>';
					echo '<input id="id_imie" type="text" name="imie" value="'.(isset($this->form->imie)?$this->form->imie:"").'"/>';
				echo '</div>';
				echo '<div class="pure-control-group">';
					echo '<label for="id_nazwisko">Nazwisko: </label>';
					echo '<input id="id_nazwisko" type="text" name="nazwisko" value="'.(isset($this->form->nazwisko)?$this->form->nazwisko:"").'"/>';
				echo '</div>';
				echo '<div class="pure-control-group">';
					echo '<label for="id_e-mail">e-mail: </label>';
					echo '<input id="id_e-mail" type="text" name="email" value="'.(isset($this->form->email)?$this->form->email:"").'"/>';
				echo '</div>';
				echo '<div class="pure-control-group">';
					echo '<label for="id_plec">Płeć: </label>';
					echo '<select id="id_plec" name="plec" >';

						if (isset($this->form->plec)){
							echo '<option value="'.$this->form->plec.'">'.$this->form->plec.'</option>';
							if ($this->form->plec == "K"){
								echo '<option value="M"> M</option>';
							} else {
								echo '<option value="K"> K</option>';
							}
						} else {
							echo '<option value="K">K</option>';
							echo '<option value="M">M</option>';
						}

					echo '</select>';
				echo '</div>';
				echo '<div class="pure-control-group">';
					echo '<label for="birthdate">Data ur.</label>';
					echo '<input id="birthdate" type="text" placeholder="RRRR-MM-DD" name="data_urodzenia" value="'.(isset($this->form->data_urodzenia)?$this->form->data_urodzenia:"").'"/>';
				echo '</div>';
				echo '<div class="pure-control-group">';
					echo '<label for="id_login">Login: </label>';
					echo '<input id="id_login" type="text" name="login" value="'.(isset($this->form->login)?$this->form->login:"").'"/>';
				echo '</div>';
				echo '<div class="pure-control-group">';
					echo '<label for="id_pass">Hasło: </label>';
					echo '<input id="id_pass" type="text" name="haslo" value="'.(isset($this->form->haslo)?$this->form->haslo:"").'"/><br />';
				echo '</div>';


				echo '<div class="pure-control-group">';
					echo '<label for="id_rola">Rola: </label>';
					echo '<select id="id_rola" name="rola" >';

						if (isset($this->form->rola)){
						echo '<option value="'.$this->form->rola.'">'.$this->form->rola.'</option>';
							if ($this->form->rola == "admin"){
								echo '<option value="user"> user</option>';
							} else{
								echo '<option value="admin"> admin</option>';
							}
						} else {
							echo '<option value="user">user</option>';
							echo '<option value="admin">admin</option>';
						}
					echo '</select>';
				echo '</div>';

				echo '<div class="pure-controls">';
					echo '<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>';
					echo '&nbsp;';
					echo '<a class="pure-button button-secondary" href="'.getConf()->action_url.'personList">Powrót</a>';
				echo '</div>';
			echo '</fieldset>';
			echo '<input type="hidden" name="id_osoby" value="'.(isset($this->form->id_osoby)?$this->form->id_osoby:"").'">';
		echo '</form>';
	?>

    </div>



	<?php
		echo '<div class="bottom-margin">';
			if (getMessages()->isError()){
				echo '<div class="messages error">';
					echo '<ol>';
						foreach (getMessages()->getErrors() as $err){
							echo '<li>'.$err.'</li>';
						}
					echo '</ol>';
				echo '</div>';
			}

			if (getMessages()->isInfo()){
				echo '<div class="messages info">';
					echo '<ol>';
						foreach (getMessages()->getInfos() as $inf){
							echo '<li>'.$inf.'</li>';
						}
					echo '</ol>';
				echo '</div>';
			}
		echo '</div>';

	?>

</body>

</html>
