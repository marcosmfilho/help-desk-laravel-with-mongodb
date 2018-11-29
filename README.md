# Help Desk - Laravel with MongoDB

Um simples sistema HELP DESK para uma empresa de desenvolvimento de pequeno porte. Usuários (clientes) podem se cadastrar e criar ocorrências. Os Agentes podem ver as ocorrências (que possuem prioridades e categorias) e podem resolvê-las, mudando o status e dando um feedback para o cliente. Esse pequeno sistema foi desenvolvido em Laravel 5.7, MongoDB e INSPINIA Theme no Front.

Observação: Existem 3 tipos de usuários, ADMIN, AGENTE E CLIENTE. Admins tem acesso a tela de usuários e podem promover usuários à clientes ou agentes. Agentes podem ver as ocorências e respondê-las.

### O que foi utilizado nesse projeto?

  - PHP (Laravel 5.7)
  - MongoDB
  - [jenssegers/laravel-mongodb](https://github.com/jenssegers/laravel-mongodb) (A MongoDB based Eloquent model and Query builder for Laravel)
  - INSPINIA Theme (Bootstrap, jQuery, Responsividade, SPA)

### Requisitos

  - PHP7+
  - Composer
  - MongoDB instalado na máquina e rodando. ([How to Install MongoDB on Ubuntu 18.04](http://php.net/manual/pt_BR/mongodb.installation.pecl.php))
  - Driver do MongoDB para PHP ([Installing the MongoDB PHP Driver with PECL](http://php.net/manual/pt_BR/mongodb.installation.pecl.php))
 
### Como rodar o projeto?
Primeiramente clone o projeto e na pasta do projeto execute o comando:
```$ composer install``` 

Lembrando que nesse projeto já foi instalado a dependência da biblioteca jenssegers/laravel-mongodb utilizando o comando:
```$ composer require jenssegers/mongodb```

Crie um arquivo .env na raiz do projeto e cole dentro dele o contedo de .env.exemple (o arquivo .env está no gitignore por questes de segurança). Caso queira alterar seus parâmetros de acesso ao banco de dados e outras variáveis de ambiente altere no .env

Para deixar seu servidor local rodando execute o comando:
```$ php artisan serve```

Por default, seu servidor rodará na porta 8000, basta acessar http://localhost:8000/. Registre uma nova conta e entre na aplicação. Simples!

### Imagens

![alt text](https://github.com/marcosmfilho/help-desk-laravel-with-mongodb/blob/master/public/img/new-occurrence.png"Logo Title Text 1")
