<?php
if( isset($_POST['username']) && isset($_POST['password'])){
	if( $_POST['username'] == "subin" && $_POST['password'] == "blog" ){
		echo "correct";
	}else{
		echo "incorrect";
	}
}
?>