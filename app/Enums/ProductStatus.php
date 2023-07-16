<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self draft()
 * @method static self trash()
 * @method static self published()
 */
class ProductStatus extends Enum
{
    protected static function values(): array
    {
        return [
            'draft' => 'Draft',
            'trash' => 'Trash',
            'published' => 'Published',
        ];
    }
}
