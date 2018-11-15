
## Getting Started

#### Requirements:

- **PHP >= 7.1.3**
- **MySQL >= 5.7**


#### Installation
  
```bash
    $ git clone https://github.com/reiosantos/school-manager.git
    
    $ cd school-manager
```
##### Preparing your environment

```bash
    $ composer install
    
    $ yarn install # for those using npm
    
    $ npm intall # for those using npm
    
    $ php bin/console assets:install
```

##### Setting up database

```bash
    $ php bin/console doctrine:schema:create
    
    $ php bin/console make:migrations
    
    $ php bin/console doctrine:migrations:migrate
```

##### Running server

```bash
    $ php bin/server server:run
```

- access the server on 
```http request
http://localhost:8000/
```
