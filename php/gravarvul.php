<?php
// Configuração do banco de dados
$serverName = "DESKTOP-2P6UOHT";
$connectionOptions = array(
    "Database" => "ProjetoSocial",
    "Uid" => "sa",
    "PWD" => "projetosocialweb",
    "CharacterSet" => "UTF-8"
);

// Conexão
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Verifica conexão
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Verifica se o formulário foi enviado
if (isset($_POST['NOME'])) {

    var_dump($_POST['VULNERABILIDADE']);

    // Dados da pessoa
    $nome = $_POST['NOME'] ?? "";
    $nasc = $_POST['DATA_DE_NASCIMENTO'] ?? "";
    $cpf = $_POST['CPF'] ?? "";
    $email = $_POST['EMAIL'] ?? "";
    $tel = $_POST['TELEFONE'] ?? "";

    // Inserir na tabela VULNERAVEIS
    $sqlIn = "INSERT INTO VULNERAVEIS (NOME, DATA_NASC, CPF, EMAIL, TELEFONE) 
              VALUES (?, ?, ?, ?, ?); 
              SELECT SCOPE_IDENTITY() AS ID_VULNERAVEL;";

    $paramvul = array($nome, $nasc, $cpf, $email, $tel);
    $stmtvul = sqlsrv_query($conn, $sqlIn, $paramvul);

    if ($stmtvul === false) {
        die("Erro ao inserir pessoa: " . print_r(sqlsrv_errors(), true));
    }

    sqlsrv_next_result($stmtvul);
    sqlsrv_fetch($stmtvul);
    $idPessoa = sqlsrv_get_field($stmtvul, 0);


    // Verifica se há serviços selecionados
    if (!empty($_POST['VULNERABILIDADE'])) {

        $vul = $_POST['VULNERABILIDADE'] ?? [];
        
        if (!is_array($vul)) {
            $vul = [$vul];
        }// já é um array

            foreach ($vul as $idServico) {
                $sqlInsertServico = "INSERT INTO PS (ID_VULNERAVEL, ID_SERVICO) VALUES (?, ?)";
                $paramsServico = array($idPessoa, $idServico);
                $stmtServico = sqlsrv_query($conn, $sqlInsertServico, $paramsServico);

                if ($stmtServico === false) {
                    die("Erro ao inserir serviço: " . print_r(sqlsrv_errors(), true));
                }
            }

        // Sucesso total
        header("Location: form_v.php?status=sucesso");
        exit;
    } else {
        // Nenhum serviço selecionado
        header("Location: form_v.php?status=sem_servico");
        exit;
    }
} else {
    // Formulário não enviado corretamente
    header("Location: form_v.php?status=erro");
    exit;
}
?>