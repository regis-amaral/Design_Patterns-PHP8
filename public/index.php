<?php

use Core\Creational\Builder\Conceptual\SmartPhoneBuilder;
use Core\Creational\Builder\Conceptual\SamsungPhone;
use Core\Creational\Builder\Conceptual\ApplePhone;
use Core\Creational\Builder\Conceptual\SmartPhoneCreator;

require_once '../vendor/autoload.php';

// Example 1

$galaxyS20 = new SmartPhoneBuilder(
    smartPhone: new SamsungPhone(),
    data: [
        'gpu' => 'XPTO',
        'cpu' => 'XPTO Nitro',
        'ram' => 12,
        'sensors' => ['focus', 'balance'],
        'model' => 'XPTO z20',
    ]
);
$galaxyS20->addGpu();
$galaxyS20->addCpu();
$galaxyS20->addRam();
// or
$galaxyS20->addModel()
    ->addSensors()
    ->getSmartPhone();


// Example 2, whit Creator / Director

$smartPhone = new SmartPhoneBuilder(
    smartPhone: new ApplePhone(),
    data: [
        'gpu' => 'XPTO',
        'cpu' => 'XPTO Nitro',
        'ram' => 12,
        'sensors' => ['focus', 'balance'],
        'model' => 'XPTO z20',
    ]
);
$smartPhoneCreator = new SmartPhoneCreator($smartPhone);
$iphone20 = $smartPhoneCreator->buildPhone();