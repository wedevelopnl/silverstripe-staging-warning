<?php

declare(strict_types=1);

namespace WeDevelop\StagingWarning\Extensions;

use SilverStripe\Admin\LeftAndMainExtension;
use SilverStripe\Control\Director;

class LeftAndMainWarningExtension extends LeftAndMainExtension
{
    public function WarningModal(): bool
    {
        if (Director::isDev() || Director::isTest()) {
            return true;
        }

        return false;
    }
}
