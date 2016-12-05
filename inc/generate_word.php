<?php
require_once "../inc/functions.php";

//if(isset($_POST['l'])){
//    $l = $_POST['l'];
    generateWord();
//}



function generateWord(){
	$output = "";
	
	$w_coll = new word();
	$w_arr = $w_coll->get_words();

	$id = array_rand($w_arr) + 1;

	$w = new word_row();
	$w->select($id);

	$letter_array = str_split($w->getword());

	$i = 1;
	foreach($letter_array as $l){
		$output .= '<div class="control-group inline"><input type="text" class="form-control guess-box" id="'.$i.'" style="width:40px;height:40px;" value="" onkeyup="nextTab(this.id)" size="1" maxlength="1"></div>';
		$i++;
	}

	$output .= '&nbsp;&nbsp;<button type="button" class="btn btn-primary inline" onclick="check('.$w->getword_id().')">Check</button>&nbsp;<span class="check-results" style="color:red"></span><br><p style="color:#333333">Answer: '.$w->getword().'</p>';
	
	echo $output;

}

?>