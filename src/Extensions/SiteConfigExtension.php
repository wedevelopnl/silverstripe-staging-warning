<?php

namespace WeDevelop\StagingWarning\Extensions;

use SilverStripe\Control\Director;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;
use UncleCheese\DisplayLogic\Forms\Wrapper;

final class SiteConfigExtension extends DataExtension
{
    private static array $db = [
        'StagingWarningBarText' => 'Varchar(255)',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        if(Director::isDev() || Director::isTest()){
            $fields->addFieldsToTab('Root.Admin.StagingWarning', [
                TextField::create('StagingWarningBarText', 'Staging warning bar text'),
            ]);
        }
    }
}
