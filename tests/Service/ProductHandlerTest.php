<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\ProductHandler;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];



    public function testGetTotalPrice()
    {
        $ProductHandlerClass = new ProductHandler();
        $totalPrice =$ProductHandlerClass->GetTotalPrice($this->products);
        $this->assertEquals(143, $totalPrice);
    }

    public function testChangeUnixTimeStamp()
    {
        $unixTimestampMap = array(
            0=>1618884000,1=>1618966800,2=>1618916400,3=>1618706700,4=>1618814280,5=>1617535380
        ); 

        $ProductHandlerClass = new ProductHandler();
        $products =$ProductHandlerClass->ChangeUnixTimeStamp($this->products);
        foreach ($products as $key => $value) {
            $this->assertEquals($unixTimestampMap[$key], $value["create_at"]);
        }

    }

    public function testSortPriceDesc()
    {
        $ProductHandlerClass = new ProductHandler();
        $products =$ProductHandlerClass->SortPriceDesc($this->products);
       // print_r($products);
       $productsCheck = [
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ]
    ];

        $this->assertEquals($productsCheck, $products);
    }
}