<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        word_row
* GENERATION DATE:  02.12.2016
* FOR MYSQL TABLE:  word
* FOR MYSQL DB:     test_db
* -------------------------------------------------------
*
*/


// **********************
// CLASS DECLARATION
// **********************

class word_row
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

public $word_id;   

public $word;   



// **********************
// CONSTRUCTOR METHOD
// **********************

function word_row(){



}


// **********************
// GETTER METHODS
// **********************


function getword_id(){
	return $this->word_id;
}

function getword(){
	return $this->word;
}

// **********************
// SETTER METHODS
// **********************


function setword_id($val){
	$this->word_id =  $val;
}

function setword($val){
	$this->word =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id){

	if(empty($db)){
		$dbConnection = new dbConnection();
		$db = new MySQL($dbConnection->host,$dbConnection->userdb,$dbConnection->pass,$dbConnection->dbname);	
	}
	$sql =  "SELECT * FROM word WHERE word_id = $id;";
	$result =  $db->query($sql);
	$row = $result->fetch();


	$this->word_id = $row['word_id'];

	$this->word = $row['word'];

}

// **********************
// DELETE
// **********************

function delete($id){

	if(empty($db)){
		$dbConnection = new dbConnection();
		$db = new MySQL($dbConnection->host,$dbConnection->userdb,$dbConnection->pass,$dbConnection->dbname);	
	}

	$sql = "DELETE FROM word WHERE word_id = $id;";
	$result = $db->query($sql);

}

// **********************
// INSERT
// **********************

function insert(){

	if(empty($db)){
		$dbConnection = new dbConnection();
		$db = new MySQL($dbConnection->host,$dbConnection->userdb,$dbConnection->pass,$dbConnection->dbname);	
	}
	
	$this->word = mysqli_real_escape_string($db->dbConn,$this->word);
	$this->word_id = ""; // clear key for autoincrement

	$sql = "INSERT INTO word ( word ) VALUES ( '$this->word' )";
	$result = $db->query($sql);
	$this->word_id = $result->insertID();		
	return $this->word_id;

}

// **********************
// UPDATE
// **********************

function update($id){

	if(empty($db)){
		$dbConnection = new dbConnection();
		$db = new MySQL($dbConnection->host,$dbConnection->userdb,$dbConnection->pass,$dbConnection->dbname);	
	}
	
	$this->word = mysqli_real_escape_string($db->dbConn,$this->word);

	$sql = " UPDATE word SET  word = '$this->word' WHERE word_id = $id ";

	$result = $db->query($sql);

}


} // class : end

?>