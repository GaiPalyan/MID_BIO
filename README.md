### Тестовое задание на позицию PHP-разработчик для компании ООО МИД БИОТЕХ
#### API для генерации рандомного числа

#### Install

~~~
$ make setup

change QUEUE_CONNECTION environment in .env file
from 'sync' to 'database'
~~~

#### Start docker containers

~~~
$ sail up -d
~~~

#### Migration

~~~
$ sail php artisan migrate
~~~

#### Database seeding

~~~
$ sail php artisan db:seed
~~~

#### Init scheduling

Run report generate & send email schedule once per day 
~~~
$ sail php artisan schedule:work
~~~

#### Commands

Retrieve number by id <br> actions: get, set
~~~
$ sail php artisan exec:number -a [action <default=get>] --id=<value>
~~~

Generate number
~~~
$ sail php artisan exec:number -a [action]
~~~

Generate report.txt and send email
~~~
$ sail php artisan report:generate
~~~

##### Routs

| entity | route             | method |
|--------|-------------------|--------|
| user   | api/register      | POST   |
| user   | api/login         | POST   |
| user   | api/logout        | POST   |   
| number | api/generate      | POST   |   
| number | api/retrieve/{id} | GET    |

#### Registration

- name
- email
- password
- password_confirmation

Response example
~~~

{
    "name": "admin",
    "email": "test@test",
    "updated_at": "2022-08-20T03:00:58.000000Z",
    "created_at": "2022-08-20T03:00:58.000000Z",
    "id": 1
}
~~~
#### Auth
Response example
~~~
{
    "token": "1|07rZjpHuG299cc2H16S0glJYa36V4X5bQMet4tv9",
    "expires_at": null
}
~~~
В целях простоты у токена нет срока жизни, при повторной аутентификации токен будет уничтожен и выдан новый.



