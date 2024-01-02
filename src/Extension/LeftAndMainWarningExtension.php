<?php

namespace WeDevelop\StagingWarning\Extensions;

use SilverStripe\Admin\LeftAndMainExtension;
use SilverStripe\Control\Director;
use SilverStripe\SiteConfig\SiteConfig;

class LeftAndMainWarningExtension extends LeftAndMainExtension
{
    public function WarningModal(): bool
    {
        if (SiteConfig::current_site_config()->ShowStagingWarning && (Director::isDev() || Director::isTest())) {
            return true;
        }

        return false;
    }
}
