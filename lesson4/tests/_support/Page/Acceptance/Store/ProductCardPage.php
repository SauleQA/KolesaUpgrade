<?php
namespace Page\Acceptance\Store;

use Codeception\Util\Locator;

/**
 * Карточка продукта
 */
class ProductCardPage {
    
    // include url of current page
    public static $URL = '';

    //--------------SELECTORS------------------
    /**
     * Кнопка добавления в избранные
     */
    public static $addToWishListBtn = "#wishlist_button";

    /**
     * Кнопка закрытия карточки продукта
     */
    public static $closeCardBtn = "a.fancybox-close";

    /**
     * Плашка при добавлении в избранные
     */
    public static $notification = "p.fancybox-error";

    /**
     * iFrame плашки
     */
    public static $notificationIFrame = ".fancybox-lock";

    /**
     * кнопка закрыть нотификацию
     */
    public static $notificationCloseBtn = "a.fancybox-close";


    //--------------METHODS------------------
   
    /**
     * Навести мышку на Dresses
     */
    public function addToWishList()
    {
        $I = $this->acceptanceTester;
        $I->click(self::$addToWishListBtn);
        return $this;
    }


    /**
     * @var \AcceptanceTester
     */
    protected $acceptanceTester;

    // we inject AcceptanceTester into our class
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }
}
