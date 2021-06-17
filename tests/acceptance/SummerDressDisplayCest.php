<?php

use Page\Acceptance\MainPage;
use Page\Acceptance\SearchPage;

/**
 * Класс для проверки расположения элементов продукта Summer Dress
 */
class SummerDressDisplayCest
{

    /**
     *  Проверка расположения элементов продукта Summer Dress
     */ 
    public function checkSummerDressDisplay(AcceptanceTester $I)
    {
        $mainPage = new MainPage($I);
        $searchPage = new SearchPage($I);

        $I->amOnPage(MainPage::$URL);
        $mainPage->moveMouseOverDresses()
            ->clickSummerDresses();

        $I->waitForElementVisible(SearchPage::$displayTitle);

        $searchPage
            ->isProductsViewAGrid()
            ->clickList()
            ->isProductsViewAList();
    }
}