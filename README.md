# Necessário instalar PHP 8, Composer, Docker e Docker-Compose #
- Copiar as variáveis de ambiente:
    cp .env.example .env
- Instalar as dependências do laravel:
    composer install
- Gerar a chave de acesso:
    php artisan key:generate
- Construir a aplicação rodando esse comando abaixo: 
    ./vendor/bin/sail up

# O projeto está ambientado para rodar na porta 80, podendo ser acessado pelo link abaixo #
    - https://localhost:80

# Para realizar as migrações para o banco seguir as instruções #
    - docker-compose exec app bash
    - php artisan migrate
