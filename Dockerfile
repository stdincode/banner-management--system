FROM yiisoftware/yii2-php:7.4-fpm

RUN export DEBIAN_FRONTEND=noninteractive \
    && apt-get update \
    && apt-get install -y libssh-dev

RUN apt-get update && \
    apt-get install --no-install-recommends --assume-yes --quiet \
        rpm \
        libaio1 \
        alien \
        build-essential \
        apt-transport-https \
        libmcrypt-dev \
        zlib1g-dev \
        libxslt-dev \
        libpng-dev && \
    rm -rf /var/lib/apt/lists/*

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN mkdir -p /var/www/html
WORKDIR /var/www/html

CMD ["php-fpm"]
