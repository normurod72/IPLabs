<?php

$file_contents;

if($_SERVER['REQUEST_METHOD']=='POST'){

	if(isset($_POST['read_all'])){
	
		echo json_encode(read_all_contents());
	
	}else if(isset($_POST['add'])){
	
		add_one_item($_POST['val'],"\n");
	
		echo json_encode(array('success' => 1 ));
	
	}else if(isset($_POST['delete'])){
	
		$file_contents=read_all_contents();
	
		delete_contents();
	
		for ($i=1; $i < count($file_contents); $i++) { 
	
			add_one_item($file_contents[$i],"");
	
		}
	
		echo json_encode(array('success' => 1 ));
	
	}else if(isset($_POST['write_all'])){
		
		$myfile = fopen("todolist.txt", "w") or die("Unable to open file!");
		
		for ($i=0; $i < count($_POST["items"]); $i++) { 
	
			if($i!=count($_POST["items"])-1){
				fwrite($myfile, $_POST["items"][$i]."\n");
			}else{
				fwrite($myfile, $_POST["items"][$i]);
			}
	
		}
			
		fclose($myfile);	
	
		echo json_encode(array('success' => 1 ));
	}

}

function read_all_contents(){
	$myfile = fopen("todolist.txt", "r") or die("Unable to open file!");
	$i=0;
	while(!feof($myfile)) {
  		$file_contents[$i]=fgets($myfile); $i++;
	}
	fclose($myfile);
	return $file_contents;
}

function add_one_item($item,$new_line){
	$myfile = fopen("todolist.txt", "a") or die("Unable to open file!");
	fwrite($myfile, $new_line.$item);
	fclose($myfile);
}

function delete_contents(){
	$myfile = fopen("todolist.txt", "w") or die("Unable to open file!");
	fwrite($myfile, NULL);
	fclose($myfile);	
}