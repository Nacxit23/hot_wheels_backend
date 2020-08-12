<?php

namespace App\GraphQL\Mutations\Products;

use App\Models\products;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Execution\Utils\GlobalId;

class updateProduct
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args)
    {
        $input = $args['input'];

        $globalId = new GlobalId();

        $products = products::all();
        $product = $products->find($globalId->decodeID($input['id']));

        throw_unless(
            $product,
            UserError::class,
            'El producto solicitado no existe.'
        );

        $allParam = array($input['bodyType'], $input['color'], $input['mark'], $input['name'],
            $input['price'], $input['type'], $input['category']);

        $confirmNullAttribute = $this->confirmAttribute($allParam, $product);

        $sizeConfirm = new createProducts();

        if ($input['size'] == null || $input['size'] = "") {
            $size = $product->size;
        } else {
            $size = $sizeConfirm->determineSize($input['size']);
        }

        $date = date("Y-m-d");

        $productUpdate = $product->update([
            "date" => $date,
            "price" => $confirmNullAttribute['price'],
            "size" => $size,
            "body_type" => $confirmNullAttribute['bodyType'],
            "mark" => $confirmNullAttribute['mark'],
            "name" => $confirmNullAttribute['name'],
            "type" => $confirmNullAttribute['type'],
            "category" => $confirmNullAttribute['category']
        ]);

        return $productUpdate;
    }

    private function confirmAttribute($attributes, $product)
    {
        $newAttributes = array();

        if ($attributes[0] === null || $attributes[0] === "") {
            $bodyType = $product->body_type;
            $newAttributes['bodyType'] = $bodyType;

        } else {
            $newAttributes['bodyType'] = $attributes[0];

        }
        if ($attributes[1] === null || $attributes[1] === "") {
            $color = $product->color;
            $newAttributes['color'] = $color;;
        } else {
            $newAttributes['color'] = $attributes[1];

        }
        if ($attributes[2] === null || $attributes[2] === "") {
            $mark = $product->mark;
            $newAttributes['mark'] = $mark;
        } else {
            $newAttributes['mark'] = $attributes[2];

        }
        if ($attributes[3] === null || $attributes[3] === "") {
            $name = $product->name;
            $newAttributes['name'] = $name;
        } else {
            $newAttributes['name'] = $attributes[3];

        }
        if ($attributes[4] === null || $attributes[4] === "") {
            $price = $product->price;
            $newAttributes['price'] = $price;

        } else {
            $newAttributes['price'] = $attributes[4];

        }
        if ($attributes[5] === null || $attributes[5] === "") {
            $type = $product->type;
            $newAttributes['type'] = $type;

        } else {
            $newAttributes['type'] = $attributes[5];

        }
        if ($attributes[6] === null || $attributes[6] === "") {
            $category = $product->category;
            $newAttributes['category'] = $category;
        } else {
            $newAttributes['category'] = $attributes[6];

        }
        return $newAttributes;
    }
}
