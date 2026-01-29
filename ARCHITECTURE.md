# Canon Furnitures - Architecture & Sitemap

## 🏗️ Application Architecture

```
┌─────────────────────────────────────────────────────────────────┐
│                     Canon Furnitures Website                     │
├─────────────────────────────────────────────────────────────────┤
│                                                                   │
│  ┌──────────────────┐  ┌──────────────────┐  ┌──────────────┐  │
│  │   Web Browser    │  │   Mobile App     │  │   WhatsApp   │  │
│  │   (Customer)     │  │   (Responsive)   │  │ (Order Flow) │  │
│  └────────┬─────────┘  └────────┬─────────┘  └──────┬───────┘  │
│           │                      │                    │           │
│           └──────────────────────┼────────────────────┘           │
│                                  │                                │
│                         ┌────────▼────────┐                      │
│                         │   Laravel 10    │                      │
│                         │   Web Server    │                      │
│                         └────────┬────────┘                      │
│                                  │                                │
│  ┌───────────────────────────────┼───────────────────────────┐   │
│  │                               │                           │   │
│  ▼                               ▼                           ▼   │
│ ┌────────────────┐  ┌────────────────────┐  ┌──────────────┐   │
│ │    Routes      │  │   Controllers      │  │  Middleware  │   │
│ │ (web.php)      │  │                    │  │              │   │
│ │                │  │ • Home             │  │ • Auth       │   │
│ │ • Public       │  │ • Shop             │  │ • IsAdmin    │   │
│ │ • Admin        │  │ • Product          │  │ • CSRF       │   │
│ │ • Auth         │  │ • Category         │  │              │   │
│ │                │  │ • AdminDashboard   │  │              │   │
│ │                │  │ • AdminProduct     │  │              │   │
│ └────────────────┘  └────────────────────┘  └──────────────┘   │
│           │                    │                     │            │
│           └────────┬───────────┴──────────────────┬──┘            │
│                    │                              │               │
│                    ▼                              ▼               │
│           ┌──────────────────┐        ┌────────────────┐         │
│           │   Models & ORM   │        │ Blade Templates│         │
│           │                  │        │  (Views)       │         │
│           │ • User           │        │                │         │
│           │ • Product        │        │ • admin/       │         │
│           │ • Category       │        │ • layouts/     │         │
│           │ • ProductImage   │        │ • home.blade   │         │
│           │                  │        │ • shop.blade   │         │
│           └────────┬─────────┘        │ • product.blade│         │
│                    │                  │ • etc...       │         │
│                    │                  └────────┬───────┘         │
│                    └──────────────┬────────────┘                 │
│                                   │                              │
│                           ┌───────▼───────┐                     │
│                           │    MySQL 8    │                     │
│                           │   Database    │                     │
│                           │               │                     │
│                           │ • users       │                     │
│                           │ • categories  │                     │
│                           │ • products    │                     │
│                           │ • images      │                     │
│                           └───────────────┘                     │
│                                                                   │
└─────────────────────────────────────────────────────────────────┘
```

---

## 📍 Website Sitemap

```
CANON FURNITURES WEBSITE
│
├── 🏠 HOME (/)
│   ├── Hero Section
│   ├── Shop by Category
│   ├── Featured Products
│   ├── Best Sellers
│   ├── Why Canon Furnitures
│   └── CTA: Shop Now
│
├── 🛒 SHOP (/shop)
│   ├── Filters
│   │   ├── Category Select
│   │   ├── Price Range (Min-Max)
│   │   └── Availability
│   ├── Product Grid (12 per page)
│   │   ├── Product Card
│   │   │   ├── Image
│   │   │   ├── Name
│   │   │   ├── Price
│   │   │   └── Add to Compare
│   │   └── Pagination
│   └── Sidebar Categories
│
├── 📦 PRODUCT DETAILS (/product/{slug})
│   ├── Product Gallery
│   │   ├── Main Image
│   │   └── Thumbnail Images
│   ├── Product Info
│   │   ├── Name
│   │   ├── Price
│   │   ├── Availability Status
│   │   ├── Description
│   │   └── Specifications
│   ├── CTA: Order on WhatsApp
│   └── Related Products (4)
│
├── 🏷️ CATEGORY (/category/{slug})
│   ├── Category Header
│   ├── Product Listing
│   ├── Filters (same as shop)
│   └── Pagination
│
├── ℹ️ ABOUT (/about)
│   ├── About Canon Furnitures
│   ├── Company Story
│   ├── Mission & Values
│   └── Why Choose Us
│
├── 📞 CONTACT (/contact)
│   ├── Contact Info
│   │   ├── Email
│   │   ├── Phone
│   │   └── Address
│   └── Contact Form
│
├── 🔐 AUTH
│   ├── Login (/login)
│   │   ├── Email Input
│   │   ├── Password Input
│   │   └── Remember Me
│   ├── Register (/register) - Hidden
│   ├── Forgot Password (/forgot-password)
│   └── Reset Password (/reset-password)
│
├── 👤 USER PROFILE (/profile)
│   ├── Edit Profile
│   ├── Change Password
│   └── Delete Account
│
└── 🛠️ ADMIN PANEL (/admin/*)
    ├── 📊 Dashboard (/admin/dashboard)
    │   ├── Total Products Stats
    │   ├── Active Products Stats
    │   ├── Categories Count
    │   ├── Quick Actions
    │   └── Recent Products Table
    │
    └── 📋 Products Management (/admin/products)
        ├── Products List (/admin/products)
        │   ├── Table with All Products
        │   ├── Search & Filter
        │   ├── Pagination
        │   ├── Edit Button
        │   └── Delete Button
        │
        ├── Create Product (/admin/products/create)
        │   ├── Name Input
        │   ├── Category Select
        │   ├── Price Input
        │   ├── Stock Input
        │   ├── Description Textarea
        │   ├── Active Checkbox
        │   └── Submit Button
        │
        └── Edit Product (/admin/products/{id}/edit)
            ├── Pre-filled Form Fields
            ├── Update Button
            └── Cancel Button
```

---

## 🗄️ Database Relationships

```
┌─────────────┐
│   Users     │
├─────────────┤
│ id (PK)     │
│ name        │
│ email       │
│ password    │
│ role        │◄──── enum: 'user' | 'admin'
│ created_at  │
└─────────────┘


┌──────────────────┐         ┌──────────────────┐
│   Categories     │         │   Products       │
├──────────────────┤         ├──────────────────┤
│ id (PK)          │◄────────│ id (PK)          │
│ name             │ 1    *  │ category_id (FK) │
│ slug (unique)    │         │ name             │
│ description      │         │ slug             │
│ created_at       │         │ description      │
└──────────────────┘         │ price            │
                             │ stock            │
        │                    │ is_active        │
        │                    │ created_at       │
        │                    └──────────────────┘
        │                            │
        │                            │ 1    *
        │                            │
        │                    ┌──────────────────┐
        │                    │  ProductImages   │
        │                    ├──────────────────┤
        │                    │ id (PK)          │
        │                    │ product_id (FK)  │◄──┐
        │                    │ image_path       │   │
        │                    │ is_primary       │   │
        │                    │ created_at       │   │
        │                    └──────────────────┘   │
        │                                          │
        └──────────────────────────────────────────┘

Key Relationships:
- Category has many Products (1:N)
- Product belongs to Category (N:1)
- Product has many ProductImages (1:N)
- ProductImage belongs to Product (N:1)
```

---

## 🔄 Request/Response Flow

### Customer Viewing Product

```
Customer Browser
        │
        │ GET /product/premium-mahogany-bed
        │
        ▼
    Web Server (Laravel)
        │
        ├─► Route::get('/product/{slug}', [ProductController::class, 'show'])
        │
        ├─► ProductController->show($slug)
        │   ├─► $product = Product::where('slug', $slug)->with('category')->first()
        │   ├─► Get related products
        │   └─► return view('product', compact('product', 'relatedProducts'))
        │
        ├─► Blade Template Rendering
        │   ├─► Loop through images
        │   ├─► Display product info
        │   ├─► Generate WhatsApp link
        │   └─► Show related products
        │
        ▼
    HTML Response
        │
        ├─► Apply CSS (Tailwind)
        ├─► Load JS (Alpine.js)
        ├─► Load Font Awesome Icons
        └─► Load Images
        │
        ▼
Customer Browser Renders Page
```

### Admin Creating Product

```
Admin Browser
        │
        │ GET /admin/products/create
        │
        ▼
    Auth Middleware
        │
        ├─► auth()->check() ✓
        └─► auth()->user()->role === 'admin' ✓
        │
        ▼
    AdminProductController->create()
        │
        ├─► $categories = Category::all()
        └─► return view('admin.products.create', compact('categories'))
        │
        ▼
    Admin Fills Form & POSTs
        │
        │ POST /admin/products
        │
        ▼
    Auth Middleware ✓
        │
        ▼
    AdminProductController->store()
        │
        ├─► $validated = $request->validate([...])
        ├─► $validated['slug'] = Str::slug($validated['name'])
        ├─► Product::create($validated)
        └─► redirect()->route('admin.products.index')->with('success')
        │
        ▼
    Redirect to Products List
        │
        ▼
    AdminProductController->index()
        │
        ├─► $products = Product::with('category')->paginate(15)
        └─► return view('admin.products.index', compact('products'))
        │
        ▼
    Admin Sees Product Added with Success Message
```

---

## 🎯 Data Flow: Product Purchase (WhatsApp)

```
Customer Views Product Page
        │
        ├─► See Product Image, Name, Price
        │
        ▼
Customer Clicks "Order on WhatsApp"
        │
        ├─► JavaScript generates WhatsApp URL:
        │   https://wa.me/254798422727?text=
        │   Hello%20Canon%20Furnitures...
        │   Product%3A%20Premium%20Mahogany%20Bed%20Frame...
        │   Price%3A%20KES%2045000...
        │
        ▼
Browser Opens WhatsApp
        │
        ├─► Desktop: WhatsApp Web opens
        ├─► Mobile: WhatsApp App opens
        │
        ▼
Message Pre-filled with:
        │
        ├─► Company Name: Canon Furnitures
        ├─► Product Name: Premium Mahogany Bed Frame
        ├─► Price: KES 45,000
        └─► Request for Availability & Delivery
        │
        ▼
Customer Reviews & Sends Message
        │
        ▼
Vendor (Admin) Responds on WhatsApp
        │
        ├─► Confirms availability
        ├─► Arranges delivery
        ├─► Collects payment details
        └─► Completes transaction
        │
        ▼
Order Complete! 🎉
```

---

## 🔒 Security Layers

```
┌─────────────────────────────────────────────────────────┐
│              Security Architecture                       │
├─────────────────────────────────────────────────────────┤
│                                                           │
│  Layer 1: Web Server (HTTPS/TLS)
│  ├─► Encrypted communication
│  └─► Certificate validation
│
│  Layer 2: CSRF Protection
│  ├─► Token in form
│  ├─► Token verification
│  └─► Cross-domain validation
│
│  Layer 3: Authentication
│  ├─► Password hashing (bcrypt)
│  ├─► Session management
│  └─► User verification
│
│  Layer 4: Authorization
│  ├─► Role-based access (admin/user)
│  ├─► Middleware checks
│  └─► Route protection
│
│  Layer 5: Input Validation
│  ├─► Server-side validation
│  ├─► Type checking
│  └─► SQL injection prevention (ORM)
│
│  Layer 6: SQL Injection Prevention
│  ├─► Eloquent ORM
│  ├─► Prepared statements
│  └─► Parameter binding
│
│  Layer 7: XSS Prevention
│  ├─► Blade escaping
│  ├─► HTML encoding
│  └─► Content security policy
│
└─────────────────────────────────────────────────────────┘
```

---

## 📊 Admin Dashboard Data Flow

```
Admin Access /admin/dashboard
        │
        ▼
    Route Protection
    ├─► auth() ✓
    └─► admin role ✓
        │
        ▼
    AdminDashboardController->index()
        │
        ├─► $totalProducts = Product::count()
        ├─► $totalCategories = Category::count()
        ├─► $activeProducts = Product::where('is_active', true)->count()
        └─► $recentProducts = Product::latest()->take(10)->get()
        │
        ▼
    Blade Template
        │
        ├─► Display Stats Cards
        │   ├─► Total Products: 12
        │   ├─► Active Products: 10
        │   └─► Categories: 4
        │
        ├─► Quick Actions Section
        │   ├─► Add New Product
        │   ├─► Manage Products
        │   └─► Logout
        │
        └─► Recent Products Table
            ├─► Name
            ├─► Category
            ├─► Price
            ├─► Stock
            ├─► Status
            └─► Edit Link
        │
        ▼
    Admin Dashboard Rendered
```

---

## 🌐 Deployment Architecture (Google Cloud)

```
┌─────────────────────────────────────────────────────┐
│           Google Cloud Platform                       │
├─────────────────────────────────────────────────────┤
│                                                       │
│  ┌──────────────────────────────────────────────┐   │
│  │  Cloud CDN (Images)                          │   │
│  │  ├─► gs://canon-furnitures-images           │   │
│  │  └─► Caching & Distribution                 │   │
│  └──────────────────────────────────────────────┘   │
│                  ▲                                    │
│                  │                                    │
│  ┌──────────────────────────────────────────────┐   │
│  │  Cloud Run (Web Server)                      │   │
│  │  ├─► Docker container                       │   │
│  │  ├─► Laravel application                    │   │
│  │  └─► Auto-scaling                           │   │
│  └──────────────────────────────────────────────┘   │
│                  ▲                                    │
│                  │                                    │
│  ┌──────────────────────────────────────────────┐   │
│  │  Cloud SQL (Database)                        │   │
│  │  ├─► MySQL 8.0                              │   │
│  │  ├─► oakfurnitures database                 │   │
│  │  ├─► Daily backups                          │   │
│  │  └─► Automatic failover                     │   │
│  └──────────────────────────────────────────────┘   │
│                                                       │
│  ┌──────────────────────────────────────────────┐   │
│  │  Cloud Logging                               │   │
│  │  └─► Error tracking & monitoring             │   │
│  └──────────────────────────────────────────────┘   │
│                                                       │
└─────────────────────────────────────────────────────┘
```

---

## 📱 Mobile Responsive Breakpoints

```
Mobile First Design:
├─► Base (320px+)  - Mobile phones
├─► sm: 640px      - Landscape phones
├─► md: 768px      - Tablets
├─► lg: 1024px     - Desktops
└─► xl: 1280px     - Large screens

Grid Layouts:
├─► grid-cols-1               - 1 column (mobile)
├─► md:grid-cols-2            - 2 columns (tablet)
└─► lg:grid-cols-3            - 3 columns (desktop)

Examples:
├─► hidden sm:flex            - Hide on mobile, show on tablet+
├─► block sm:hidden           - Show on mobile, hide on tablet+
└─► text-sm md:text-base      - Smaller text on mobile
```

---

## ✨ Key Features Architecture

```
Feature: WhatsApp Integration
├─► Storage: WHATSAPP_NUMBER in .env/.config
├─► Display: On product cards & details
├─► Flow: Generate URL → Open wa.me link → Chat with vendor
└─► Security: No data transmission, just link generation

Feature: Product Filtering
├─► Inputs: Category, Price Range, Availability
├─► Query: ShopController builds WHERE clauses
├─► Display: Filtered product grid with pagination
└─► URL: /shop?category=beds&price_min=0&price_max=50000

Feature: Admin CRUD
├─► Create: /admin/products/create form → AdminProductController->store()
├─► Read: /admin/products → List with pagination
├─► Update: /admin/products/{id}/edit form → AdminProductController->update()
└─► Delete: Form button → AdminProductController->destroy()

Feature: Authentication
├─► Register: Disabled / Hidden
├─► Login: /login with email & password
├─► Logout: POST /logout via form
├─► Roles: User → Admin via database role column
└─► Middleware: Route protection with auth + admin
```

---

**Architecture designed for scalability, security, and maintainability.**
**Production-ready as of January 29, 2026.**
