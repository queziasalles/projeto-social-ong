<!-- <?php
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

$sqlQuery = "SELECT ID_SERVICO, SERVICO FROM SERVICO";
$stmtQuery = sqlsrv_query($conn, $sqlQuery); 
?> -->

<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="icon" type="image/x-icon" href="../img/icon-site.ico">
      <link rel="stylesheet" href="../scr/reset.css"/>
      <link rel="stylesheet" href="../scr/base.css"/>
      <link rel="stylesheet" href="../scr/form_v.css">
      <title>Projeto Social - Elo Solidário</title>
   </head>

   <body>
      <header>
         <nav class="navbar">
            <div class="navbar--left">
               <a href="../html/main.html">
                  <img src="../img/logo.png" alt="logo-site" class="logo" />
               </a>
            </div>

            <div class="navbar--right">
               <button class="nav-button" id="btncontatophp">Contato</button>
               <button class="nav-button" id="btnservicosphp">Serviços</button>
               <button class="nav-button" id="btnformphp">Cadastro</button>
               <button class="nav-button" id="btneditphp">Editar</button>
            </div>
         </nav>
      </header>
      

      <main>
         <div class="main--container">
            <div class="form-vuneravel">
               <form action="gravarvul.php" method="post">
                  <h1>Preciso de Ajuda</h1>
  
                  <div class="input">
                     <label for="ONG">Nome Completo:</label>
                     <input type="text" name="NOME" id="NOME" required>
                  </div>
  
                  <div class="input">
                     <label for="DATA_DE_NASCIMENTO">Data de Nascimento</label>
                     <input type="date" name="DATA_DE_NASCIMENTO" id="DATA_DE_NASCIMENTO" required>
                  </div>
  
                  <div class="input">
                     <label for="CPF">CPF:</label>
                     <input type="text" name="CPF" id="CPF" maxlength="14" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required title="Digite o CPF no formato 999.999.999-99">
                  </div>
  
                  <div class="input">
                     <label for="EMAIL">E-mail:</label>
                     <input type="email" name="EMAIL" id="EMAIL" required>
                  </div>
  
                  <div class="input">
                     <label for="TELEFONE">Telefone:</label>
                     <input type="tel" name="TELEFONE" id="TELEFONE" required>
                  </div>
  
                  <div class="input">
                     <label>Como podemos te ajudar?</label>
  
                     <div class="checkbox-group">
                      
                        <?php
                              while ($row = sqlsrv_fetch_array($stmtQuery, SQLSRV_FETCH_ASSOC)) {
                              echo '<label><input type="checkbox" name="VULNERABILIDADE[]" value="'.$row['ID_SERVICO'].'"> '.$row['SERVICO'].'</label><br>';
                           }
                        ?>
                     </div>
                  </div>
  
                  <button type="submit">Enviar</button>
               </form>
            </div>
        </div>
      </main>

      <div>
         <button class="btn_voltar" id="btnvoltarphp">Voltar</button>
      </div>

      <footer>
        <a href="./">INFORMAÇÕES DE CONTATO</a>
        <a href="./">SEJA ONG PARCEIRA</a>
        <a href="./">AJUDA?</a>
      </footer>

      <script src="../script_php.js"></script>
   </body>

</html>