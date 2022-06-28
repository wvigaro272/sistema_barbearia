<?php
	//conexão com o banco de dados

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "local_host";

	$connect = mysqli_connect($servername, $username, $password, $db_name);
	//Codificação para acentuação e caracteres especiais no banco de dados.\
	mysqli_set_charset($connect,"utf8");

	//Verificação de erro
	if (mysqli_connect_error()) {

		echo "Falha na conexão: ".mysqli_connect_error();
	}


?>