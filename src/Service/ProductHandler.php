<?php

namespace App\Service;

class ProductHandler
{   
    public function GetTotalPrice($products)
    {
        $totalPrice = 0;
        foreach ($products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }

        return $totalPrice;
    }

    public function SortPriceDesc($products)
    {
        foreach ($products as $key => $value) {
            $price[$key] = $value["price"];
        }
        array_multisort($price,SORT_NUMERIC,SORT_DESC,$products);

        $products_new = array(); 
        foreach ($products as $key => $value) {
            if ($value["type"] == "Dessert"){
                $products_new[] = $value;
            }
        }
        return $products_new;
    }


    public function ChangeUnixTimeStamp($products)
    {
        date_default_timezone_set('Asia/Shanghai');
        foreach ($products as $key => $value) {
            $products[$key]["create_at"] = strtotime($value["create_at"]);  
        }
        return $products;
    }

}