<?php

   /**
       Conecta com o PostgreSQL
   */
   $conn = pg_connect("host=db.fe.up.pt dbname=siem1818 user=siem1818 password=CMHTnbDy");

   If ($conn)
   {
       echo "++ Conexão com o PostgreSQL realizada com sucesso!!";

        $nome = $_POST['nome'];        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha_md5 = md5($senha);
      

       $query = "set schema 'trabalho2';";  
       pg_exec($conn, $query);
        /**
            Atribui a variável $sql a instrução para inserir um registro.
            OBS.: Na instrução SQL estou supondo que exista no banco de dados a tabela nomes com as colunas id e nome.
       */
        $sql = "INSERT INTO usuarios (nome, username, email, senha, senha_md5)
                VALUES ('$nome','$username', '$email', '$senha', '$senha_md5')";
        $result = pg_exec($conn, $query);

       /**
            Invoca o método pg_query passando o ponteiro de conexão com o PostgreSQL e a string contendo a instrução SQL.
       */
       pg_query($conn, $sql);
       echo "++Registro inserido com sucesso!!";
       /**
           Fecha a conexão com o PostgreSQL
       */
       pg_close($conn); 
   }
   else
   {
        echo "++ Falha na conexão com o PostgreSQL!!";
   }

?>