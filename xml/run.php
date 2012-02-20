<?php
require_once __DIR__ . '/AnAspect.php';
require_once __DIR__ . '/MyService.php';
require_once 'Ding/Autoloader/Autoloader.php';
Ding\Autoloader\Autoloader::register();

$options = array('ding' => array(
    'factory' => array(
        'bdef' => array(
            'xml' => array(
                'filename' => array('beans.xml'),
                'directories' => array(__DIR__)
            )
        )
    )
));

use Ding\Container\Impl\ContainerImpl as DingContainer;
$container = DingContainer::getInstance($options);

$bean = $container->getBean('someXmlBean');
$bean->methodNotIntercepted();
$bean->doBusiness1('1', '2', '3');
$bean->doBusiness2('4', '3', '2');
$bean->wontDoBusiness3();
