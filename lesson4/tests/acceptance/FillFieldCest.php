<?php
use Faker\Factory;
use Page\Acceptance\FakerFieldPage;
use Helper\CustomFakerProvider;

/**
 * Класс для тестирования формы
 */
class FillFieldCest {

    /**
     * Тест на заполнение полей с помощью фейкера
     * @group test2
     */
    public function checkFillFields(\AcceptanceTester $I)
    {
        /**
         * Fakers
         */
        $faker = Factory::create('ru_RU');
        $faker->addProvider(new CustomFakerProvider($faker));
        $fakerEn = Factory::create('en_US');

        $name = $faker->name;
        $lastName = $faker->lastName;
        $email = $faker->email;
        $phoneNumber = $faker->phoneNumber;
        $address = $faker->address;
        $city = $faker->city;
        $state = $faker->region;
        $postal = $faker->postcode;

        $cardFirstName = $faker->name;
        $cardSecondName = $faker->lastName;
        $cardNumber = $faker->cardNumber;
        $cardSecurityCode = $faker->randomNumber;
        $cardExpirationMonth = $faker->monthName;
        $cardExpirationYear = $faker->numberBetween($min = 2021, $max = 2030);
        $cardaddress = $faker->address;
        $cardcity = $faker->city;
        $cardstate = $faker->region;
        $cardpostal = $faker->postcode;
        $cardcountry = $fakerEn->country;

        $I->amOnPage('');
        $I->fillField(FakerFieldPage::$firstName, $name);
        $I->fillField(FakerFieldPage::$lastName, $lastName);
        $I->fillField(FakerFieldPage::$email, $email);
        $I->fillField(FakerFieldPage::$phoneNumber, $phoneNumber);
        $I->fillField(FakerFieldPage::$address, $address);
        $I->fillField(FakerFieldPage::$city, $city);
        $I->fillField(FakerFieldPage::$state, $state);
        $I->fillField(FakerFieldPage::$postal, $postal);

        $I->click(FakerFieldPage::$cardPaymentMethod);

        /**
         * card block
         */
        $I->fillField(FakerFieldPage::$cardFirstName, $cardFirstName);
        $I->fillField(FakerFieldPage::$cardSecondName, $cardSecondName);
        $I->fillField(FakerFieldPage::$cardNumber, $cardNumber);
        $I->fillField(FakerFieldPage::$cardSecurityCode, $cardSecurityCode);
        $I->selectOption(FakerFieldPage::$cardExpirationMonth, $cardExpirationMonth);
        $I->selectOption(FakerFieldPage::$cardExpirationYear, $cardExpirationYear);
        $I->fillField(FakerFieldPage::$cardaddress, $cardaddress);
        $I->fillField(FakerFieldPage::$cardcity, $cardcity);
        $I->fillField(FakerFieldPage::$cardstate, $cardstate);
        $I->fillField(FakerFieldPage::$cardpostal, $cardpostal);
        $I->selectOption(FakerFieldPage::$cardcountry, $cardcountry);

        $I->wait(10);

        $I->click(FakerFieldPage::$register);
        $I->waitForText('Good job');
    }

}