<?php
namespace Page\Acceptance\Store;

/**
 * Мои избранные
 */
class MyWishListPage {

    // include url of current page
    public static $URL = '/index.php?fc=module&module=blockwishlist&controller=mywishlist';

    //--------------SELECTORS------------------
    /**
     * Кнопка Удалить Избранные
     */
    public static $deleteBtn = ".icon-remove";

    /**
     * Количество избранных
     */
    public static $quantiy = "//td[@class='bold align_center']";

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