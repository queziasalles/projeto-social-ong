<?php
// Configuração do banco de dados
$serverName = "DESKTOP-2P6UOHT"; // ou IP/instância
$connectionOptions = array(
    "Database" => "ProjetoSocial",  // Substitua pelo nome do seu banco
    "Uid" => "sa",             // Usuário do SQL Server
    "PWD" => "projetosocialweb",      // Senha do SQL Server
    "CharacterSet" => "UTF-8"
);
// Conexão
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Verifica conexão
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST["editar"])) {
    
    $ong = $_POST["ONG"] ?? "";
    $responsavel = $_POST["RESPONSAVEL"] ?? "";
    $email = $_POST["EMAIL_ONG"] ?? "";
    $telefone = $_POST["TELEFONE_ONG"] ?? "";
    $local = $_POST["LOCAL"] ?? "";

    if (!empty($ong)) {
        $sql = "INSERT INTO ONGs (ONG, RESPONSAVEL, EMAIL, TELEFONE, LOCAL) VALUES (?,?,?,?,?)";
        $params = array($ong, $responsavel, $email, $telefone, $local);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt) {
            echo "<p>Cadastro realizado com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar.</p>";
            print_r(sqlsrv_errors());
        }
    } else {
        echo "<p>Por favor, digite um nome.</p>";
    }
}
header("Location: form_ong.html");
exit;
?>
