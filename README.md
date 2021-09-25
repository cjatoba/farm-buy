### Execução

* Os comandos abaixo devem ser executados na raiz do projeto:

Copiar o arquivo .env.example para .env
```
cp .env.example .env
```

Instalar as dependências do composer
```
composer install
```

Gerar a key
```
php artisan key:generate
```

Instalar as dependências Javascript
```
npm install
```

Compilar os assets
```
npm run dev
```

Criar as tabelas com base nas migrations
```
php artisan migrate
```

Carregar a tabela de medicamentos com dados fakes
```
php artisan db:seed
```

### Ferramentas utilizadas

* Laravel 8
* Livewire
* Tailwind CSS
* MySQL
