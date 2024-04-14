FROM php:8.2-fpm-bookworm

RUN set -ex; \
    \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        busybox-static \
        bzip2 \
        libldap-common \
        libmagickcore-6.q16-6-extra \
        rsync \
    ; \
    rm -rf /var/lib/apt/lists/*; \
    \
    mkdir -p /var/spool/cron/crontabs; \
    echo '*/5 * * * * php -f /var/www/html/cron.php' > /var/spool/cron/crontabs/www-data

# install the PHP extensions we need
# see https://docs.nextcloud.com/server/stable/admin_manual/installation/source_installation.html
ENV PHP_MEMORY_LIMIT 512M
ENV PHP_UPLOAD_LIMIT 512M
RUN set -ex; \
    \
    savedAptMark="$(apt-mark showmanual)"; \
    \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        libcurl4-openssl-dev \
        libevent-dev \
        libfreetype6-dev \
        libgmp-dev \
        libicu-dev \
        libjpeg-dev \
        libldap2-dev \
        libmagickwand-dev \
        libmcrypt-dev \
        libmemcached-dev \
        libpng-dev \
        libpq-dev \
        libwebp-dev \
        libxml2-dev \
        libzip-dev \
    ; \
    \
    debMultiarch="$(dpkg-architecture --query DEB_BUILD_MULTIARCH)"; \
    docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp; \
    docker-php-ext-configure ldap --with-libdir="lib/$debMultiarch"; \
    docker-php-ext-install -j "$(nproc)" \
        bcmath \
        exif \
        gd \
        gmp \
        intl \
        ldap \
        opcache \
        pcntl \
        pdo_mysql \
        pdo_pgsql \
        sysvsem \
        zip \
    ; \
    \
# pecl will claim success even if one install fails, so we need to perform each install separately
    pecl install APCu-5.1.22; \
    pecl install imagick-3.7.0; \
    pecl install memcached-3.2.0; \
    pecl install redis-6.0.0; \
    \
    docker-php-ext-enable \
        apcu \
        imagick \
        memcached \
        redis \
    ; \
    rm -r /tmp/pear; \
    \
# reset apt-mark's "manual" list so that "purge --auto-remove" will remove all build dependencies
    apt-mark auto '.*' > /dev/null; \
    apt-mark manual $savedAptMark; \
    ldd "$(php -r 'echo ini_get("extension_dir");')"/*.so \
        | awk '/=>/ { so = $(NF-1); if (index(so, "/usr/local/") == 1) { next }; gsub("^/(usr/)?", "", so); print so }' \
        | sort -u \
        | xargs -r dpkg-query --search \
        | cut -d: -f1 \
        | sort -u \
        | xargs -rt apt-mark manual; \
    \
    apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false; \
    rm -rf /var/lib/apt/lists/*

# set recommended PHP.ini settings
# see https://docs.nextcloud.com/server/latest/admin_manual/installation/server_tuning.html#enable-php-opcache
RUN { \
        echo 'opcache.enable=1'; \
        echo 'opcache.interned_strings_buffer=32'; \
        echo 'opcache.max_accelerated_files=10000'; \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.save_comments=1'; \
        echo 'opcache.revalidate_freq=60'; \
        echo 'opcache.jit=1255'; \
        echo 'opcache.jit_buffer_size=128M'; \
    } > "${PHP_INI_DIR}/conf.d/opcache-recommended.ini"; \
    \
    echo 'apc.enable_cli=1' >> "${PHP_INI_DIR}/conf.d/docker-php-ext-apcu.ini"; \
    \
    { \
        echo 'memory_limit=${PHP_MEMORY_LIMIT}'; \
        echo 'upload_max_filesize=${PHP_UPLOAD_LIMIT}'; \
        echo 'post_max_size=${PHP_UPLOAD_LIMIT}'; \
    } > "${PHP_INI_DIR}/conf.d/nextcloud.ini"; \
    \
    mkdir /var/www/data; \
   chown -R www-data:root /var/www; \
chmod -R g=u /var/www
RUN set -ex; \
    fetchDeps=" \
        gnupg \
        dirmngr \
    "; \
    apt-get update; \
    apt-get install -y --no-install-recommends $fetchDeps; \
#gpgconf --kill all; \
apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false $fetchDeps; \
rm -rf /var/lib/apt/lists/*

#
# --------------------------------------------------------------------------
# PHP-FPM Final Touches
# --------------------------------------------------------------------------
#

# composer
#RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

ENV LISTEN_PORT=8080
EXPOSE 8080

VOLUME /var/www/html

COPY ./public/ /srv/app
WORKDIR /srv/app
ADD ./public/ /srv/app

CMD [ "php","-S","0.0.0.0:8080","-t","." ] || exit 1
