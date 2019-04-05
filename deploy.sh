#!/usr/bin/env bash

if [ $# -eq 0 ]
then
    echo "### Running deploy run ###"
    git stash save -u
    git pull --ff-only
    #php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration --all-or-nothing # todo : setup database
    composer install --no-dev --optimize-autoloader
    npm install --production
    npm run build
    php bin/console cache:clear
    php bin/console cache:warmup
elif [ $1 == "-n" ] || [ $1 == "--dry-run" ]
then
    echo "### Running dry run ###"
    git status
    git fetch
    git diff --name-status ..origin/master
else
    echo "Error : Invalid arguments"
fi