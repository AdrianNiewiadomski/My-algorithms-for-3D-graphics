<!DOCTYPE html>
<html lang ="pl">
	<head>
		<meta charset="UTF-8">
		<title>Metody generowania przekrojow pionowych obiektow 3D</title>


		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">

		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <?php
			echo '<link rel="stylesheet" href="'.getConf()->app_url.'/css/menuGlowne.css">';
            echo '<link rel="stylesheet" href="'.getConf()->app_url.'/css/style.css">';
            echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/helper_functions.js"></script>';

			if(isset($models)){
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/three.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/dat.gui.min.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/binaryReader.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/g3dReader.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/TrackballControls.js"></script>';

				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/gui.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/main.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/model.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/odcinek.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/normalnyDoWierzcholka.js"></script>';
			}
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
							echo '<div class="logout">';
								echo '<a href="'.getConf()->action_url.'logout" class="nav-item">Wyloguj</a>';
							echo '</div>';
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

			<div id="content">
				<div id="canvas">
					<canvas id="my_canvas"></canvas>
				</div>

				<script type="text/javascript">

					var xro, yro, zro;
					var pliki = [];
					var sciezka;
					<?php
				        foreach ($wanted as $m){
				            echo 'pliki.push("'.$m.'");';
				        }
						echo 'sciezka = "'.getConf()->uploads.'";';
				    ?>

					displayGUI();
					inicjujScene();
					animate();

				</script>
			</div>
		</div>
	</body>
</html>
