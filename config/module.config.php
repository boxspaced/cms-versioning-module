<?php
namespace Versioning;

use Core\Model\ServiceFactory;

return [
    'service_manager' => [
        'factories' => [
            Model\VersioningService::class => ServiceFactory::class,
        ],
    ],
];
