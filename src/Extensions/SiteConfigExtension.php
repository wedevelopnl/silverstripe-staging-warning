<?php

declare(strict_types=1);

namespace WeDevelop\StagingWarning\Extensions;

use SilverStripe\Control\Director;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

final class SiteConfigExtension extends DataExtension
{
    /**
     * @config
     * @var array<string, string>
     */
    private static array $db = [
        'StagingWarningBarText' => 'Varchar(255)',
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        if(Director::isDev() || Director::isTest()){
            $fields->addFieldsToTab('Root.Admin.StagingWarning', [
                TextField::create('StagingWarningBarText', 'Staging warning bar text'),
            ]);
        }
    }
}
