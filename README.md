# Gabriela Pita Advogados Associados

Site PHP para publicacao em hospedagem cPanel.

## Deploy no cPanel pelo Git

1. No cPanel, abra **Git Version Control** e clone este repositorio fora de `public_html`.
   Exemplo de caminho do clone: `/home/usuario/repositories/gabriela-site`.
2. Confirme que o arquivo `/home/usuario/public_html/config/database.php` ja existe no servidor com os dados corretos do banco.
3. Na tela do repositorio no cPanel, use **Update from Remote** para buscar as alteracoes do Git.
4. Clique em **Deploy HEAD Commit**.

O deploy e controlado pelo arquivo `.cpanel.yml`. Ele publica os arquivos do site em `$HOME/public_html/`, mas nao copia `config/database.php` para nao sobrescrever as credenciais ja configuradas no servidor.

## Configuracao local do banco

O arquivo `config/database.php` nao deve ser versionado. Para configurar um novo ambiente, copie `config/database.example.php` para `config/database.php` e ajuste as credenciais.
