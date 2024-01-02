<?php

namespace WeDevelop\StagingWarning\Extensions;

use SilverStripe\Control\Director;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

final class SiteConfigExtension extends DataExtension
{
    private static array $db = [
        'ShowStagingWarning' => 'Boolean(true)',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName([
            'ShowStagingWarning',
        ]);

        if(Director::isDev() || Director::isTest()){
            $fields->addFieldsToTab('Root.Admin.StagingWarning', [
                CheckboxField::create('ShowStagingWarning', 'Show staging warning at top of the admin panel'),
            ]);
        }
    }
}
