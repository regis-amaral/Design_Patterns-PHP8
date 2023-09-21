<?php

use Core\Creational\Builder\Conceptual\SmartPhoneBuilder;
use Core\Creational\Builder\Conceptual\SamsungPhone;
use Core\Creational\Builder\Conceptual\ApplePhone;
use Core\Creational\Builder\Conceptual\SmartPhoneCreator;

use Core\Creational\Builder\Practical\Request\BuilderRequest;
use Core\Creational\Builder\Practical\Request\MethodsEnum;
use Core\Creational\Builder\Practical\Enums\Role;
use Core\Creational\Builder\Practical\Address;
use Core\Creational\Builder\Practical\User;
use Core\Creational\Builder\Practical\Phone;
use Core\Creational\Builder\Practical\UserBuilder;

require_once '../vendor/autoload.php';

// EXAMPLE 1, SmartPhoneBuilder

/*
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
*/

// EXAMPLE 2, SmartPhoneBuilder whit Creator / Director

/*
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
*/

// EXAMPLE 3 - Request Builder

/*
$request = new BuilderRequest();
$request->url('http://localhost:8080/api/v1/users');
$request->method(MethodsEnum::GET);
$request->payload(['filsters' => 'reg']);
$request->build();

// or

$request = (new BuilderRequest())
            ->url('http://localhost:8080/api/v1/users')
            ->method(MethodsEnum::GET)
            ->payload(['filsters' => 'reg'])
            ->build();
*/

// EXAMPLE 4 - without builder

/*
$regisFounder = new User(
    firstName: 'Regis',
    lastName: 'Amaral',
    email: 'amaral.regis@gmail.com',
    age: 37,
    role: Role::F,
);
$regisFounder->setAddress(
    new Address(
        street: 'Rua x',
        city: 'City X',
        state: 'State X',
        postalCode: 5757009,
        country: 'BR',
    )
);
$regisFounder->setPhone(
    new Phone(
        ddd: 64,
        number: 981701406,
    )
);
*/

// EXAMPLE 5 - with builder

$user = (new UserBuilder)
    ->addBasicInfo(
        firstName: 'Regis',
        lastName: 'Amaral',
        email: 'amaral.regis@gmail.com',
        age: 37,
        role: Role::F,
        active: true
    )
    ->addAddress(
        street: 'Rua x',
        city: 'City X',
        state: 'State X',
        postalCode: 89086000,
        country: 'BR'
    )
    ->addPhone(
        ddd: 55,
        number: 984457560,
    )
    ->build();