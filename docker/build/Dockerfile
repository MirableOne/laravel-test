FROM php:8.2-cli

RUN apt-get update && apt-get install -y libpq-dev

RUN docker-php-ext-install pdo pdo_pgsql

RUN curl -ksS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

RUN set -x \
    && curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install --quiet --yes --no-install-recommends nodejs

COPY ./build.sh /tmp/build.sh

CMD sh -c /tmp/build.sh
