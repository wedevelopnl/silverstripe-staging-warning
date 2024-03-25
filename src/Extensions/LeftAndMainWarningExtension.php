<?php

declare(strict_types=1);

namespace WeDevelop\StagingWarning\Extensions;

use SilverStripe\Admin\LeftAndMainExtension;
use SilverStripe\View\Requirements;

class LeftAndMainWarningExtension extends LeftAndMainExtension
{
    #[\Override]
    public function init()
    {
        $customWarningText = $this->getOwner()->SiteConfig()->StagingWarningBarText;
        if ($customWarningText !== null && $customWarningText !== '') {
            $customContent = <<<CSS
                .cms-container:before {
                    content: "{$customWarningText}";
                }
                CSS;
            Requirements::customCSS($customContent);
        }
    }
}
