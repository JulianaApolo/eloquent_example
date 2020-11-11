# Exemplo de uso do Eloquent

## Instalação do ambiente
Copie o .env_example e altere as configurações:
```
cp .env_example .env
```

Rode o docker-compose para criação dos containers da aplicação e do banco de dados:
```
docker-compose up --build -d
```

Para acessar o container da aplicação utilize:
```
docker-compose exec eloquent_app bash
```

Rode o composer, dentro do container:
```
make install
```

Crie as tabelas no banco de dados com o comando abaixo, dentro do container:
```
vendor/bin/phpmig migrate
```

## Rodando a aplicação
Para rodar a aplicação, acesse via browser:
http://localhost:<porta configurada no .env>

## Outras ferramentas

Para rodar o phpcbf, dentro do container:
```
php composer.phar phpcbf
```

[Documentação do Eloquent](https://laravel.com/docs/8.x/eloquent)

