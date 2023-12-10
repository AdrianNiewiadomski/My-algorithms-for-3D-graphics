<!DOCTYPE html>
<html lang ="pl">
	<head>
		<meta charset="UTF-8">
		<title>Metody generowania przekrojow pionowych obiektow 3D</title>


		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">

		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

		<?php
			//<link rel="stylesheet" href="{$conf->app_url}/css/global.css">
			echo '<link rel="stylesheet" href="'.getConf()->app_url.'/css/menuGlowne.css">';
			echo '<link rel="stylesheet" href="'.getConf()->app_url.'/css/style.css">';
			//<script type="text/javascript" src="{$conf->app_url}/js/helper_functions.js"></script>


			//{if isset($models)}

				//{if $models eq ''}
				//	<script type="text/javascript" src="{$conf->app_url}/js/FileSaver.js"></script>
				//{else}
				//	<script type="text/javascript" src="{$conf->app_url}/js/toggleMenu.js"></script>
				//{/if}
				//<link rel="stylesheet" href="{$conf->app_url}/css/sidebarMenu.css">

				//<script type="text/javascript" src="{$conf->app_url}/js/three.js"></script>
			    //<script type="text/javascript" src="{$conf->app_url}/js/OrbitControls.js"></script>
				//<script type="text/javascript" src="{$conf->app_url}/js/modelClass.js"></script>
			//{/if}

		?>

	</head>

	<body>
		<div class="body">
			<div id="navbar">

				<?php
					$aktywnyLink = explode("=", $_SERVER['REQUEST_URI'])[1];

					echo '<a href="'.getConf()->action_url.'viewModels" class="nav-item '.($aktywnyLink=='viewModels'?"active":"").'">Aplikacja główna</a>';
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
							echo '<a href="'.getConf()->action_url.'personList" class="nav-item">Użytkownicy</a>';
						echo '</div>';
					}

					if ($this->user->login == ''){
						echo '<div class="logout">';
							echo '<a href="'.getConf()->action_url.'login" class="nav-item">Zaloguj</a>';
						echo '</div>';
					}
				?>

			</div>



		</div>

		<div id="content">

			<br><br><br><br><br>
			<h1>Proszę wybrać link z menu</h1>
		</div>

	</body>
</html>
