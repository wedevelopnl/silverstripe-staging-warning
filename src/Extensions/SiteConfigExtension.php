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
        'ShowStagingWarning' => 'Boolean(true)',
        'StagingWarningBarText' => 'Varchar(255)',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName([
            'ShowStagingWarning',
        ]);

        if(Director::isDev() || Director::isTest()){
            $fields->addFieldsToTab('Root.Admin.StagingWarning', [
                CheckboxField::create('ShowStagingWarning', 'Show staging warning at top of the admin panel'),
                Wrapper::create([
                    TextField::create('StagingWarningBarText', 'Staging warning bar text'),
                ])->displayIf('ShowStagingWarning')->isChecked()->endIf(),
            ]);
        }
    }
}
