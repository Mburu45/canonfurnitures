# Production Deployment Checklist

## Pre-Deployment

### Environment & Security
- [ ] Change admin password from `admin123456` to a strong password
- [ ] Update `.env` with production values:
  - `APP_ENV=production`
  - `APP_DEBUG=false`
  - `APP_URL=https://yourdomain.com`
  - `DB_HOST=your-db-host`
  - `DB_PASSWORD=secure-password`
- [ ] Regenerate `APP_KEY`: `php artisan key:generate`
- [ ] Set up SSL/TLS certificate (Let's Encrypt recommended)

### Database
- [ ] Create production MySQL database
- [ ] Back up all data before migration
- [ ] Run migrations: `php artisan migrate --force`
- [ ] Run seeds: `php artisan db:seed --class=AdminUserSeeder`
- [ ] Verify all tables created correctly
- [ ] Set up automated database backups (daily)

### Files & Storage
- [ ] Upload images to `public/images/` directory
- [ ] Set proper file permissions:
  ```bash
  chmod 755 storage bootstrap/cache
  chmod 777 storage/logs storage/app
  ```
- [ ] Configure image CDN (optional, for better performance)

### Caching & Optimization
- [ ] Clear old caches:
  ```bash
  php artisan cache:clear
  php artisan config:clear
  php artisan view:clear
  ```
- [ ] Generate optimized configs:
  ```bash
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
  ```
- [ ] Run optimization:
  ```bash
  php artisan optimize:production
  ```

### Email Configuration
- [ ] Set up email driver (SMTP, Mailgun, SendGrid, etc.)
- [ ] Configure in `.env`:
  ```
  MAIL_MAILER=smtp
  MAIL_HOST=smtp.mailtrap.io
  MAIL_PORT=465
  MAIL_USERNAME=your-username
  MAIL_PASSWORD=your-password
  MAIL_ENCRYPTION=tls
  ```
- [ ] Test email sending

### WhatsApp Integration
- [ ] Verify WhatsApp number is correct in `.env`: `WHATSAPP_NUMBER`
- [ ] Test WhatsApp links from shop pages
- [ ] Create WhatsApp business account (optional)

## Deployment (Google Cloud Run Example)

### 1. Create Cloud SQL Instance
```bash
gcloud sql instances create canon-db \
  --database-version=MYSQL_8_0 \
  --tier=db-f1-micro \
  --region=us-central1
```

### 2. Create Database
```bash
gcloud sql databases create oakfurnitures --instance=canon-db
```

### 3. Create Cloud Storage Bucket (for images)
```bash
gsutil mb gs://canon-furnitures-images
gsutil cp -r public/images/* gs://canon-furnitures-images/
```

### 4. Deploy to Cloud Run
```bash
gcloud run deploy canon-furnitures \
  --source . \
  --platform=managed \
  --region=us-central1 \
  --memory=1024MB \
  --timeout=3600 \
  --set-env-vars DB_CONNECTION=mysql,\
DB_HOST=your-cloud-sql-ip,\
DB_DATABASE=oakfurnitures,\
DB_USERNAME=root,\
DB_PASSWORD=your-secure-password,\
APP_ENV=production,\
APP_DEBUG=false
```

### 5. Run Migrations on Cloud
```bash
gcloud run jobs create migrate-canon \
  --image gcr.io/your-project/canon-furnitures \
  --tasks=1 \
  --set-env-vars DB_HOST=your-cloud-sql-ip

gcloud run jobs execute migrate-canon
```

## Post-Deployment

### Verification
- [ ] Visit website: https://yourdomain.com
- [ ] Test home page loads
- [ ] Test shop page and filters
- [ ] Test product details page
- [ ] Test WhatsApp button integration
- [ ] Test login/logout
- [ ] Test admin dashboard access
- [ ] Test admin product CRUD

### Monitoring
- [ ] Set up error logging (Sentry, LogRocket, etc.)
- [ ] Monitor database performance
- [ ] Set up uptime monitoring (Pingdom, UptimeRobot)
- [ ] Review server logs daily
- [ ] Set up automated alerts

### Maintenance
- [ ] Daily: Check error logs
- [ ] Weekly: Monitor performance metrics
- [ ] Monthly: Review analytics and user feedback
- [ ] Quarterly: Security updates and patches
- [ ] Annually: Full security audit

### Backup Strategy
- [ ] Automated daily database backups
- [ ] Off-site backup storage (AWS S3, Google Cloud Storage)
- [ ] Test restore procedures
- [ ] Keep 30 days of backups

## Troubleshooting

**Database Connection Error:**
```bash
# Test connection
php artisan tinker
DB::connection()->getPdo();
```

**Migration Failed:**
```bash
# Rollback and retry
php artisan migrate:rollback
php artisan migrate --force
```

**Permission Denied Errors:**
```bash
chmod -R 755 storage bootstrap/cache
chmod -R 777 storage/logs
```

**Storage Issues:**
```bash
php artisan storage:link
```

## Security Hardening

### Web Server (Nginx/Apache)
- [ ] Disable directory listing
- [ ] Hide server version headers
- [ ] Set security headers (CSP, X-Frame-Options, etc.)
- [ ] Enable HTTPS/TLS only
- [ ] Implement CORS if needed

### Laravel Configuration
- [ ] Disable debug mode: `APP_DEBUG=false`
- [ ] Set proper session timeout
- [ ] Enable rate limiting
- [ ] Use strong CSRF tokens
- [ ] Validate all input

### Database
- [ ] Use strong passwords
- [ ] Limit database user privileges
- [ ] Enable encryption at rest
- [ ] Enable SSL for database connections
- [ ] Regular backups with verification

### Admin Access
- [ ] Use unique, strong admin password
- [ ] Enable 2FA if possible
- [ ] Monitor admin login attempts
- [ ] Regular password rotation

## Performance Optimization

### Caching Strategy
- [ ] Enable Redis for session management
- [ ] Cache database queries
- [ ] Cache API responses
- [ ] Use page caching for static content

### CDN & Images
- [ ] Upload images to CDN (Cloudinary, AWS CloudFront)
- [ ] Optimize image sizes
- [ ] Use WebP format when possible
- [ ] Set proper cache headers

### Database
- [ ] Index frequently queried columns
- [ ] Optimize queries
- [ ] Use eager loading
- [ ] Archive old data

## Monitoring Dashboard

Create a monitoring setup with:
- Application performance monitoring (New Relic, DataDog)
- Error tracking (Sentry)
- Uptime monitoring (Pingdom)
- Log aggregation (ELK Stack, Loggly)

## Support & Documentation

- **Admin Email**: admin@canonfurnitures.com
- **Support Email**: support@canonfurnitures.com
- **Error Logs**: `storage/logs/laravel.log`
- **Database Backups**: Regular automated backups

---

For questions or issues, contact the development team.
