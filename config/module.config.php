<?php
namespace Boxspaced\CmsVersioningModule;

use Boxspaced\CmsCoreModule\Model\ServiceFactory;

return [
    'service_manager' => [
        'factories' => [
            Model\VersioningService::class => ServiceFactory::class,
        ],
    ],
];
