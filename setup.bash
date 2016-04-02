#!/bin/bash

chmod 775 app/cache/dev/
chmod 775 app/cache/prod/

php app/console cache:clear

php app/console doctrine:generate:entities AbleSpecAdminBundle
php app/console doctrine:generate:entities AbleSpecExpertBundle
php app/console doctrine:generate:entities AppBundle
php app/console doctrine:schema:update --force

php app/console cache:clear --env=prod

# warmup caches
php app/console "--ansi" "cache:warmup" --env=prod
php app/console "--ansi" "cache:warmup"
exit
