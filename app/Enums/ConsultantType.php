<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PASSPORT()
 * @method static static BOOKTOUR()
 */
final class ConsultantType extends Enum
{
    const PASSPORT = 'Làm giấy thông hành/hộ chiếu';
    const BOOKTOUR = 'Book tour';
}
