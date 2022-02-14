<?php
namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    public function make(): array
    {
        $productSizes = array();

        $productCounts = array_count_values(self::products);

        array_walk($productCounts, function($item, $key) use(&$productSizes) {
            $productDescription = explode('-', $key);
            $productColor = $productDescription[0];
            $productSize = $productDescription[1];

            $containsProductColor = array_key_exists($productColor, $productSizes);
            if(!$containsProductColor) {
                $productSizes[$productColor] = array();
            }

            $productSizes[$productColor][$productSize] = $item;
        });

        return $productSizes;
    }
}