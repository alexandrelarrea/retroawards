#!/usr/bin/env bash

runOnChange() {
    echo "$(git diff --name-only ORIG_HEAD)" | grep -q "$1" && eval "$2"
}

if [ $# -eq 0 ]
then
    echo "### Running DEPLOY run ###"
    git stash save -u
    git pull --ff-only
    php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration --all-or-nothing
    runOnChange composer.lock "composer install --no-dev --optimize-autoloader"
    runOnChange package-lock.json "npm install --production"
    runOnChange assets/ "npm run build"
    php bin/console cache:clear
    php bin/console cache:warmup
elif [ $1 == "-n" ] || [ $1 == "--dry-run" ]
then
    echo "### Running DRY run ###"
    git fetch -q
    git stash save -u
    git log --oneline --decorate ..origin/master
    git diff --name-status ..origin/master
    git checkout origin/master -- src/Migrations
    php bin/console doctrine:migrations:status
    php bin/console doctrine:migrations:up-to-date
    git reset --hard -q
else
    echo "Error : Invalid arguments"
fi