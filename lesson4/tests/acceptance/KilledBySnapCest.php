<?php

use Faker\Factory;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;
use Page\Acceptance\OwnerPage;

/**
 * Класс для проверки удаления юзеров с canBeKilledBySnap == true
 */
class KilledBySnapCest {

    /**
     * Для генерации оунера
     */
    static $owner = "sauletuss1";

    /**
     * Количество юзеров
     */
    static $usersNumber = 10;

    /**
     * Данные для создания человека 
     * @var array
     */
    protected $data;
    protected $datas = [];

    /**
     * Массив с юзерами после снапа
     */
    protected $usersAfterSnap = [];

    /**
     * Массив с именами всех юзеров
     */
    protected $allUserNames = [];

    /**
     * Массив с именами после снапа
     */
    protected $userNamesAfterSnap = [];

    /**
     * _before
     * Добавить 10 юзеров в бд
     * @param AcceptanceTester $I
     * @return void
     */
    public function _before(AcceptanceTester $I) {

        $faker = Factory::create('ru_RU');

        //сгенерить оунера
        self::$owner = self::$owner.$faker->randomNumber();
        var_dump(self::$owner);


        //Записать в бд 10 юзеров
        for ($i = 1; $i <= self::$usersNumber; $i++)
        {
            $this->datas[$i] = $this->data = [
                "job"=> $faker->company,
                "superhero"=> $faker->boolean(),
                "skill"=> $faker->word,
                "canBeKilledBySnap" => $faker->boolean(),
                "email"=> strtolower($faker->email),
                "name"=> $faker->userName,
                "DOB"=> $faker->date("Y-m-d"),
                "avatar"=> $faker->imageUrl(),
                "owner" => self::$owner,
                "created_at"=> $faker->date("Y-m-d"),
            ];

            $I->haveInCollection('people',  $this->data);  

            //Имена всех юзеров отдельно
            $this->allUserNames[$i] = $this->data["name"];
        }

        //Вытащить всех юзеров с "canBeKilledBySnap" = false и все имена юзеров
        for ($i = 1; $i <= self::$usersNumber; $i++) {
            if ($this->datas[$i]["canBeKilledBySnap"] == false) {
                array_push($this->usersAfterSnap, $I->grabFromCollection('people', array("canBeKilledBySnap" => false, "owner" => self::$owner, "name"=> $this->datas[$i]["name"])));
                array_push($this->userNamesAfterSnap, $this->datas[$i]["name"]);
            }
        }

    }

    /**
     * Проверить удаление по параметру snap
     * @group apitest101
     */

    public function killBySpanCest(\AcceptanceTester $I) {
        $ownerPage = new OwnerPage($I);

        $I->amOnPage('/?owner='.self::$owner);
        $I->waitForElementVisible($ownerPage::$users);

        //Проверить имена на экране
        for ($i = 1; $i <= self::$usersNumber; $i++) {
            assertTrue(in_array($ownerPage->getUserNameByIndex($i), $this->allUserNames));            
        }

        //Проверить количество юзеров на экране в поле Count
        assertEquals($ownerPage->getCount(), 'Count: '.self::$usersNumber);

        //Проверить количество юзеров на экране
        $I->seeNumberOfElements($ownerPage::$users, self::$usersNumber);

        //Проверить количество юзеров в бд
        assertEquals(self::$usersNumber, $I->grabCollectionCount('people', array("owner" => self::$owner)));

        //делаем снап
        $ownerPage->clickSnap();
        $numberOfUsersAfterSnap = count($this->userNamesAfterSnap);
        $I->waitForElementVisible($ownerPage::$users);
        
        //Проверить, что в бд нет юзеров с true в "canBeKilledBySnap" после snap
        assertEquals(0, $I->grabCollectionCount('people', array('canBeKilledBySnap' => true, "owner" => self::$owner)));

        //Проверить новое количество в поле Count после снапа
        $I->waitForText('Count: '.$numberOfUsersAfterSnap, 10, $ownerPage::$count);
        
        //Проверить количество юзеров на экране после снапа
        $I->seeNumberOfElements($ownerPage::$users, $numberOfUsersAfterSnap);
       
        //Проверить имена на экране после снапа
        for ($i = 1; $i <= $numberOfUsersAfterSnap; $i++) {
            assertTrue(in_array($ownerPage->getUserNameByIndex($i), $this->userNamesAfterSnap));            
        }

    }
}
