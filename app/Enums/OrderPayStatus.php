<?php

namespace App\Enums;

/**
 * @method static string all()
 * @method static string allKeys()
 * @method static string|null nameFor($value)
 * @method static array toArray()
 * @method static array forApi()
 * @method static string slug(int $value)
 * @method static array withTitle(string $file = 'enums', string $prefix = '')
 * @method static array toResource(int $value, string $file = 'enums', string $prefix = '')
 * @method static int|string randomValue()
 */
class OrderPayStatus extends Base
{
    public const PENDING     = 0;
    public const DOWNPAYMENT = 1;
    public const DONE        = 2;
    public const RETURNED    = 3;
}
