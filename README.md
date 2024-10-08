# Geste Movie
Este projeto é um sistema de gestão de filmes com catálogo de filmes, onde você pode cadastrar e visualizar os filmes, gêneros, atores e os diretores. <br />

[//]: # (Você pode ver o projeto funcionando [clicando aqui]http://ec2-18-228-190-190.sa-east-1.compute.amazonaws.com/.)

## Features :hammer_and_wrench:
Ferramentas usadas na construção do projeto:
- Bootstrap 5
- Modal's
- Plugin DataTables
- Plugin Select2 
- JQuery
- JSON
- Ajax
- PHP 8
- Laravel 11
- MySQL 8
- AWS EC2
- Postman API Tests
## Funcionalidades do sistema
Em todas as telas do sistema, você pode realizar o cadastro, a busca, a atualização e a exclusão dos dados. <br />
Temos algumas funcionalidades extras na tela de filmes, que são os filtros. <br /> 
Por lá, você pode filtrar pelos campos, (ano de lançamento, classificação etária e o gênero do filme). <br />

# Imagens do Sistema
### Tela de Login
![Tela de Login](https://github.com/am-matheusoliveira/geste-movie/assets/94059670/c9d4986f-c925-494c-bf1e-8909bdb87a90)

### Tela de Registro
![Tela de Registro](https://github.com/am-matheusoliveira/geste-movie/assets/94059670/bf017a38-21ac-47fa-9ce1-de2d7a94f404)

### Menu do Sistema
![Menu do Ssitema](https://github.com/am-matheusoliveira/geste-movie/assets/94059670/f7db26d1-df15-4e8b-8498-0af625f8fd2a)

### Tela dos Gêneros do Filme
![Tela dos Gêneros do Filme](https://github.com/am-matheusoliveira/geste-movie/assets/94059670/5246c01d-5967-48fc-abd2-e33679e1e076)

### Tela dos Atores do Filme
![Tela dos Atores do Filme](https://github.com/am-matheusoliveira/geste-movie/assets/94059670/167e8e20-93c6-4aa6-9a50-bd8a48d0d884)

### Tela dos Diretores do Filme
![Tela dos Diretores do Filme](https://github.com/am-matheusoliveira/geste-movie/assets/94059670/9edb5866-831f-4795-a832-0598a99b12d3)

### Tela do Filme
![Tela do Filme](https://github.com/am-matheusoliveira/geste-movie/assets/94059670/179f68c5-ad96-4b2d-94f1-89d227887bd1)

### Modal de Edição do Filme
![Modal de Edição do Filme](https://github.com/am-matheusoliveira/geste-movie/assets/94059670/a765684a-c651-44df-9560-f69fa709d429)

### Lista dos Gêneros do Filme
![Lista dos Gêneros do Filme](https://github.com/am-matheusoliveira/geste-movie/assets/94059670/511b89c6-413d-4832-90f3-44ac17ac5fcf)

### Lista dos Atores do Filme
![Lista dos Atores do Filme](https://github.com/am-matheusoliveira/geste-movie/assets/94059670/1fe996f2-9b32-4261-86ff-fce483318346)

## Instalação do Projeto
Siga os passos abaixo para configurar e executar o projeto em sua máquina local.
### 1. Clonar o Repositório
```
git clone <URL_DO_REPOSITORIO>
cd <NOME_DO_REPOSITORIO>
```
### 2. Instalar Dependências
```
composer install
```
### 3. Configurar o Arquivo `.env`
Renomeie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente, especialmente as relacionadas ao banco de dados.
```
cp .env.example .env
```
Edite o arquivo `.env` para incluir suas configurações de banco de dados.<br>
Aqui está um exemplo já configurado para rodar com Docker:
```
# MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=
```
### 4. Continuação
Você também irá precisar de um servidor web, <br />
recomendo usar o Apache, pois este projeto usou ele como base, mas se preferir pode usar o Nginx. <br />

Para facilitar, você pode usar o Famoso Xamp, que inclui o PHP o MySQL e o Apache. <br />

Baixe o Zip do projeto, descompacte e mova a pasta para o Htdocs do apache, <br />
execute o script do Banco de Dados que está na pasta /database-app/backup-database.sql. <br />

Após finalizada as etapas acima, vá ao seu navegador e acesse http://localhost/application-name <br />

Pronto, com isso o projeto está rodando. <br />


## Modelagem do Banco de Dados
![Modelagem do Banco de Dados](https://github.com/am-matheusoliveira/geste-movie/blob/main/database-app/LucidChart%20Modelagem%20do%20Banco.png)











