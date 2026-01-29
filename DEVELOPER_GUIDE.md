# Canon Furnitures - Developer Quick Reference

## 🚀 Getting Started (2 minutes)

```bash
# 1. Install
composer install && npm install

# 2. Setup
cp .env.example .env && php artisan key:generate

# 3. Database
php artisan migrate && php artisan db:seed

# 4. Run
php artisan serve
npm run dev

# 5. Login
# Visit: http://localhost:8000/login
# Email: admin@canonfurnitures.com
# Password: admin123456
```

---

## 📁 Where Things Live

| What | Where |
|------|-------|
| Controllers | `app/Http/Controllers/` |
| Admin Controllers | `app/Http/Controllers/Admin/` |
| Models | `app/Models/` |
| Views | `resources/views/` |
| Admin Views | `resources/views/admin/` |
| Routes | `routes/web.php` |
| Database Schema | `database/migrations/` |
| Seeds | `database/seeders/` |
| Config | `config/` |
| Middleware | `app/Http/Middleware/` |

---

## 🛣️ Key Controllers

### HomeController
- `index()` → Load home page with featured products

### ShopController
- `index()` → Shop page with filters, categories, pagination

### ProductController
- `show($slug)` → Product details + related products

### CategoryController
- `show($slug)` → Category page with products

### AdminDashboardController
- `index()` → Admin dashboard with stats

### AdminProductController
- `index()` → List all products (paginated)
- `create()` → Show create form
- `store()` → Save new product
- `edit($id)` → Show edit form
- `update($id)` → Save product changes
- `destroy($id)` → Delete product

---

## 🗂️ Models & Relationships

```php
// User Model
User::where('role', 'admin')->first();
auth()->user()->role; // Get user role

// Product Model
$product->category; // Get category
$product->images; // Get all images
$product->images()->where('is_primary', true)->first(); // Primary image

// Category Model
$category->products; // Get all products in category

// ProductImage Model
$image->product; // Get related product
```

---

## 🔐 Authentication & Authorization

```php
// Check if logged in
if (auth()->check()) { ... }

// Check if admin
if (auth()->user()->role === 'admin') { ... }

// Or use helper
if (auth()->user()->isAdmin()) { ... }  // Define in User model

// Middleware usage
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin routes
});

// In blade
@auth
    @if(auth()->user()->role === 'admin')
        <!-- Admin content -->
    @endif
@endauth
```

---

## 📊 Database Queries

```php
// Get all active products with category
$products = Product::where('is_active', true)
    ->with('category')
    ->paginate(12);

// Get by category
$products = Product::whereHas('category', 
    fn($q) => $q->where('slug', $category_slug)
)->get();

// Filter by price
$products = Product::whereBetween('price', [$min, $max])->get();

// Get in stock
$products = Product::where('stock', '>', 0)->get();

// Get with images
$products = Product::with('images')->get();
$mainImage = $product->images()->where('is_primary', true)->first();
```

---

## 🎨 Tailwind CSS Classes Used

```
Colors:
- oak-brown (primary)
- dark-oak (hover)
- off-white (background)
- charcoal (text)
- forest-green (accents)

Spacing:
- py-8 (padding vertical)
- px-4 (padding horizontal)
- mb-6 (margin bottom)
- gap-8 (flex/grid gap)

Responsive:
- max-w-7xl (container)
- grid-cols-1 md:grid-cols-2 lg:grid-cols-3
- hidden sm:flex (show on sm+)
- block sm:hidden (hide on sm+)
```

---

## 🔗 Common URLs

| Page | URL |
|------|-----|
| Home | `/` |
| Shop | `/shop?category=beds&price_min=0&price_max=50000` |
| Product | `/product/premium-mahogany-bed-frame` |
| Category | `/category/beds` |
| About | `/about` |
| Contact | `/contact` |
| Login | `/login` |
| Admin Dashboard | `/admin/dashboard` |
| Admin Products | `/admin/products` |
| Add Product | `/admin/products/create` |
| Edit Product | `/admin/products/5/edit` |

---

## 🔄 Common Tasks

### Add New Category
```php
// In migration or seeder
Category::create([
    'name' => 'Chairs',
    'slug' => 'chairs',
    'description' => 'Comfortable office and dining chairs',
]);
```

### Add New Product
```php
Product::create([
    'category_id' => 1,
    'name' => 'Modern Office Chair',
    'slug' => 'modern-office-chair',
    'description' => 'Ergonomic office chair...',
    'price' => 25000,
    'stock' => 10,
    'is_active' => true,
]);
```

### Get Admin User
```php
$admin = User::where('role', 'admin')->first();
```

### Create Admin User
```php
User::create([
    'name' => 'New Admin',
    'email' => 'newadmin@canon.com',
    'password' => bcrypt('securepassword'),
    'role' => 'admin',
]);
```

### Change Product Price
```php
$product = Product::find(1);
$product->update(['price' => 30000]);
```

### Deactivate Product
```php
$product->update(['is_active' => false]);
```

---

## 🐛 Debugging Tips

```php
// Log message
\Log::info('User logged in', ['user_id' => auth()->id()]);

// View log
tail -f storage/logs/laravel.log

// Tinker shell (interactive)
php artisan tinker
>>> User::count()
>>> Product::where('price', '>', 50000)->get()

// Dump and die
dd($variable); // or dump($variable); for just dump

// Query debugging
DB::listen(function($query) {
    \Log::info($query->sql);
});
```

---

## 📦 Artisan Commands

```bash
# Database
php artisan migrate                    # Run migrations
php artisan migrate:fresh --seed      # Reset database
php artisan migrate:rollback          # Undo last migration
php artisan db:seed --class=ProductSeeder  # Run specific seeder

# Cache
php artisan cache:clear               # Clear cache
php artisan config:cache              # Cache config
php artisan route:cache               # Cache routes
php artisan view:cache                # Cache views

# Maintenance
php artisan tinker                    # Interactive shell
php artisan make:migration name       # Create migration
php artisan make:seeder name          # Create seeder
php artisan make:controller name      # Create controller
php artisan make:model name           # Create model

# Utilities
php artisan serve                     # Start dev server
php artisan optimize:production       # Production optimization
php artisan storage:link              # Link storage directory
```

---

## 🎯 Common Blade Template Patterns

```php
{{-- Loop through products --}}
@foreach($products as $product)
    <h3>{{ $product->name }}</h3>
    <p>{{ $product->description }}</p>
@endforeach

{{-- Conditional --}}
@if($product->stock > 0)
    <span>In Stock</span>
@else
    <span>Out of Stock</span>
@endif

{{-- User check --}}
@auth
    <p>Welcome {{ auth()->user()->name }}</p>
@endauth

@guest
    <a href="/login">Login</a>
@endguest

{{-- Link generation --}}
<a href="{{ route('product.show', $product->slug) }}">
    {{ $product->name }}
</a>

{{-- Form --}}
<form action="{{ route('admin.products.store') }}" method="POST">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <span>{{ $message }}</span>
    @enderror
    <button type="submit">Save</button>
</form>
```

---

## 🔑 Environment Variables (.env)

```
APP_NAME=Canon Furnitures
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_DATABASE=oakfurnitures
DB_USERNAME=root
DB_PASSWORD=

WHATSAPP_NUMBER=254798422727
```

---

## 📱 WhatsApp Integration

All WhatsApp buttons use this pattern:
```php
$phone = config('services.whatsapp.number');
$message = "Hello Canon Furnitures 👋\n\nMessage here";
$url = "https://wa.me/{$phone}?text=" . urlencode($message);
```

Example in product page:
```blade
<a href="https://wa.me/{{ config('services.whatsapp.number') }}?text={{ urlencode("I'm interested in: " . $product->name) }}">
    Order on WhatsApp
</a>
```

---

## 🧪 Testing

```php
// Test controller
php artisan tinker
>>> $product = Product::first();
>>> $response = $this->get('/product/' . $product->slug);

// Test database
>>> User::where('role', 'admin')->exists();
>>> Product::count();
>>> Category::all();
```

---

## 📚 File Locations Quick Map

```
To modify...                           Go to...
────────────────────────────────────────────────────────────
Logo/Branding                          resources/views/layouts/
Navigation menu                        resources/views/layouts/navigation.blade.php
Home page content                      resources/views/home.blade.php
Shop filters                           app/Http/Controllers/ShopController.php
Product details                        app/Http/Controllers/ProductController.php
Admin dashboard stats                  app/Http/Controllers/Admin/AdminDashboardController.php
Colors/Theme                           tailwind.config.js
Database schema                        database/migrations/
Sample data                            database/seeders/
Admin routes                           routes/web.php
Authentication                         config/auth.php
Database config                        config/database.php
WhatsApp number                        .env (WHATSAPP_NUMBER)
Email settings                         .env (MAIL_*)
```

---

## 💡 Pro Tips

1. **Use eager loading**: `Product::with('category')->get()` instead of N+1 queries
2. **Always validate input**: Use `$request->validate([...])`
3. **Use route names**: `route('product.show', $id)` instead of hardcoded URLs
4. **Cache queries**: For frequently accessed data
5. **Log important events**: Use `\Log::info()` for debugging
6. **Test locally first**: Before deploying to production
7. **Backup database**: Before running migrations
8. **Use migrations**: Never modify database directly
9. **Keep secrets in .env**: Never commit credentials
10. **Monitor logs**: Check `storage/logs/laravel.log` regularly

---

## 🚀 Deployment in 3 Steps

1. **Prepare**: Follow DEPLOYMENT.md checklist
2. **Upload**: Push code to server
3. **Finalize**: Run migrations and optimize

```bash
php artisan migrate --force
php artisan db:seed --class=AdminUserSeeder
php artisan config:cache
php artisan optimize:production
```

---

## 📞 Support Resources

- Documentation: `SETUP.md`, `DEPLOYMENT.md`, `PROJECT_SUMMARY.md`
- Laravel Docs: https://laravel.com/docs
- Tailwind Docs: https://tailwindcss.com/docs
- PHP: https://www.php.net/manual

---

**Last Updated**: January 29, 2026
**Status**: Production Ready ✅
