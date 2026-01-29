# 🪑 Canon Furnitures - E-Commerce Website

**A modern, production-ready furniture e-commerce platform built with Laravel 10, Blade, Tailwind CSS, and Alpine.js**

[![Laravel 10](https://img.shields.io/badge/Laravel-10.50-red.svg)](https://laravel.com)
[![PHP 8+](https://img.shields.io/badge/PHP-8.0+-blue.svg)](https://php.net)
[![MySQL 8](https://img.shields.io/badge/MySQL-8.0+-orange.svg)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](#license)

## 🚀 Quick Start

```bash
# Clone & Install
git clone <repo> && cd oak-furnitures
composer install && npm install

# Setup
cp .env.example .env
php artisan key:generate

# Database
php artisan migrate --seed

# Run
php artisan serve
npm run dev

# Login: admin@canonfurnitures.com / admin123456
```

## ✨ Features

### 👥 Customer Features
- 🏠 Beautiful home page with hero section
- 🛒 Shop page with advanced filtering (category, price, availability)
- 📦 Product details with gallery and related items
- 🏷️ Category browsing
- 💬 WhatsApp integration for purchases
- 📱 Fully responsive mobile design
- ℹ️ About & Contact pages

### 🛠️ Admin Features
- 📊 Dashboard with statistics
- 📋 Complete product CRUD
- 💰 Price & inventory management
- ✅ Product activation/deactivation
- 🔐 Admin-only access with middleware
- 📈 Recent products overview

### 🔒 Security & Auth
- User authentication (login/logout)
- Role-based access control (admin/user)
- CSRF protection
- Password hashing with bcrypt
- Input validation on all forms
- SQL injection prevention (ORM)

## 🛠️ Tech Stack

| Component | Technology |
|-----------|------------|
| **Backend** | Laravel 10, PHP 8+ |
| **Frontend** | Blade, Tailwind CSS, Alpine.js |
| **Database** | MySQL 8.0 |
| **Icons** | Font Awesome 6 |
| **Authentication** | Laravel Breeze |
| **Package Manager** | Composer, NPM |

## 📁 Project Structure

```
canon-furnitures/
├── app/Http/Controllers/
│   ├── Admin/                    # Admin CRUD controllers
│   ├── HomeController.php
│   ├── ShopController.php
│   ├── ProductController.php
│   └── ...
├── app/Http/Middleware/
│   └── IsAdmin.php              # Role-based protection
├── app/Models/
│   ├── User.php
│   ├── Product.php
│   ├── Category.php
│   └── ProductImage.php
├── resources/views/
│   ├── admin/                   # Admin dashboard views
│   ├── layouts/
│   ├── home.blade.php
│   ├── shop.blade.php
│   ├── product.blade.php
│   └── ...
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── AdminUserSeeder.php
│       ├── CategorySeeder.php
│       └── ProductSeeder.php
├── routes/
│   └── web.php
├── config/
│   ├── app.php
│   └── services.php             # WhatsApp config
└── .env                         # Environment variables
```

## 🌐 Routes

### Public Routes
| Route | Purpose |
|-------|---------|
| `GET /` | Home page |
| `GET /shop` | Shop with filters |
| `GET /product/{slug}` | Product details |
| `GET /category/{slug}` | Category page |
| `GET /about` | About page |
| `GET /contact` | Contact page |
| `GET /login` | Login page |

### Admin Routes (Protected by auth + admin middleware)
| Route | Purpose |
|-------|---------|
| `GET /admin/dashboard` | Dashboard overview |
| `GET /admin/products` | Products list |
| `GET /admin/products/create` | Add product form |
| `POST /admin/products` | Store product |
| `GET /admin/products/{id}/edit` | Edit product form |
| `PUT /admin/products/{id}` | Update product |
| `DELETE /admin/products/{id}` | Delete product |

## 📊 Database Schema

### Users Table
```sql
id, name, email, password, role (user/admin), email_verified_at, created_at, updated_at
```

### Categories Table
```sql
id, name, slug (unique), description, created_at, updated_at
```

### Products Table
```sql
id, category_id (FK), name, slug (unique), description, price (decimal), 
stock (integer), is_active (boolean), created_at, updated_at
```

### Product Images Table
```sql
id, product_id (FK), image_path, is_primary (boolean), created_at, updated_at
```

## 🎨 Design

**Color Scheme** (Professional Furniture Store Aesthetic)
- 🟤 **Oak Brown** (#8B5A3C) - Primary CTA
- ⚫ **Charcoal** (#333333) - Text
- ⚪ **Off-White** (#F5F5F5) - Background
- 🟢 **Forest Green** (#4B7D5D) - Accents

**Typography**
- Serif fonts for headings (elegant)
- Sans-serif for body (readable)

**Components**
- Responsive grid layouts
- Touch-friendly buttons
- Smooth transitions
- Accessible forms

## 🔐 Security Features

✅ **Authentication**: Password hashing with bcrypt  
✅ **Authorization**: Role-based middleware protection  
✅ **CSRF Protection**: Token validation on all forms  
✅ **Input Validation**: Server-side validation + client-side feedback  
✅ **SQL Injection Prevention**: Eloquent ORM with parameterized queries  
✅ **XSS Prevention**: Blade template auto-escaping  
✅ **Rate Limiting**: Available for sensitive routes  

## 📱 Responsive Design

- ✅ Mobile-first approach
- ✅ Tablet optimization
- ✅ Desktop refinement
- ✅ Hamburger menu on mobile
- ✅ Touch-friendly interface
- ✅ Optimized images

## 📦 Sample Data

The project includes:
- **4 Categories**: Beds, Sofas, Dining Sets, TV Stands
- **12 Products**: Various furniture with prices and stock
- **Admin Account**: admin@canonfurnitures.com / admin123456

Run seeder to populate:
```bash
php artisan db:seed
```

## 🚀 Deployment

### Deployment Platforms Supported
- ✅ Google Cloud Run (Recommended)
- ✅ AWS Lambda
- ✅ Heroku
- ✅ Traditional VPS (Linode, DigitalOcean)
- ✅ Shared Hosting (with SSH access)

### Quick Deployment to Google Cloud Run

```bash
# Build and deploy
gcloud run deploy canon-furnitures \
  --source . \
  --platform managed \
  --region us-central1

# Run migrations
gcloud run jobs execute migrate-canon
```

See [DEPLOYMENT.md](DEPLOYMENT.md) for detailed instructions.

## 📚 Documentation

- **[SETUP.md](SETUP.md)** - Installation and setup guide
- **[DEPLOYMENT.md](DEPLOYMENT.md)** - Production deployment checklist
- **[DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md)** - Developer reference
- **[ARCHITECTURE.md](ARCHITECTURE.md)** - System architecture & sitemap
- **[PROJECT_SUMMARY.md](PROJECT_SUMMARY.md)** - Project completion summary

## 🐛 Troubleshooting

**Database connection fails?**
```bash
php artisan migrate:fresh --seed
```

**Admin can't login?**
Check user role in database:
```bash
php artisan tinker
>>> User::where('role', 'admin')->first()
```

**Images not showing?**
Ensure images exist in `public/images/` directory and run:
```bash
php artisan storage:link
```

**Cache issues?**
```bash
php artisan cache:clear
php artisan config:clear
```

See [SETUP.md](SETUP.md) for more troubleshooting.

## 💡 Features Roadmap

### Current Version (v1.0)
- ✅ Product browsing & filtering
- ✅ Admin CRUD operations
- ✅ WhatsApp integration
- ✅ Responsive design
- ✅ Authentication

### Future Enhancements
- [ ] Image upload to admin panel
- [ ] Cloudinary CDN integration
- [ ] User reviews/ratings
- [ ] Wishlist functionality
- [ ] Email notifications
- [ ] Analytics dashboard
- [ ] Multi-language support
- [ ] SMS integration

## 🤝 Contributing

We welcome contributions! Please:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is open-source software licensed under the [MIT license](LICENSE.md).

## 📞 Support

- **Email**: support@canonfurnitures.com
- **WhatsApp**: +254 798 422727
- **Issues**: Create an issue on GitHub

## 🙏 Acknowledgments

Built with:
- [Laravel Framework](https://laravel.com)
- [Tailwind CSS](https://tailwindcss.com)
- [Alpine.js](https://alpinejs.dev)
- [Font Awesome](https://fontawesome.com)

## 📄 Project Timeline

- **Started**: January 2026
- **Completed**: January 29, 2026
- **Status**: ✅ Production Ready

---

<div align="center">

**[🏠 Home](/)** • **[🛒 Shop](/shop)** • **[📞 Contact](/contact)** • **[👤 Admin](/admin/dashboard)**

Built with ❤️ for Canon Furnitures

</div>

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
