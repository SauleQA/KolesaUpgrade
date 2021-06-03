<?php

use Page\Acceptance\MainHabrPage;
use Helper\RandomArray;

/**
 * Класс для тестирования открытич правильной категории
 * @group test
 */
class MenuCest {
    /**
     * Тест проверки открытия правильной страницы и правильным названием из меню
     * @group test
     * @param Example $data
     * @dataprovider getDataForCategory
     */
    public function openCategory(\AcceptanceTester $I, \Codeception\Example $data) {
        $I->amOnPage('');
        $I->click(sprintf(MainHabrPage::$category, $data['pageName']));
        $I->waitForText($data['pageName'], 10, MainHabrPage::$pageHeader);
        $I->seeInCurrentUrl($data['url']);
    }

    protected function getDataForCategory() {
        
        $arr = [
            ['url' => 'top', 'pageName' => 'Все потоки'],
            ['url' => 'develop', 'pageName' => 'Разработка'],
            ['url' => 'admin', 'pageName' => 'Администрирование'],
            ['url' => 'design', 'pageName' => 'Дизайн'],
            ['url' => 'management', 'pageName' => 'Менеджмент'],
            ['url' => 'marketing', 'pageName' => 'Маркетинг'],
            ['url' => 'popsci', 'pageName' => 'Научпоп']
        ];

        return RandomArray::getTwoRandomElements($arr);
    }
}