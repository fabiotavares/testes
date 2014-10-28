Code Education
----
- Módulo: Testes com PHPUnit
- Projeto Fase: IV
- Autor: Fábio Tavares
- Data: 28/10/2014

Observações
----
- Aplicando a metodologia TDD: refatorando o código
- A estrutura de testes está no diretório tests
- Para testar o exemplo no Windows foi usado a seguinte linha de comando:
- php vendor/phpunit/phpunit/phpunit -c tests/phpunit.xml

Como testar o formulário no navegador
----
- Execute fixtures.php na raiz do projeto para criar as categorias no banco de dados
- Execute index.php na pasta /web para exibir o formulário de produto
- Preencha o formulário com valores de teste e pressione o botão Enviar
- Se a validação não for aprovada, mensagens de erro serão mostrada
- Se a validação passar, uma mensagem de sucesso será exibida, podendo voltar para novos teste