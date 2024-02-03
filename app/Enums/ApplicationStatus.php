<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Attributes\Description;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ApplicationStatus extends Enum
{
    #[Description('Application pending review and approval')]
    const Pending = 'pending';

    #[Description('Application has been approved')]
    const Approved = 'approved';

    #[Description('Application has been rejected')]
    const Rejected = 'rejected';
}
