FROM php:8.2-fpm

# Dependências de sistema necessárias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libicu-dev libzip-dev libpng-dev zlib1g-dev libonig-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache \
    && rm -rf /var/lib/apt/lists/*

# Composer (copiado da imagem oficial do composer)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/le-discerner

# Cria usuário não-root (opcional)
RUN useradd -ms /bin/bash appuser
USER appuser

# Expose (opcional) e entrypoint padrões do php-fpm serão usados
