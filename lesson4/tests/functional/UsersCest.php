<?php

use Codeception\Example;
use Faker\Factory;

use function PHPUnit\Framework\assertEquals;

/**
 * Класс для работы с юзером
 */
class UsersCest {
    /**
     * Тест на создание юзера
     * @group apitest1
     */

    static $owner = "sauletuss1";
    static $user_id = "";

    protected function createUser(\FunctionalTester $I)
    {
        $faker = Factory::create('ru_RU');
        $userData = [
            "email"     => $faker->email,
            "name"      => $faker->userName,
            "owner"     => self::$owner,
            "job"       => $faker->company,
        ];

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('human',  $userData);
        $I->seeResponseCodeIsSuccessful();

        self::$user_id = $I->grabDataFromResponseByJsonPath('$._id')[0];
    }

    public function _after(\FunctionalTester $I)
    {
        $I->sendDelete('human?_id='.self::$user_id);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(['deletedCount' => '1']);
        $I->sendGet('people', ['owner' => self::$owner]);
        $I->seeResponse([]);
    }

    public function checkUserCreate(\FunctionalTester $I) {
        $faker = Factory::create('ru_RU');

        $defaultSchema = [
            "job"       => "string",
            "superhero" => "boolean",
            "_id"       => "string",
            "email"     => "string",
            "name"      => "string",
            "owner"     => "string"
        ];

        $userData = [
            "email"     => $faker->email,
            "name"      => $faker->userName,
            "owner"     => self::$owner,
            "job"       => $faker->company,
        ];

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('human',  $userData);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(['status' => 'ok']);
        $I->sendGet('people', $userData);
        $I->seeResponseMatchesJsonType($defaultSchema);
    }

/**
 * @before createUser
 * Проверка метода PUT
 * @group apitest3
 */
    public function checkUserUpdate(\FunctionalTester $I) {
        $faker = Factory::create('ru_RU');
        $user_id = self::$user_id;

        $userData = [
            '_id' => self::$user_id,
            "email"     => $faker->email,
        ];

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPut("human?_id=$user_id", $userData);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(['nModified' => 1]);
        
        $I->sendGet('people', ['owner' => self::$owner]);

        $newEmail = $I->grabDataFromResponseByJsonPath('0.email')[0];
        assertEquals($newEmail, $userData);
    }



    /**
     * Тест на обязательность имейл
     * @group apitest2
     * @param Example $data
     * @dataprovider getDataForCreateUser
     */
    public function checkUseCreateNegative(\FunctionalTester $I, Example $data) {
        $faker = Factory::create('ru_RU');

        $email = $faker->email;
        $owner = self::$owner;

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('human',
            [
                'email' => $data['email'] ? $email : null,
                "owner" => $data['owner'] ? $owner : null
            ]
        );
        $I->seeResponseContainsJson($data['errorText']);
    }

    /**
     * Данные для теста
     */
    protected function getDataForCreateUser() {
        
        return [
            [
                'email' => true,
                'owner' => false,
                'errorText' => [
                    'status' => false,
                    'message'=> 'Что-то пошло не так, проверьте поля: email, name, owner. p.s. учимся на своих ошибках'
                ]
            ],
            [
                'email' => false,
                'owner' => true,
                'errorText' => [
                    'status' => false,
                    'message'=> 'email не передан'
                ]
            ]
        ];
    }
}