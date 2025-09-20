<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the main product - Glowlin Hydrating Clay Mask
        $product = Product::create([
            'title' => 'Glowlin Hydrating Clay Mask',
            'description' => 'Our signature product - a premium hydrating clay mask that deeply cleanses and moisturizes your skin. Made with natural clay and organic ingredients, this mask removes impurities while providing essential hydration. Perfect for all skin types, especially beneficial for Pakistani skin in our climate. Leaves your skin feeling soft, supple, and radiant.',
            'price' => 2500.00,
            'stock' => 50,
            'is_active' => true
        ]);

        // Create sample product images (using placeholder images for now)
        ProductImage::create([
            'product_id' => $product->id,
            'image_url' => 'products/sample-mask-1.jpg',
            'is_primary' => true,
            'sort_order' => 0
        ]);

        ProductImage::create([
            'product_id' => $product->id,
            'image_url' => 'products/sample-mask-2.jpg',
            'is_primary' => false,
            'sort_order' => 1
        ]);

        ProductImage::create([
            'product_id' => $product->id,
            'image_url' => 'products/sample-mask-3.jpg',
            'is_primary' => false,
            'sort_order' => 2
        ]);

        // Create additional sample products
        $products = [
            [
                'title' => 'Glowlin Vitamin C Serum',
                'description' => 'Brighten and even out your skin tone with our Vitamin C serum. Packed with antioxidants and natural ingredients, this serum helps reduce dark spots and gives you a healthy glow.',
                'price' => 1800.00,
                'stock' => 30
            ],
            [
                'title' => 'Glowlin Rose Water Toner',
                'description' => 'Refresh and hydrate your skin with our pure rose water toner. Made from organic roses, this toner helps balance your skin\'s pH and provides a refreshing boost.',
                'price' => 1200.00,
                'stock' => 40
            ],
            [
                'title' => 'Glowlin Aloe Vera Gel',
                'description' => 'Soothe and moisturize your skin with our pure aloe vera gel. Perfect for sunburn relief, daily moisturizing, and sensitive skin care.',
                'price' => 800.00,
                'stock' => 60
            ]
        ];

        foreach ($products as $productData) {
            $newProduct = Product::create([
                'title' => $productData['title'],
                'description' => $productData['description'],
                'price' => $productData['price'],
                'stock' => $productData['stock'],
                'is_active' => true
            ]);

            // Add a primary image for each product
            ProductImage::create([
                'product_id' => $newProduct->id,
                'image_url' => 'products/sample-product.jpg',
                'is_primary' => true,
                'sort_order' => 0
            ]);
        }
    }
}
