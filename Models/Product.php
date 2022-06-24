<?php

namespace Models\Product;

use Models\Model\Model;

class Product extends Model
{
    const ORDER_BY_PRICE_ASC = 'price-asc';
    const ORDER_BY_PRICE_DESC = 'price-desc';

    public $id;
    public $title;
    public $description;
    public $status;
    public $price;
    public $category;
    public $img;

    public function __construct($product)
    {
        $this->id = $product['id'];
        $this->title = $product['title'];
        $this->description = $product['description'];
        $this->status = $product['status'];
        $this->price = $product['price'];
        $this->category = $product['category'];
        $this->img = $product['img'];
    }

    public static function getAllProducts()
    {
        parent::connection('all_products');
        $allProducts = [];
        if (self::$db_status) {
            foreach (parent::fetchAll() as $product) {
                $allProducts[] = new self($product);
            }
        }
        return $allProducts;
    }

    public static function getAvailableProducts($page = null)
    {
        $availabaleProducts = [];
        foreach (self::getAllProducts() as $product) {
            if ($product->status == 1 && $product->category != "ticket" && $product->category != "vip_ticket") {
                $availabaleProducts[] = $product;
            }
        }
        return $availabaleProducts;
    }
    public static function getAvailableProductsPlusTickets($page = null)
    {
        $availabaleProducts = [];
        foreach (self::getAllProducts() as $product) {
            if ($product->status == 1) {
                $availabaleProducts[] = $product;
            }
        }
        return $availabaleProducts;
    }
    public static function getOneProductById($id)
    {
        $products = self::getAvailableProductsPlusTickets();
        foreach ($products as $product) {
            if ($product->id == $id) {
                return $product;
            }
        }
    }

    public static function filteredProducts($searchTerm, $products = [])
    {
        $filteredProducts = [];
        $products = !empty($products) ? $products : self::getAvailableProducts();
        foreach ($products as $product) {
            if (
                str_contains(strtolower($product->title), $searchTerm)
                || str_contains(strtolower($product->description), $searchTerm)
            ) {
                $filteredProducts[] = $product;
            }
        }
        return $filteredProducts;
    }

    public static function sortProductBy($sortBy, $products = [])
    {
        $products = !empty($products) ? $products : self::getAvailableProducts();
        switch ($sortBy) {
            case self::ORDER_BY_PRICE_ASC:
                usort($products, function ($item1, $item2) {
                    return $item1->price > $item2->price;
                });
                break;
            case self::ORDER_BY_PRICE_DESC:
                usort($products, function ($item1, $item2) {
                    return $item1->price < $item2->price;
                });
                break;
            default:
                break;
        }
        return $products;
    }



    public static function getSixRandomProducts()
    {
        $randProd = [];
        foreach (self::getAvailableProducts() as $product) {
            if (count($randProd) >= 4) {
                break;
            }
            $randProd[] = $product;
        }
        return $randProd;
    }

    public function getRelatedProducs()
    {
        $related = [];
        $products = self::getAvailableProducts();
        foreach ($products as  $product) {
            if ($product->category == $this->category && $this->id != $product->id) {
                $related[] = $product;
                if (count($related) >= 3) {
                    break;
                }
            }
        }
        return $related;
    }

    public function getPrevProductId()
    {
        $products = self::getAvailableProducts();
        foreach ($products as $key => $product) {
            if ($product->id == $this->id) {
                if ($key == 0) {
                    return $products[count($products) - 1]->id;
                } else {
                    return $products[$key - 1]->id;
                }
            }
        }
    }

    public function getNextProductId()
    {
        $products = self::getAvailableProducts();
        foreach ($products as $key => $product) {
            if ($product->id == $this->id) {
                if ($key == (count($products) - 1)) {
                    return $products[0]->id;
                } else {
                    return $products[$key + 1]->id;
                }
            }
        }
    }
    public static function getVipTicket()
    {
        $availabaleProducts = [];
        foreach (self::getAllProducts() as $product) {
            if ($product->category == "vip_ticket") {
                $availabaleProducts[] = $product;
            }
        }
        return $availabaleProducts;
    }
    public static function getTicket()
    {
        $availabaleProducts = [];
        foreach (self::getAllProducts() as $product) {
            if ($product->category == "ticket") {
                $availabaleProducts[] = $product;
            }
        }
        return $availabaleProducts;
    }
}
