# Path to your project directory
PROJECT_DIR="/var/www/laravel-boilerplate"

# Log file path
LOG_FILE="$PROJECT_DIR/storage/logs/deployment.log"

# Navigate to the project directory
cd $PROJECT_DIR

git stash push --include-untracked
git stash drop
git pull origin main

sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache

chmod -R 775 storage
chmod -R 775 bootstrap/cache

/usr/bin/php8.1 /usr/local/bin/composer install --no-interaction

/usr/bin/php8.1 artisan migrate --force
/usr/bin/php8.1 artisan config:cache
/usr/bin/php8.1 artisan view:cache

npm run build

# Log deployment
echo "Deployment successful at $(date)" >> $LOG_FILE
