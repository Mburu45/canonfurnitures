# Canon Furnitures - E-Commerce Website

A modern, production-ready furniture e-commerce website built with Laravel 10, Blade, Tailwind CSS, and Alpine.js. Customers browse furniture and inquire via WhatsApp.

## Features

✅ **Admin Dashboard**
- Product CRUD operations
- Inventory management
- Category management
- Admin-only authentication

✅ **Customer-Facing**
- Browse products by category
- Filter by price and availability
- WhatsApp integration for purchases
- Responsive mobile design
- Elegant UI with Tailwind CSS

✅ **Security**
- User authentication with email/password
- Role-based access control (admin/user)
- CSRF protection
- Registration disabled for public

✅ **Database**
- MySQL with migrations
- Proper relationships (products, categories, images)
- Seed data for demo

## Tech Stack

- **Backend**: Laravel 10, PHP 8+
- **Frontend**: Blade, Tailwind CSS, Alpine.js
- **Database**: MySQL
- **Icons**: Font Awesome
- **Authentication**: Laravel Breeze

## Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── AdminDashboardController.php
│   │   │   │   └── AdminProductController.php
│   │   │   ├── HomeController.php
│   │   │   ├── ShopController.php
│   │   │   ├── ProductController.php
│   │   │   └── ... other controllers
│   │   └── Middleware/
│   │       └── IsAdmin.php
│   └── Models/
│       ├── User.php
│       ├── Product.php
│       ├── Category.php
│       └── ProductImage.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   ├── navigation.blade.php
│       │   └── footer.blade.php
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   └── products/
│       ├── home.blade.php
│       ├── shop.blade.php
│       ├── product.blade.php
│       ├── about.blade.php
│       └── contact.blade.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── AdminUserSeeder.php
│       ├── CategorySeeder.php
│       └── ProductSeeder.php
└── routes/
    └── web.php
```

## Setup Instructions

### 1. Clone & Install

```bash
cd oak-furnitures
composer install
npm install
```

### 2. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env`:
```
DB_DATABASE=oakfurnitures
DB_USERNAME=root
DB_PASSWORD=
WHATSAPP_NUMBER=254798422727
```

### 3. Database Setup

```bash
php artisan migrate
php artisan db:seed
```

This creates:
- **Admin User**: `admin@canonfurnitures.com` / `admin123456`
- **Sample Categories**: Beds, Sofas, Dining Sets, TV Stands
- **Sample Products**: 12 furniture items

### 4. Run Development Server

```bash
php artisan serve
npm run dev
```

Visit: `http://localhost:8000`

### 5. Admin Access

1. Go to `/login`
2. Login with admin credentials
3. Click "Admin Dashboard" in the dropdown menu
4. Or visit: `/admin/dashboard`

## User Flows

### For Customers
1. Visit home page → Browse featured products
2. Click "Shop" → Filter by category/price
3. Click "View Details" on a product
4. Click "Order on WhatsApp" → Opens WhatsApp with pre-filled message
5. Vendor responds on WhatsApp to complete sale

### For Admin
1. Login at `/login`
2. Access `/admin/dashboard`
3. Manage products: View, Create, Edit, Delete
4. Manage inventory and pricing
5. Activate/Deactivate products

## Key Routes

**Public Routes:**
- `GET /` - Home page
- `GET /shop` - Shop with filters
- `GET /product/{slug}` - Product details
- `GET /category/{slug}` - Category page
- `GET /about` - About page
- `GET /contact` - Contact page

**Auth Routes:**
- `GET /login` - Login page
- `GET /register` - Disabled (hidden)
- `GET /profile` - User profile

**Admin Routes (protected by auth + admin middleware):**
- `GET /admin/dashboard` - Dashboard overview
- `GET /admin/products` - Products list
- `GET /admin/products/create` - Add product form
- `POST /admin/products` - Store product
- `GET /admin/products/{id}/edit` - Edit product form
- `PUT /admin/products/{id}` - Update product
- `DELETE /admin/products/{id}` - Delete product

## Configuration

### WhatsApp Integration

WhatsApp number is configured in `.env`:
```
WHATSAPP_NUMBER=254798422727
```

Change this to your business WhatsApp number. Links automatically use this number.

### Email (Optional)

For production, configure mail in `.env`:
```
MAIL_FROM_ADDRESS=admin@canonfurnitures.com
MAIL_FROM_NAME="Canon Furnitures"
```

## Deployment

### Google Cloud Platform

1. **Create Cloud Run service**
   ```bash
   gcloud run deploy canon-furnitures \
     --source . \
     --platform managed \
     --region us-central1 \
     --set-env-vars DB_HOST=your-cloud-sql-ip
   ```

2. **Set up Cloud SQL (MySQL)**
   ```bash
   gcloud sql instances create canon-db
   gcloud sql databases create oakfurnitures
   ```

3. **Upload images to Cloud Storage**
   ```bash
   gsutil cp -r public/images gs://your-bucket/images
   ```

4. **Run migrations on Cloud**
   ```bash
   gcloud run jobs create migrate --image gcr.io/your-project/canon
   gcloud run jobs execute migrate
   ```

### Production Checklist

- [ ] Set `APP_ENV=production` in `.env`
- [ ] Set `APP_DEBUG=false`
- [ ] Regenerate `APP_KEY`: `php artisan key:generate`
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Seed admin user: `php artisan db:seed --class=AdminUserSeeder`
- [ ] Cache config: `php artisan config:cache`
- [ ] Cache routes: `php artisan route:cache`
- [ ] Cache views: `php artisan view:cache`
- [ ] Optimize for production: `php artisan optimize:production`
- [ ] Set up SSL/TLS certificate
- [ ] Update `APP_URL` in `.env`
- [ ] Backup database regularly
- [ ] Monitor error logs
- [ ] Set up automated backups

## Admin Credentials

**Email**: admin@canonfurnitures.com  
**Password**: admin123456

**⚠️ Change this password immediately after first login!**

## Database Schema

### users
- id, name, email, password, role (user/admin), timestamps

### categories
- id, name, slug, description, timestamps

### products
- id, category_id, name, slug, description, price, stock, is_active, timestamps

### product_images
- id, product_id, image_path, is_primary, timestamps

## Troubleshooting

**Migration errors:**
```bash
php artisan migrate:refresh --seed
```

**Cache issues:**
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

**Permissions (Linux/Mac):**
```bash
chmod -R 755 storage bootstrap/cache
chmod -R 777 storage/logs
```

**Database not found:**
```bash
mysql -u root -e "CREATE DATABASE oakfurnitures;"
```

## Support

For issues or questions, contact: info@canonfurnitures.com

---

Built with ❤️ for Canon Furnitures
