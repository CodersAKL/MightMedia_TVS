FROM php:7.1.0-apache

ARG DOCKER_UID=1000
ARG GITHUB_OAUTH=none
ARG GITLAB_USER=none

# Install nodejs
RUN curl -sL https://deb.nodesource.com/setup_6.x | bash -

# Install yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb http://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN apt-get update && \
    apt-get install -yq \
    zlib1g-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libmcrypt-dev \
    git \
    ant \
    sudo \
    libxml2-dev \
    nodejs \
    yarn \
    fontforge \
    rubygems \
    ruby-dev \
    eot-utils \
    unzip \
    nano \
    vim \
    openssl \
    net-tools \
    wkhtmltopdf \
    supervisor
RUN apt-get install -y libmagickwand-dev --no-install-recommends
RUN docker-php-ext-configure gd --enable-gd-native-ttf --with-jpeg-dir=/usr/lib/x86_64-linux-gnu --with-png-dir=/usr/lib/x86_64-linux-gnu --with-freetype-dir=/usr/lib/x86_64-linux-gnu
RUN docker-php-ext-install pcntl mbstring pdo_mysql zip curl gd intl mcrypt exif bcmath soap sockets
RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/usr/local/bin
RUN apt-get clean && rm -r /var/lib/apt/lists/*

RUN a2enmod ssl
RUN a2enmod rewrite

RUN pecl install imagick xdebug
RUN docker-php-ext-enable imagick

RUN gem install --no-ri --no-rdoc fontcustom
RUN npm install gulp -g

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY php.ini /usr/local/etc/php/php.ini
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
COPY entrypoint.sh /usr/local/bin/entrypoint.sh

RUN chmod +x /usr/local/bin/entrypoint.sh

RUN a2enmod rewrite
RUN a2enmod headers

RUN usermod -u $DOCKER_UID www-data \
    && groupmod -g $DOCKER_UID www-data \
    && chsh -s /bin/bash www-data \
    && echo "www-data ALL=(ALL) NOPASSWD:ALL" > /etc/sudoers.d/90-www-data

RUN mkdir -p /var/www/html/storage/framework
RUN mkdir -p /var/www/html/storage/framework/sessions
RUN mkdir -p /var/www/html/storage/framework/views
RUN chown -R www-data:www-data /var/www
VOLUME ["/var/www/html/storage/framework/cache", "/var/www/html/storage/framework/sessions", "/var/www/html/storage/framework/views"]

# composer setup
ENV COMPOSER_HOME "/var/www/.composer"

# Allow nano to be run in console
ENV TERM xterm

RUN mkdir -p /var/www/.composer/cache \
    && composer global require 'hirak/prestissimo' \
    && composer config --global optimize-autoloader true \
    && composer config --global github-oauth.github.com $GITHUB_OAUTH \
    && chown -R www-data:www-data /var/www/.composer

RUN mkdir -p /var/www/.ssh \
    && touch /var/www/.ssh/known_hosts \
    && ssh-keyscan -t rsa github.com >> /var/www/.ssh/known_hosts \
    && chown -R www-data:www-data /var/www/.ssh

RUN DOCKER_ADDR="${DOCKER_ADDR} -e SSH_AUTH_SOCK"

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["apache2-foreground"]
