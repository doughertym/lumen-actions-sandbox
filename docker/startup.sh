#!/usr/bin/env sh

/usr/local/sbin/php-fpm --daemonize

/usr/sbin/nginx -c /etc/nginx/nginx.conf  -g "daemon off;"

