<?php

namespace Botble\BusinessService\Enums;

use Botble\Base\Supports\Enum;

/**
 * @method static PackageDuration HOURLY()
 * @method static PackageDuration DAILY()
 * @method static PackageDuration WEEKLY()
 * @method static PackageDuration MONTHLY()
 * @method static PackageDuration ANNUALLY()
 * @method static PackageDuration QUARTERLY()
 */
class PackageDuration extends Enum
{
    public const HOURLY = 'hourly';

    public const DAILY = 'daily';

    public const WEEKLY = 'weekly';

    public const MONTHLY = 'monthly';

    public const QUARTERLY = 'quarterly';

    public const ANNUALLY = 'annually';

    public static $langPath = 'plugins/business-services::business-services.enums.package_durations';
}
