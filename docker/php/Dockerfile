FROM php:8.2-fpm
ARG user
ARG uid
RUN apt update && apt install -y \
    git \
    wkhtmltopdf \
    curl \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev



RUN apt clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user


WORKDIR /var/www/vhost/
USER $user