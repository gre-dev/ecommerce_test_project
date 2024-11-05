<?php

namespace App\Enums;

class ProductStatus extends Enum
{
    public const IN_STOCK = "in_stock";

    public const OUT_OF_STOCK = "out_of_stock";

    public const COMING_SOON = "coming_soon";

    public const DISCONTINUED = "discontinued";
}
