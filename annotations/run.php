<?php
require_once 'Ding/Autoloader/Autoloader.php';
Ding\Autoloader\Autoloader::register();

$options = array('ding' => array(
    'factory' => array(
        'bdef' => array(
            'annotation' => array('scanDir' => array(__DIR__))
        )
    )
));

use Ding\Container\Impl\ContainerImpl as DingContainer;
$container = DingContainer::getInstance($options);

$bean = $container->getBean('someBean');
$bean->methodNotIntercepted();
$bean->doBusiness1('1', '2', '3');
$bean->doBusiness2('4', '3', '2');
$bean->wontDoBusiness3();
