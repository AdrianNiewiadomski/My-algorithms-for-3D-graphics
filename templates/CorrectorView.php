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

			//if(isset($models)){
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/FileSaver.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/three.js"></script>';
			    echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/TrackballControls.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/lib/dat.gui.min.js"></script>';

				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/guiKorektor.js"></script>';
				echo '<script type="text/javascript" src="'.getConf()->app_url.'/js/korektor.js"></script>';
			//}

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

				<?php

					echo '<form action="'.getConf()->action_url.'save" method="post" enctype="multipart/form-data">';

						if ($this->user->login != ''){
							echo '<input type="submit" value="" name="wyslijNaSerwer" id="primaryButton" class="pure-button button-primary" style="height: 0px">';
						}
						echo '<input type="hidden" name="nazwa" 			id="nazwa"									value="">';

						echo '<input type="hidden" name="wierzcholki" 		id="wierzcholki" 		maxlength="524288" value="">';
						echo '<input type="hidden" name="sciany" 			id="sciany" 			maxlength="524288" value="">';
						echo '<input type="hidden" name="wektoryNormalne" 	id="wektoryNormalne"	maxlength="5242880" value="">';

						echo '<input type="hidden" name="wiadomosc" 	id="wiadomosc"	maxlength="524" value="">';
					echo '</form>';

					echo '<div class="komentarze">';
		                if (getMessages()->isError()){
		                    //echo '<div class="messages error">';
							echo '<div class="error_comments">';
		                        echo '<ul>';
		                            foreach (getMessages()->getErrors() as $err){
		                                echo '<li>'.$err.'</li>';
		                            }
		                        echo '</ul>';
		                    echo '</div>';
		                }

		               if (getMessages()->isInfo()){
		                    //echo '<div class="messages info">';
							echo '<div class="info_comments">';
		                        echo '<ul>';
		                            foreach (getMessages()->getInfos() as $inf){
		                                echo '<li>'.$inf.'</li>';
		                            }
		                        echo '</ul>';
		                    echo '</div>';
		                }
		            echo '</div>';

				?>

				<script type="text/javascript">
					var pliki = [];
					var sciezka;
					var sciezka2;

					<?php
				        foreach ($wanted as $m){
				            echo 'pliki.push("'.$m.'");';
				        }
						echo 'sciezka = "'.getConf()->uploads.'";';
						echo 'sciezka2 = "'.getConf()->models.'";';


					?>

					//displayGUI();
					var scene, camera, renderer, controls;
					inicjujScene();
					var model = new Model();

					<?php
						(isset($plik))?:$plik="";
						if(($plik!="")&&($plik!="text.txt")){
							//echo 'model.wczytajZServera(sciezka2+"'.$plik.'");';
							echo 'model.wczytajZServeraIPopraw(sciezka2+"'.$plik.'");';

						}else{
							echo 'model.wczytajZServera(sciezka+"text.txt");';
						}

						if ($this->user->login != ''){
							echo 'displayGUI(true, "'.$plik.'");';
						}else{
							echo 'displayGUI(false, "'.$plik.'");';
						}
					?>

				</script>
			</div>
		</div>
	</body>
</html>
