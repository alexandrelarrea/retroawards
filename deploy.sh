#!/usr/bin/env bash

if [ $# -eq 0 ]
then
    echo "### Running DEPLOY run ###"
    git stash save -u
    git pull --ff-only
    php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration --all-or-nothing
    composer install --no-dev --optimize-autoloader
    npm install --production
    npm run build
    php bin/console cache:clear
    php bin/console cache:warmup
elif [ $1 == "-n" ] || [ $1 == "--dry-run" ]
then
    echo "### Running DRY run ###"
    git fetch
    git status
    git stash save -u
    git log --oneline --decorate ..origin/master
    git diff --name-status ..origin/master
    git checkout origin/master -- src/Migrations
    php bin/console doctrine:migrations:status
    php bin/console doctrine:migrations:up-to-date
    git reset --hard
    git stash list
else
    echo "Error : Invalid arguments"
fi