#!/bin/bash
set -e

if [ ! -f /etc/php.d/timezone.ini ]; then
  echo "date.timezone = $TIMEZONE" > /etc/php.d/timezone.ini
fi

if [ ! -f /var/www/html/index.php ]; then
 echo "<?php header('location: /app'); ?>" > /var/www/html/index.php
fi

if [ ! -f /var/www/html/cache/index.html ]; then
 touch /var/www/html/cache/index.html
fi

chown apache:apache -R /var/www/html

exec "$@"
