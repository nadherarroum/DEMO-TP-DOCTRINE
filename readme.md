## Clone project in your work folder
# in terminal CMD :
> D:

> cd D:\MyWorkFolder

# Clone project
> git clone https://github.com/nadherarroum/DEMO-TP-DOCTRINE.git

## open project in VSCode (or other IDE)
# install composer
```bash
> composer install
```

# Database
* Migrate database : 
> php bin/console doctrine:migrations:migrate
or 
> symfony console doctrine:migrations:migrate

