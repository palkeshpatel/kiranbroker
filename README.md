# Kiran Broker - Real Estate Management System

A comprehensive Laravel-based real estate management system with property listings, user management, and admin panel powered by Voyager.

## 🚀 System Requirements

### Server Requirements

-   **PHP**: 7.4 or higher (8.0+ recommended)
-   **Composer**: 2.x (Composer 1.x is deprecated and will cause dependency issues)
-   **MySQL**: 5.7+ or MariaDB 10.2+
-   **Web Server**: Apache/Nginx
-   **Node.js**: 14+ (for asset compilation)

### PHP Extensions Required

-   BCMath PHP Extension
-   Ctype PHP Extension
-   JSON PHP Extension
-   Mbstring PHP Extension
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension
-   cURL PHP Extension
-   GD PHP Extension
-   Fileinfo PHP Extension

## 📦 Installation & Setup

### 1. Clone the Repository

```bash
git clone <repository-url>
cd kiranbroker
```

### 2. Install Dependencies

**IMPORTANT**: Make sure you have Composer 2.x installed. If you're using Composer 1.x, upgrade first:

```bash
# Check Composer version
composer --version

# If using Composer 1.x, upgrade to Composer 2
composer self-update
```

Then install dependencies:

```bash
composer install --no-dev --optimize-autoloader
```

### 3. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup

```bash
# Run migrations
php artisan migrate

# Seed the database (optional)
php artisan db:seed
```

### 5. Storage Setup

```bash
# Create storage link
php artisan storage:link

# Set proper permissions
chmod -R 775 storage bootstrap/cache
```

### 6. Voyager Admin Panel Setup

```bash
# Install Voyager
php artisan voyager:install --with-dummy

# Create admin user (if not using dummy data)
php artisan voyager:admin your@email.com --create
```

## 🔧 Deployment Instructions

### For Shared Hosting

1. Upload all files to your hosting directory
2. Set document root to `/public` folder
3. Configure your `.env` file with production settings
4. Run `composer install --no-dev --optimize-autoloader`
5. Run `php artisan migrate`
6. Set proper file permissions (755 for directories, 644 for files)

### For VPS/Dedicated Server

1. Follow the installation steps above
2. Configure your web server (Apache/Nginx)
3. Set up SSL certificate
4. Configure cron jobs for Laravel scheduler

### Environment Variables (.env)

```env
APP_NAME="Kiran Broker"
APP_ENV=production
APP_KEY=base64:your-key-here
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email
MAIL_FROM_NAME="${APP_NAME}"
```

## 🛠️ Troubleshooting

### Composer Issues

If you encounter dependency resolution errors:

1. **Composer Version Issue**:

    ```bash
    # Upgrade to Composer 2
    composer self-update
    ```

2. **Clear Composer Cache**:

    ```bash
    composer clear-cache
    composer install --no-dev
    ```

3. **Update Dependencies**:
    ```bash
    composer update --no-dev
    ```

### Permission Issues

```bash
# Set proper permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Database Issues

```bash
# Clear cache
php artisan config:clear
php artisan cache:clear

# Re-run migrations
php artisan migrate:fresh --seed
```

## 📁 Project Structure

```
kiranbroker/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   ├── Models/             # Eloquent models
│   └── Views/              # Custom views
├── resources/views/         # Blade templates
├── public/                 # Public assets
├── storage/                # File uploads
└── database/               # Migrations and seeders
```

## 🔐 Security Features

-   CSRF protection enabled
-   XSS protection
-   SQL injection prevention
-   File upload validation
-   Admin panel authentication

## 📧 Contact & Support

For technical support or questions about deployment, please contact the development team.

## 📄 License

This project is licensed under the MIT License.

---

**Note**: This application uses Laravel 8.x with Voyager admin panel. Make sure your server meets all the requirements before deployment.
