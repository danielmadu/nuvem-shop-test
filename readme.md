# Superhero CRUD

## Setup
Para executar a aplicação você primeiramente deve clonar o repositório, utilize o seguinte comando no terminal:

```
git clone https://github.com/danielmadu/nuvem-shop-test.git
```

Após o término, acesse o diretório aonde a plicação foi clonada e execute os seguintes comandos:

```
php artisan storage:link
```

## Configuration

Faça uma cópia do arquivo `.env.exemple` e o renomeie para `.env`, abra o arquivo e altere as configurações do banco de dados.

Execute o comando a seguir:

```
php artisan migrate
```

## Tests

Execute os testes rodando o seguinte comando:

```
vendor/bin/phpunit
```

## Run

Para executar a aplicação, execute o seguinte comando no terminal:

```
php artisan migrate
```

## Docker

Se você deseja executar a aplicação através do Docker basta executar o comando a seguir:

```
docker-compose up
```