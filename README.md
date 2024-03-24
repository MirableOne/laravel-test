
### Setup

Build:

```shell
docker-compose up build
```

Start:

```shell
docker-compose up -d
```

Host: 

[http://laravel-test.docker.localhost/](http://laravel-test.docker.localhost/)

Migrate:

```shell
make migrate
```

DB Seed:

```shell
make seed
```

If something doesn't work, run start command again.

### Login info 

```
User: test1@example.com
Pass: 123456
```

### Poke api integration

Public api: [link](https://pokeapi.co/docs/v2#info)

To see basic result:
[http://laravel-test.docker.localhost/api/v1/poke/5](http://laravel-test.docker.localhost/api/v1/poke/5)

To see error message:
[http://laravel-test.docker.localhost/api/v1/poke/qwer](http://laravel-test.docker.localhost/api/v1/poke/qwer)
