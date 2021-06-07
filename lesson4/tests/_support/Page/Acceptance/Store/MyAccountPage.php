<?php
namespace Page\Acceptance\Store;

/**
 * Аккаунт юзера
 */
class MyAccountPage {
    
    // include url of current page
    public static $URL = '/index.php?controller=my-account';

    //--------------SELECTORS------------------
    /**
     * Кнопка Домой
     */
    public static $homeBtn = "a[title='Home']";

    /**
     * My Wishlist
     */
    public static $myWishListBtn = ".lnk_wishlist a";

    /**
     * Logout
     */
    public static $logoutBtn = "a.logout";

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
