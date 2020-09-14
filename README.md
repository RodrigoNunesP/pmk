# PMK
Aplicação teste para PMK - CRUD de cadastro de Doadores

## Configurações do ambiente

 - Versão do PHP 7.2.31
 - Versão Apache	Apache / 2.4.43 (Unix) OpenSSL / 1.1.1g PHP / 7.2.31 mod_perl / 2.0.8-dev Perl / v5.16.3
 - Base de dados mySQL na raiz da aplicação: pmk.sql
 - Framework PHP CodeIgniter 3.0
 - Framework CSS Bootstrap Zero | tema: Lattes ( /Public)

## Configuração da aplicação:

assim que fizer a clonagem pelo git:
Substituir a url raiz (http://localhost/pmk/pmk/) para a correspondente em seu ambiente de maneira que possa rodar-la adequadamente:

../application/config/config.php 26,41: $config['base_url'] = 'http://localhost/pmk/pmk/';


../public/js/util.js 1,36: const BASE_URL = "http://localhost/pmk/pmk/"; 

 ## Termos do desafio

 1. Projeto CRUD para cadastrar dados de Doadores.
    - [ ] a. Informações necessárias para o cadastro:
        - [ ] Nome;
        - [ ] Email;
        - [ ] CPF;
        - [ ] Telefone (Pode ter até 2 números de telefones);
        - [ ] Data de Nascimento;
        - [ ] Data do Cadastro;
        - [ ] Intervalo de Doação (Unico; Bimestral; Semestral; Anual);
        - [ ] Valor da Doação;
        - [ ] Forma de Pagamento (Débito e Credito - Criar tabelas para armazenar cada forma de pagamento) ;
        - [ ] Endereço Completo

    - [ ] b. A listagem deverá mostrar Nome, Email, CPF e Idade, junto com opções de filtro;
    - [ ] c. Criar o banco de dados seguindo as regras de normalização;

2. Junto com o teste, enviar também o DUMP do banco de dados.
    - [ ] Critérios técnicos para desenvolvimento do projeto
    - [ ] O projeto deve ser escrito em PHP, utilizando banco de dados Mysql.
    - [ ] Boas práticas de programação serão avaliadas.
    - [ ] Desejavel (não obrigatório) uso de javascript.