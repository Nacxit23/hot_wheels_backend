<?php

namespace App\GraphQL\Mutations\Products;

use App\Models\products;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class createProducts
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {

        $input = $args["input"];

        $size = $this->determineSize($input['size']);

        $userId = $context->user()->id;

        logger($userId);
        throw_if(
            $input["price"] <= 0,
            UserError::class,
            "El precio del producto no puede ser negativo o cero."
        );

        $date = date("Y-m-d");

        $newProduct = products::create([
            'body_type' => $input['bodyType'],
            'color' => $input['color'],
            'date' => $date,
            'mark' => $input['mark'],
            'name' => $input['name'],
            'price' => $input['price'],
            'size' => $size,
            'type' => $input['type'],
            'user_id' => $userId,
        ]);

        return $newProduct;
    }

    public function determineSize($size)
    {
        $scaleSize = array('1/18', '1/24', '1/32', '1/43', '1/64', '1/87');

        switch ($size) {
            case $size === $scaleSize[0]:

                return '1/18';

            case $size === $scaleSize[1]:

                return '1/24';

            case $size === $scaleSize[2]:

                return '1/32';

            case $size === $scaleSize[3]:

                return '1/43';

            case $size === $scaleSize[4]:

                return '1/64';

            case $size === $scaleSize[5]:

                return '1/87';

            default :
                throw  new UserError("El producto no conside con ningún tamaño existente. ");
        }
    }
}

