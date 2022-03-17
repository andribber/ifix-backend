VAI RODAR MELHOR NO LINUX

- INSTALAR O PHP 8
- INSTALAR O COMPOSER

- INSTALAR DOCKER E O DOCKER-COMPOSE

- CLONAR O REPOSITORIO
- NA PASTA DO PROJETO, RODAR O COMANDO
    cp .env.example .env
- RODAR O COMANDO
    composer require laravel/sail --dev
- APOS A EXECUÇÃO, RODAR O COMANDO
    php artisan key:generate
- APOS A EXECUÇÃO, RODAR O COMANDO
    docker-compose up -d --build

- O LOCALHOST JÁ DEVE ESTAR FUNCIONANDO
PODENDO SER ACESSADO POR https://localhost:80

- ABRIR UMA NOVA ABA DO TERMINAL E RODAR
    docker-compose exec app bash
- RODAR AS MIGRATIONS DO BANCO
    php artisan migrate
