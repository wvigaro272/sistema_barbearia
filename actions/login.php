<?php
// Sessão
session_start();

// Conexão
require_once 'db_connect.php';

// Clear - Proteção contra XSS (Cross Site Scripting)
function clear($input) {

	global $connect;
	//sql injection
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);

	return $var;
};



//verifica se existe dados na variavel do input email e senha da pagina cadastro.php
if (isset($_POST['email']) && isset($_POST['senha'])) {

	$email = clear($_POST['email']); //Pegando dados passados por AJAX 
	$senha = clear( $_POST['senha']); //Pegando dados passados por AJAX


	if (empty($email) or empty($senha)) {
		
		$retorno = array('codigo' => 0 , 'mensagem' => 'O campo email e senha devem ser preenchidos'); //array de retorno para o sucess do ajax, codigo 0 para erros e 1 para sucessos.
		echo json_encode($retorno);		//transformando o array em JSON para o ajax interpretar corretamente

	} else {

		$sql = "SELECT email FROM usuarios WHERE email = '".$email."' ";
		$resultado = mysqli_query($connect, $sql);
		$rows = mysqli_num_rows($resultado);

		if ($rows > 0) {

			$senha = md5($senha);       
			$sql = "SELECT * FROM usuarios WHERE email = '".$email."' AND senha = '".$senha."' ";
			$resultado = mysqli_query($connect, $sql);
			$rows = mysqli_num_rows($resultado);

			if ($rows == 1 ) {

				// sql para cadastrar na tabela log_login o horario e quem esta logando no sistema
				$sqlLog = "INSERT INTO 
						log_login (log_login, log_data)
						VALUES
						('".$email."', NOW() )";

				mysqli_query($connect, $sqlLog);
				
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				$_SESSION['usuario'] = $dados['nome'];
				$_SESSION['nivelAcesso'] = $dados['nivelAcesso'];

				$retorno = array('codigo' => 1 , 'mensagem' => 'painel_inicio.php');
				echo json_encode($retorno);					

			} else {

				$retorno = array('codigo' => 0 , 'mensagem' => 'Senha incorreta');
				echo json_encode($retorno);					

			};//fim do else2

		} else {

			$retorno = array('codigo' => 0 , 'mensagem' => 'Email não cadastrado');
			echo json_encode($retorno);

		};//fim do else3

	};//fim do else1



	

};//fim do if isset


?>

