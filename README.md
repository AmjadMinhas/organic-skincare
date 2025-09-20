# Glowlin - Organic Skincare E-commerce Website

A complete Laravel-based e-commerce website for organic skincare products, specifically designed for Pakistani customers.

## Features

### Frontend Features
- **Home Page**: Hero banner with featured product, product carousel, and call-to-action
- **Product Catalog**: Browse all products with pagination
- **Product Details**: Detailed product view with multiple images and add-to-cart functionality
- **Shopping Cart**: Session-based cart with quantity management
- **Checkout Process**: Complete checkout with customer information collection
- **Order Confirmation**: Order summary and confirmation page
- **Responsive Design**: Mobile-friendly design using the provided HTML template

### Admin Panel Features
- **Product Management**: Add, edit, delete products with multiple image uploads
- **Order Management**: View all orders, update order status, and manage customer information
- **Dashboard**: Order statistics and management overview

### Technical Features
- **Laravel Framework**: Latest stable version with clean MVC architecture
- **Blade Templates**: Converted HTML theme to Laravel Blade templates
- **MySQL Database**: Complete database schema with relationships
- **Session-based Cart**: No login required for shopping
- **Cash on Delivery**: Primary payment method with other options (disabled)
- **User Registration**: Optional user registration during checkout
- **Image Upload**: Multiple product image support with primary image selection
- **PKR Currency**: All prices displayed in Pakistani Rupees

## Database Schema

- **users**: Customer information with optional password
- **products**: Product details with pricing and stock
- **product_images**: Multiple images per product with primary image support
- **orders**: Order information with customer details
- **order_items**: Individual items within each order

## Installation Instructions

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL
- Web server (Apache/Nginx)

### Setup Steps

1. **Clone/Download the project**
   ```bash
   cd organic-skincare
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**
   - Create a MySQL database
   - Update `.env` file with your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run Migrations and Seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Create Storage Link**
   ```bash
   php artisan storage:link
   ```

7. **Start the Development Server**
   ```bash
   php artisan serve
   ```

8. **Access the Website**
   - Frontend: http://localhost:8000
   - Admin Panel: http://localhost:8000/admin/products

## File Structure

```
organic-skincare/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── ProductController.php
│   │   ├── CartController.php
│   │   ├── CheckoutController.php
│   │   └── Admin/
│   │       ├── ProductController.php
│   │       └── OrderController.php
│   └── Models/
│       ├── Product.php
│       ├── ProductImage.php
│       ├── Order.php
│       ├── OrderItem.php
│       └── User.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── ProductSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       ├── products/
│       ├── cart/
│       ├── checkout/
│       └── admin/
├── public/
│   └── assets/
│       ├── css/
│       ├── js/
│       └── images/
└── routes/
    └── web.php
```

## Sample Data

The seeder creates sample products including:
- Glowlin Hydrating Clay Mask (₨2,500)
- Glowlin Vitamin C Serum (₨1,800)
- Glowlin Rose Water Toner (₨1,200)
- Glowlin Aloe Vera Gel (₨800)

## Deployment on Hostinger

1. **Upload Files**: Upload all project files to your hosting directory
2. **Database Setup**: Create MySQL database and import the schema
3. **Environment**: Update `.env` file with production database credentials
4. **Storage**: Ensure storage directory is writable
5. **Web Server**: Configure web server to point to `public` directory

## Key Features for Pakistani Market

- **Cash on Delivery**: Primary payment method
- **PKR Currency**: All prices in Pakistani Rupees
- **Local Contact**: Pakistani phone numbers and addresses
- **Organic Focus**: Emphasis on natural, chemical-free products
- **Mobile Responsive**: Optimized for mobile users
- **No Login Required**: Easy shopping without registration

## Admin Access

Access the admin panel at `/admin/products` to:
- Manage products and inventory
- View and update order status
- Monitor sales and customer information

## Support

For any issues or questions, please contact:
- Email: info@glowlin.pk
- Phone: +92 300 123 4567

---

**Note**: This is a complete e-commerce solution ready for deployment. Make sure to configure your database and update the environment variables before going live.