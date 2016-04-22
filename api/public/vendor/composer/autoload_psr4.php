<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'setup\\' => array($baseDir . '/app/setup'),
    'Symfony\\Polyfill\\Mbstring\\' => array($vendorDir . '/symfony/polyfill-mbstring'),
    'Symfony\\Component\\Translation\\' => array($vendorDir . '/symfony/translation'),
    'Services\\' => array($baseDir . '/app/services'),
    'Models\\' => array($baseDir . '/app/models'),
    'Helpers\\' => array($baseDir . '/app/helpers'),
    'Carbon\\' => array($vendorDir . '/nesbot/carbon/src/Carbon'),
    'Api\\' => array($baseDir . '/app/controllers/Api'),
);
