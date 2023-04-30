<?php

namespace api\DB_Connection;

use api\products\model\product;
use Exception;
use PDO;
use PDOException;

class ProductDataConnection
{

    public function insert(Product $product)
    {
        $connection = DBconnection::get_connection();
        $data = $product->get_properties();
        $table = $product::TABLE_NAME;

        $column = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($column) VALUES ($values)";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $event) {
            throw new Exception('Failed to insert to the table: ' . $event->getMessage());
        }
    }

    public function select(string $table): array
    {
        $connection = DBconnection::get_connection();
        $sql = "SELECT * FROM $table ORDER BY SKU";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $event) {
            throw new PDOException($event->getMessage());
        }
    }

    public function delete_product(array $array): string
    {
        $connection = DBconnection::get_connection();
        $items_to_delete = "'" . implode("','", array_values($array)) . "'";
        $sql = "
            DELETE FROM book WHERE SKU IN ($items_to_delete);
            DELETE FROM DVD WHERE SKU IN ($items_to_delete);
            DELETE FROM furniture WHERE SKU IN ($items_to_delete);
        ";

        try {
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $event) {
            http_response_code(500);
            return 0;
        }
    }

    public function get_all_skus()
    {
        $connection = DBconnection::get_connection();
        $sql = "SELECT SKU FROM DVD
                UNION ALL
                SELECT SKU FROM book
                UNION ALL
                SELECT SKU FROM furniture";


        try {
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $event) {
            throw new PDOException($event->getMessage());
        }
    }
}
