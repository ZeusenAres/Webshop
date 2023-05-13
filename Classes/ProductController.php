<?php
require_once('Database.php');
class ProductController extends Database
{
    private array $user = [];
    public function __construct()
    {
        parent::__construct();
        $this->setTable('products');
    }

    public function selectAllProducts() : array
    {
        $statement = $this->conn->prepare("SELECT * FROM $this->table");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function selectProduct($id) : array
    {
        $statement = $this->conn->prepare("SELECT * FROM $this->table WHERE product_id = :id");
        $statement->execute(['id' => $id]);
        return $statement->fetchAll();
    }

    public function insertProduct(string $name, int $price, string $productType, string $properties, string $description, string $category, string $image)
    {
        $statement = $this->conn->prepare("INSERT INTO $this->table(product_name, price, product_type, product_properties, product_description, category, product_image) VALUES(:product_name, :price, :product_type, :product_properties, :product_description, :category, :product_image)");
        $statement->execute([
            'product_name' => $name,
            'price' => $price,
            'product_type' => $productType,
            'product_properties' => $properties,
            'product_description' => $description,
            'category' => $category,
            'product_image' => $image
            ]);
        return $statement->fetchAll();
    }
}