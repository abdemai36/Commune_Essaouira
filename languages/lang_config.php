<?php 

	//Check whether the language is set in session or not
	if(!isset($_SESSION['langu']))
	{
		//If Language is not set in session then set default language as Franch
		$_SESSION['langu'] = 'fr';
	}
	else if (isset($_GET['langu']) && $_SESSION['langu'] != $_GET['langu'] && !empty($_GET['langu'])){
		if($_GET['langu'] == 'fr'){
			$_SESSION['langu'] = 'fr';
			$_SESSION['dir'] = 'ltr';
		}
		else if ($_GET['langu'] == 'ar') {
			$_SESSION['langu'] = 'ar';		
			$_SESSION['dir'] = 'rtl';
		}
	}

	require_once $_SESSION['langu'].'.php';
?>