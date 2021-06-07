<?php
namespace Step\Acceptance;

use Page\Acceptance\Store\MainPage;
use Page\Acceptance\Store\ProductCardPage;

/**
 * Степ по добавленю продуктов в избранные
*/
class AddToWishList extends \AcceptanceTester
{

    /**
     * Добавить первые 2 продукта в Избранные
     */
    public function addToWishListTwoFirstProducts()
    {
        $I = $this;
        $mainPage = new MainPage($I);
        $productCardPage = new ProductCardPage($I);

        for ($i = 1; $i <= 2; $i++) {
            $mainPage->openProductCardByPosition($i);
            $productCardPage->addToWishList();
    
            $I->waitForText('Added to your wishlist.', 10, ProductCardPage::$notification);
            $I->switchToIFrame(ProductCardPage::$notificationIFrame);
            $I->waitForElementVisible(ProductCardPage::$notificationCloseBtn);
            $I->click(ProductCardPage::$notificationCloseBtn);
            $I->switchToIFrame();
            $I->waitForElementVisible(ProductCardPage::$notificationCloseBtn);
            $I->click(ProductCardPage::$notificationCloseBtn);
        }
    }
}