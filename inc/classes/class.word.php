<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        word
* GENERATION DATE:  02.12.2016
* FOR MYSQL TABLE:  word
* FOR MYSQL DB:     test_db
* -------------------------------------------------------
*
*/

require_once('helper.class.php');

// **********************
// CLASS DECLARATION
// **********************

class word
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

private $db;
private $my_word_collection;	


public function __construct ()
	{
		$this->my_word_collection = array();
	}

	private function get_data($sql){	
		if(empty($db)){
			$dbConnection = new dbConnection();
			$db = new MySQL($dbConnection->host,$dbConnection->userdb,$dbConnection->pass,$dbConnection->dbname);	
		}

		$results = $db->query($sql);					
	
		while($row=$results->fetch()){
			$word_row = new word_row();
				
			$word_row->word_id = $row['word_id'];
			$word_row->word = $row['word'];
			array_push($this->my_word_collection,$word_row);
				
		}				
		
		return $this->my_word_collection;

	}		

	public function get_word_collection($word_id){			
		return $this->get_data('SELECT * FROM word WHERE active = "Y" AND word_id = '.$word_id);
	}	

	public function get_words(){			
		return $this->get_data('SELECT * FROM word');
	}	


	public function __destruct ()
	{
		
	}

} // class : end

?>