<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class InvoiceStatus extends Enum
{
    const Pending = 'pending';
    const Overdue = 'overdue';
    const Paid = 'paid';
    const Cancelled = 'cancelled';

}
