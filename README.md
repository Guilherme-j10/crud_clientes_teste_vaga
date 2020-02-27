# Como incializar a aplicação.

### 1 - Baixando os arquivos 
Baixe os arquivos para a sua maquina, em seguida coloque a aplicação dentro do **c:/xampp/htdocs** caso use o xampp como servidor local.

### 2 - Importando o sql
Dentro da pasta **sql** tem um arquivo chamado **teste_vaga.sql**. Após você iniciar o **apache** e o **mysql**, na url do navegador você deverá ir ate ao phpmyadmin digitando, **localhost(ou o seu ip)/phpmyadmin**, depois disto, devera clicar em importar e selecionar o aqruivio mensionado.

### 3 - Configurando a conexão
No aqruivo conexão que se encontra em **app/database/conexao.php** você deverá configurar as credenciais de acesso a base de dados, alguns servidores são diferente possuem senhas, usuários diferentes, então pos via das duvidas, deixo aqui a instrução. Por padrão o phpmyadmin vem sem senha e com usuário root. 

    class conexao{

      const host = "localhost"; // Localhost ou o seu I.P
      const senha = ""; // A senha para ter acesso ao phpmyadmin
      const user = "root"; // O usuário para ter acesso ao phpmyadmin
      const dbname = "teste_vaga"; // nome da base dados 

      public function getConn(){

        try {
          return $pdo = new \PDO("mysql:host=".self::host."; dbname=".self::dbname."; charset=utf8", self::user, self::senha);
        }catch(\PDOException $e) {
          echo $e->getMessage();
        }

      }

    }
