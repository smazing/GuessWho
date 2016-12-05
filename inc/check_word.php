<?php
require_once "../inc/functions.php";

$guess = '';

if(isset($_POST['i'])){
    $i = $_POST['i'];
    $guess = $_POST['guess'];
    checkWord($i,$guess);
}



function checkWord($i,$guess){
	
	$guess = strtolower($guess);

	$w = new word_row();
	$w->select($i);

	if($guess == $w->getword()){
		echo 'Success!';
	}else{
		echo 'Fail!';
	} 

}

?>