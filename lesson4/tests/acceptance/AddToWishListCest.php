<?php

use Page\Acceptance\Store\MainPage;
use Page\Acceptance\Store\MyAccountPage;
use Page\Acceptance\Store\MyWishListPage;

/**
 * Класс для проверки добавления в wish list товаров
 */
class AddToWishListCest {

    /**
     * Логин перед каждым тестом
     */
    public function _before(\AcceptanceTester $I) {
        $mainPage = new MainPage($I);

        $I->amOnPage(MainPage::$URL);
        $mainPage->login(MainPage::EMAIL, MainPage::PASSWORD);
        $I->click(MyAccountPage::$homeBtn);
    }

    /**
     * Очистка избранных после каждого теста и логаут
     */
    public function _after(\AcceptanceTester $I) {
        $I->amOnPage(MyWishListPage::$URL);
        $I->waitForElementVisible(MyWishListPage::$deleteBtn);
        $I->click(MyWishListPage::$deleteBtn);
        $I->acceptPopup();
        $I->waitForElementClickable(MyAccountPage::$logoutBtn);
        $I->click(MyAccountPage::$logoutBtn);
    }

    /**
     * Тест проверки добавления товар в избранные и проверка их количества
     */
    public function openCategory(\Step\Acceptance\AddToWishList $I) {
        $I->addToWishListTwoFirstProducts();
        $I->waitForElementVisible(MainPage::$myAccountBtn);
        $I->click(MainPage::$myAccountBtn);
        $I->seeInCurrentUrl(MyAccountPage::$URL);
        $I->click(MyAccountPage::$myWishListBtn);
        $I->seeInCurrentUrl(MyWishListPage::$URL);
        $qnty = $I->grabAttributeFrom(MyWishListPage::$quantiy, "outerText");
        printf($qnty);
        $I->assertEquals("2", $qnty, "Проверить что значение в поле количество равно 2");
    }
}