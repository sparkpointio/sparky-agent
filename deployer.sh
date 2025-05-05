# Path to your project directory
PROJECT_DIR="/var/www/sparkagent"

# Log file path
LOG_FILE="$PROJECT_DIR/storage/logs/deployment.log"

# Navigate to the project directory
cd $PROJECT_DIR

git stash push --include-untracked
git stash drop
git pull origin master

sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache

sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache

export COMPOSER_ALLOW_SUPERUSER=1

composer dump-autoload --no-interaction
composer install --no-interaction

php artisan cache:clear
php artisan config:cache
php artisan view:cache
php artisan route:cache
php artisan event:cache
php artisan migrate --force

sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl restart sparkagent-worker:*

npm install
npm run build

# Log deployment
echo "Deployment successful at $(date)" >> $LOG_FILE
