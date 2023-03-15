<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static HTTP status types
 *
 */
final class HttpStatus extends Enum
{
    const OK = 200;
    const CREATED = 201;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const NOT_FOUND = 404;
    const SERVER_ERROR = 500;
}
