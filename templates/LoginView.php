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
    <?php
        echo '<form action="'.getConf()->action_url.'check" method="post"  class="pure-form pure-form-aligned bottom-margin">';
    ?>
    	<legend><h3>Logowanie do systemu</h3></legend>
    	<fieldset>
            <div class="pure-control-group">
    			<label for="id_login">Login: </label>
    			<input id="id_login" type="password" name="login"/>
    		</div>
            <div class="pure-control-group">
    			<label for="id_pass">Hasło: </label>
    			<input id="id_pass" type="password" name="pass" /><br />
    		</div>
    		<div class="pure-controls">
    			<input type="submit" value="Zaloguj" class="pure-button pure-button-primary"/>
    		</div>
    	</fieldset>
    </form>




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
