<?php
// Sessão
session_start();

// Conexão
require_once '../connections/db_connect.php';

// Clear - Proteção contra XSS (Cross Site Scripting)
function clear($input) {

	global $connect;
	//sql injection
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);

	return $var;
};



if (isset($_POST['nome']) && isset($_POST['sexo']) ) {
	
	$nome = clear($_POST['nome']); //Pegando dados passados por AJAX 
	$email = clear( $_POST['email']); //Pegando dados passados por AJAX
	$senha = clear( $_POST['senha']); //Pegando dados passados por AJAX
	$telefone = clear( $_POST['telefone']); //Pegando dados passados por AJAX
	$cpf = clear( $_POST['cpf']); //Pegando dados passados por AJAX
	$dataNascimento = implode("-",array_reverse(explode("/",clear( $_POST['dataNascimento']))));
	$sexo = clear( $_POST['sexo']); //Pegando dados passados por AJAX
	$cep = clear( $_POST['cep']); //Pegando dados passados por AJAX
	$endereco = clear( $_POST['endereco']); //Pegando dados passados por AJAX
	$numeroEndereco = clear( $_POST['numeroEndereco']); //Pegando dados passados por AJAX
	$bairroEndereco = clear( $_POST['bairroEndereco']); //Pegando dados passados por AJAX
	$uf = clear( $_POST['uf']); //Pegando dados passados por AJAX
	$cidade = clear( $_POST['cidade']); //Pegando dados passados por AJAX
	$segmento = clear( $_POST['segmento']); //Pegando dados passados por AJAX

	// sql para verificar se ja existe o email cadastrado
	$sql = " SELECT * FROM usuarios WHERE email =  '".$email."' ";
	$resultado = mysqli_query($connect, $sql);
	$rows = mysqli_num_rows($resultado);

	if ($rows > 0 ) {

		$retorno = array('codigo' => 0 , 'mensagem' => 'E-mail ja cadastrado, por favor selecione outro!'); //array de retorno para o sucess do ajax, codigo 0 para erros e 1 para sucessos.		
		echo json_encode($retorno);		//transformando o array em JSON para o ajax interpretar corretamente

		/* fecha conexão */
		mysqli_close($connect);
		
	} else {
		
		$senha = md5($senha); // criptografo a senha em md5 para inserir no banco, pois faço a conferencia no login atraves da criptografia md5
		// sql para cadastrar na tabela login os valores digitados na pagina casdatro.php
		$sql = "INSERT INTO 
				usuarios (nome, email, telefone, cpf, data_nascimento, sexo, endereco_rua, endereco_numero, endereco_bairro, endereco_cidade, endereco_cep, segmento_negocio, uf, senha)
				VALUES
				('".$nome."','".$email."', '".$telefone."', '".$cpf."', '".$dataNascimento."','".$sexo."','".$endereco."','".$numeroEndereco."','".$bairroEndereco."','".$cidade."','".$cep."','".$segmento."','".$uf."','".$senha."' )";

		//Verificação de sucesso ou erro ao cadastrar no banco.
		if (mysqli_query($connect, $sql)) {

			$retorno = array('codigo' => 1 , 'mensagem' => 'Cadastrado com Sucesso! Usuário: '.$email); //array de retorno para o sucess do ajax, codigo 0 para erros e 1 para sucessos.		
			echo json_encode($retorno);		//transformando o array em JSON para o ajax interpretar corretamente

			/* fecha conexão */
			mysqli_close($connect);

		} else {

			$erro = mysqli_error($connect);
			$retorno = array('codigo' => 0 , 'mensagem' => 'Erro ao cadastrar no banco'." Erro : ".$erro);   //array de retorno para o sucess do ajax, codigo 0 para erros e 1 para sucessos.
			echo json_encode($retorno);		//transformando o array em JSON para o ajax interpretar corretamente	

			/* fecha conexão */
			mysqli_close($connect);		
		};


	}; // fim do if else verificando se ja existe o login na tabela


} else {

	$retorno = array('codigo' => 0 , 'mensagem' => 'Preencher todos os campos');   //array de retorno para o sucess do ajax, codigo 0 para erros e 1 para sucessos.
	echo json_encode($retorno);		//transformando o array em JSON para o ajax interpretar corretamente

};




?>