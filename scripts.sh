#!/usr/bin/env sh

echo 'Defining convenience aliases...'

set -x

alias build='docker build ./docker/phing/ -t phing &&
    docker run --rm -it -v "$PWD":/app -w /app --env-file=".env" --env-file="$HOME/.env.admin" phing build'
alias composer='docker build ./docker/composer/ -t composer &&
    docker run --rm -it -v "$PWD":/app -w /app --env-file=".env" --env-file="$HOME/.env.admin" composer'
alias start='docker-compose up -d'
alias stop='docker-compose down'
alias test='docker-compose exec php ./vendor/bin/phpunit'

{ set +x; } 2>/dev/null
