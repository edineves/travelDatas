<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title> Inclusão de dados do trecho </title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    	<link rel="preconnect" href="https://fonts.googleapis.com">
   		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link rel="stylesheet" href="assets/estilos/estilos.css">
	</head>
	<body class="listagem">
		<h1> Sistema Gerencial de Dados </h1>
		<h3> incluir os dados do trecho </h3>

		<?php			
			// Variável			
			// 1. Receber os dados do formulário em variáveis

			$dia		 = $_GET["dia"] ;
			$localSaida	 = $_GET["localSaida"] ;
			$dataSaida	 = $_GET["dataSaida"] ;
			$horaSaida	 = $_GET["horaSaida"] ;
			$dataChegada = $_GET["dataChegada"] ;
            $horaChegada = $_GET["horaChegada"] ;
            $localChegada= $_GET["localChegada"] ;
			$kmPercorrido= $_GET["kmPercorrido"] ;
			$gasolina	 = $_GET["gasolina"] ;
			$pedagio	 = $_GET["pedagio"] ;
			$refeicoes	 = $_GET["refeicoes"] ;
            $outrosCustos= $_GET["outrosCustos"] ;
			$obs		 = $_GET["obs"] ;    
			
			// 2. Validar alguns dados básicos		
			
			
			if ($dia==" ") 
			{
				die("O<b>dia</b> deve ser informado. Sistema interrompido.");
			}
			
			if ($localSaida==" ")
			{
				die("O <b> localSaida </b> deve ser informado. Sistema interrompido.");
			}
			
			if ($dataSaida==" ")
			{
				die("informe a <b>dataSaida</b> válida. Sistema interrompido.");
			}
            if ($horaSaida==" ")
			{
				die("Informe  <b>horaSaida</b> válida. Sistema interrompido.");
			}
            if ($dataChegada==" ")
			{
				die("Escolha um <b>tipo</b> válida. Sistema interrompido.");
			}
            if ($horaChegada==" ")
			{
				die(" Informe <b>horaChegada</b> válida. Sistema interrompido.");
			}
            if ($localChegada==" ")
			{
				die("Informe <b>localChegada </b> válido. Sistema interrompido.");
			}
            if ($kmPercorrido==" ")
			{
				die("Informe<b> kmPercorrido </b> válido. Sistema interrompido.");
			}
            if ($gasolina==" ")
			{
				die("Informe <b>gasolina </b> válido. Sistema interrompido.");
			}
            if ($pedagio==" ")
			{
				die("Informe <b> pedagio </b> válido. Sistema interrompido.");
			}
            if ($refeicoes==" ")
			{
				die("Informe <b> refeicoes </b> válido. Sistema interrompido.");
			}
            if ($outrosCustos==" ")
			{
				die("Informe <b>outrosCustos</b> válido. Sistema interrompido.");
			}
            if ($obs==" ")
			{
				die("Informe <b>obs</b> válido. Sistema interrompido.");
			}
			
			// 3 - Exibindo os dados vindos do formulário
			echo "dias na estrada <b>$dia</b><br>";
			echo "Local de inicio da viajem <b>$localSaida</b><br>";
			echo "data do inicio do trecho: <b>$dataSaida</b><br>";
			echo "hora de saida: <b>$horaSaida</b><br>";
			echo "data de chegada no destino: <b>$dataChegada</b><hr>";
            echo "hora de chegada no destino: <b>$horaChegada</b><br>";
			echo "Nome do local de chegada: <b>$localChegada</b><br>";
			echo "Distância percorrida: <b>$kmPercorrido</b><br>";
			echo "valor pago em gasolina: <b>$gasolina</b><br>";
			echo "valor pago com pedágio: <b>$pedagio</b><hr>";
            echo "valor pago com refeições: <b>$refeicoes</b><br>";
			echo "Outros custos no trecho: <b>$outrosCustos</b><br>";
			echo "Observações quanto ao percurso: <b>$obs</b><br>";
		
			
			// 4 - Abrindo o banco de dados
			// .1- Conexão com o servidor	

		
			
			$con = mysqli_connect("localhost","root", "");
			
			// .2 - Abertura do banco de dados

			
			mysqli_select_db($con, "travel") or 
				die(
					"Erro na abertura do banco de dados!: <br>" .
					mysqli_error($con)
				);
			
			// 5 - Tentativa de inserção de registro
			// .1 - Criação da variável com o comando de inserção SQL
			
			$sql="INSERT INTO travelDates (	
						dia, 
                        localSaida, 
                        dataSaida, 
                        horaSaida, 
                        dataChegada, 
                        horaChegada,
                        localChegada, 
                        kmPercorrido, 
                        gasolina, 
                        pedagio, 
                        refeicoes, 
                        outrosCustos, 
                        obs					
                        ) VALUES(
						'$dia', 
						'$localSaida',  
						'$dataSaida',  
						'$horaSaida',
                        '$dataChegada', 
						'$horaChegada',  
						'$localChegada',  
						'$kmPercorrido',
                        '$gasolina',  
						'$pedagio',  
						'$refeicoes',
                        '$outrosCustos',                 
						'$obs' )";
			
			// Visualizar o comando e testar p/ ver se não está com erros
			
			
			mysqli_query($con, $sql) or 
				die(
					"Houve um problema para cadastrar os dados:<br>" . 
						mysqli_error($con)
				);
			
			echo "travelDates <b >$dia </b> incluído com sucesso!";			
		?>
		
		<br>
		Clique <a href="index.html">aqui</a> para cadastrar um novo trecho<br>
		Clique <a href="listagem.php">aqui</a> para listar os dados cadastrados<br>
	</body>
</html> 