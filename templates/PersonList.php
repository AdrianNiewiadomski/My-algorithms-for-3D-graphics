<!DOCTYPE html>
<html lang ="pl">
	<head>
		<meta charset="UTF-8">
		<title>Metody generowania przekrojow pionowych obiektow 3D</title>

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">

		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<!-- <link rel="stylesheet" href="{$conf->app_url}/css/bootstrap.css"> -->

		<?php
			echo '<link rel="stylesheet" href="'.getConf()->app_url.'/css/menuGlowne.css">';
			echo '<link rel="stylesheet" href="'.getConf()->app_url.'/css/style.css">';

            echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/helper_functions.js"></script>';
		 ?>
	</head>

	<body>
		<div id="navbar">
			<!--<div class="dropdown">
				<button class="dropbtn">
				  <i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
				  <a href="">Model 1</a>
				  <a href="">Model 2</a>
				</div>
			</div>-->
			<?php
				$aktywnyLink = explode("=", $_SERVER['REQUEST_URI'])[1];

				echo '<a href="'.getConf()->action_url.'viewModels" class="nav-item">Aplikacja główna</a>';
				echo '<a href="'.getConf()->action_url.'edit" class="nav-item '.(($aktywnyLink=='edit'||$aktywnyLink=='save')?'active':'').'">Korektor modeli</a>';

				if ($this->user->login != ''){
						//echo '<a href="'.getConf()->action_url.'upload" class="nav-item">Dodaj model</a>';


						echo '<div class="logout">';
							echo '<a href="'.getConf()->action_url.'logout" class="nav-item">Wyloguj</a>';
						echo '</div>';
						//<!--<div class="info_konta">Jesteś zalogowany jako {$user->login}</div>-->
				}

				if ($this->user->role == 'admin'){
					echo '<div class="logout">';
						echo '<a href="'.getConf()->action_url.'personList" class="nav-item active">Użytkownicy</a>';
					echo '</div>';
				}

				if ($this->user->login == ''){
					echo '<div class="logout">';
						echo '<a href="'.getConf()->action_url.'login" class="nav-item">Zaloguj</a>';
					echo '</div>';
				}
			?>

		</div>

<!--<div class="pure-menu pure-menu-horizontal bottom-margin">-->
	<!--<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>-->
<!--</div>-->
<!-- <div class="content"> -->                                      <!--     Wyszukiwanie       -->
	<!--<div class="bottom-margin">
		<form action="{$conf->action_root}personList" method="post" class="pure-form pure-form-stacked">
			<legend>Opcje wyszukiwania</legend>
			<fieldset>
				<input type="text" placeholder="nazwisko" name="sf_surname" value="{$searchForm->nazwisko}" /><br />
				<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
			</fieldset>
		</form>
	</div>
</div>-->



<div class="content">                           <!--     Dodawanie osób, edycja i usuwanie       -->
	<div class="person-list" style="position: relative; top:120px; width:90%;margin:0 auto;display:block;">

		<?php
			echo '<a class="pure-button button-success" href="'.getConf()->action_url.'personNew">+ Nowa osoba</a>';
		?>

		<br><br>

		<table class="pure-table pure-table-bordered">
			<thead>
				<tr>
					<th>id</th>
					<th>imię</th>
					<th>nazwisko</th>
					<th>e-mail</th>
					<th>płeć</th>
					<th>data ur.</th>
					<th>login</th>
					<th>hasło</th>
					<th>rola</th>
					<th>opcje</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($this->records as $p){
						$wpis = explode(" ",$p);
						echo '<tr>';
							echo '<td>'.$wpis[0].'</td>';
							echo '<td>'.$wpis[1].'</td>';
							echo '<td>'.$wpis[2].'</td>';
							echo '<td>'.$wpis[3].'</td>';
							echo '<td>'.$wpis[4].'</td>';
							echo '<td>'.$wpis[5].'</td>';
							echo '<td>'.$wpis[6].'</td>';
							echo '<td>'.$wpis[7].'</td>';
							echo '<td>'.$wpis[8].'</td>';
							echo '<td>';
								echo '<a class="button-small pure-button pure-button-primary" href="'.getConf()->action_url.'personEdit&id_osoby='.$wpis[0].'">Edytuj</a>';
								echo '&nbsp;';
								echo '<a class="button-small pure-button button-error" onclick=\'confirm_del("'.getConf()->action_url.'personDelete&login='.$wpis[6].'&id_osoby='.$wpis[0].'");\'>Usuń</a>';
							echo '</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</div>


</div>

	<?php
		echo '<div class="bottom-margin" style="position: relative; top:160px;">';
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
