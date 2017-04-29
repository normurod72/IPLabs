<?php
	try {
		$db=new PDO("mysql:host=localhost;dbname=imdb;","root","");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}

	if(isset($_GET['data'])){
		$search_item=$_GET['data'];
		$data=$db->query('SELECT first_name, last_name FROM actors WHERE first_name LIKE "'.$search_item.'%" LIMIT 25');
		$response="";
		foreach ($data->fetchAll() as $key => $value) {
			$response.="<option value='".$value['first_name']." ".$value['last_name']."'>"; 
		}
		echo $response;
	}