<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title> Inclisão de dados do trecho </title>
	</head>

	<body>
		<h1>Sistema Gerencial de Dados</h1>
		<h3> incluir os dados do trecho </h3>

		<?php			
			// Variável

			// Nome dado a um espaço de memória que consegue
			// armazenar um determinado valor que pode ser alterado (variado)
			// Exemplo:
			// $nome="Ana Maria";
			
			// Matriz / Vetor
			// ==============
			// Nome dado a um espaço de memória que consegue
			// armazenar diversos valores em posições diferentes que podem
			// ser alterados (variados)
			
			// exemplo:
			// $nomes[""];
			
			// Vetor é o nome dado para uma matriz de 1 dimensão (coluna)
			
			// 1. Receber os dados do formulário em variáveis
			$dia		= $_GET["dia"] ;
			$localSaida	= $_GET["localSaida"] ;
			$dataSaida		= $_GET["dataSaida"] ;
			$horaSaida	= $_GET["horaSaida"] ;
			$dataChegada		= $_GET["dataChegada"] ;
            $horaChegada		= $_GET["horaChegada"] ;
			$kmPercorrido		= $_GET["kmPercorrido"] ;
			$gasolina		= $_GET["gasolina"] ;
			$pedagio	= $_GET["pedagio"] ;
			$refeicoes	= $_GET["refeicoes"] ;
            $outrosCustos	= $_GET["outrosCustos"] ;
			$obs		= $_GET["obs"] ;
    
			
			// 2. Validar alguns dados básicos
			/*
				= Operador de atribuição (permite atribuir um valor p/ a variável)
				== Operador de comparação (compara o valor da esquerda com o da direita)
			*/
			if ($nome=="") 
			{
				die("Nome do <b>Pet</b> deve ser informado. Sistema interrompido.");
			}
			
			if ($nomeDono=="")
			{
				die("Nome do <b>Dono do Pet</b> deve ser informado. Sistema interrompido.");
			}
			
			if ($tipo=="")
			{
				die("Escolha um <b>tipo</b> válido. Sistema interrompido.");
			}
			
			// 3 - Exibindo os dados vindos do formulário
			echo "O nome do pet é <b>$nome</b><br>";
			echo "Seu sexo é <b>$sexo</b><br>";
			echo "Ele é do tipo: <b>$tipo</b><br>";
			echo "Nome do dono: <b>$nomeDono</b><br>";
			echo "Idade do Pet: <b>$idade</b><hr>";
			
			// 4 - Abrindo o banco de dados
			// .1- Conexão com o servidor
			
			// mysqli_connect( p1, p2, p3)
			
			// Parâmetros do tipo string
			// p1 - endereço do servidor MYSQL
			// p2 - nome do usuário existente no MYSQL
			// p3 - senha do usuário existente no MYSQL
			//
			// retorna um objeto de conexão 
			// que nos permite, posteriormente, enviar comandos
			// para este MYSQL
			
			// As funções do PHP para manipulação do banco de dados MYSQL
			// iniciam com o prefixo mysqli_

			// Funções mais usadas:
			// mysqli_connect()     - Conecta no servidor mysql
			// mysqli_select_db()   - Abre um banco de dados MYSQL
			// mysqli_error()		- Traz o último erro ocorrido no MYSQL
			// mysqli_query() 	    - Envia um comando SQL para o MYSQL 
			// mysqli_fetch_array() - Cria uma matriz com base num record set_error_handler
			// mysqli_num_rows()	- Conta quantos registros um record set tem
			
			$con = mysqli_connect("localhost","root", "");
			
			// .2 - Abertura do banco de dados
			
			// mysqli_select_db(p1, p2)
			// Parâmetros do tipo string
			// p1 - objeto de conexão existente
			// p2 - nome do banco de dados (string)
			
			mysqli_select_db($con, "sgp") or 
				die(
					"Erro na abertura do banco de dados!: <br>" .
					mysqli_error($con)
				);
			
			// 5 - Tentativa de inserção de registro
			// .1 - Criação da variável com o comando de inserção SQL
			
			$sql="INSERT INTO pets (	
						nome  , 
						sexo, 
						tipo, 
						nomeDono,       
						idade ) VALUES (
						'$nome', 
						'$sexo',  
						'$tipo',  
						'$nomeDono',  
						$idade )";
			
			// Visualizar o comando e testar p/ ver se não está com erros
			// Mostro na tela e copio e colo no console do MYSQL
			// Comando estando ok, paro de mostrar na tela 
			
			// echo $sql;
			
			// 2.Enviando o comando de inclusão para o banco
			
			// mysqli_query(p1, p2)
			// Parâmetros do tipo 
			// p1 - objeto de conexão existente
			// p2 - comando SQL a ser executado (string ou variável)
			
			mysqli_query($con, $sql) or 
				die(
					"Houve um problema na inserção do Pet:<br>" . 
						mysqli_error($con)
				);
			
			echo "Pet <b>$nome</b> incluído com sucesso!";
			
		?>
		
		<br><br>
		Clique <a href="novoPet.html">aqui</a> para cadastrar um novo Pet!<br>
		Clique <a href="listagem.php">aqui</a> para listar os pets cadastrados!<br>
	</body>
</html>