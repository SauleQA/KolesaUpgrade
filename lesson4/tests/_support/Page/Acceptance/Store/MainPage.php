<?php
namespace Page\Acceptance\Store;

use Codeception\Util\Locator;

class MainPage
{
    // include url of current page
    public static $URL = '';

    /**
     * Correct email for login
     */
    public const EMAIL = 'sauletest2019@gmail.com';

    /**
     * Correct password for login
     */
    public const PASSWORD = '12345';

    //--------------SELECTORS------------------
    /**
     * Dresses
     */
    public static $dresses = '//a[@title="Women"]/parent::li/following-sibling::li/a';

    /**
     * Summer Dresses
     */
    public static $summerDresses = '.sfHover [title="Summer Dresses"]';

    /**
     * Карточка товара
     */
    public static $productCards = "#homefeatured .product-image-container";

    /**
     * Быстрый просмотр
     */
    public static $quickViews = "#homefeatured .product-image-container a.quick-view";

    /**
     * iFrame продукта
     */
    public static $productIFrame = ".fancybox-iframe";

    /**
     * Sign in
     */
    public static $loginBtn = ".login";

    /**
     * email sign in
     */
    public static $email = "#email";
    
    /**
     * passwd sign in
     */
    public static $passwd = "#passwd";

    /**
     * submit login
     */
    public static $submitLoginBtn = "#SubmitLogin";

    /**
     * My account
     */
    public static $myAccountBtn = ".account";

     //--------------METHODS------------------
   
    /**
     * Навести мышку на Dresses
     */
    public function moveMouseOverDresses()
    {
        $this->acceptanceTester->moveMouseOver(self::$dresses);
        return $this;
    }

    /**
     * Нажать на кнопку Summer Dresses
     */
    public function clickSummerDresses()
    {
        $this->acceptanceTester->click(self::$summerDresses);
        
        return new SearchPage($this->acceptanceTester);
    }

    /**
     * Открыть карточку продукта
     */
    public function openProductCardByPosition($position)
    {
        $I = $this->acceptanceTester;

        $I->waitForElementVisible(Locator::elementAt(MainPage::$productCards, $position));
        $I->moveMouseOver(Locator::elementAt(MainPage::$productCards, $position));
        $I->waitForElementVisible(Locator::elementAt(self::$quickViews, $position));
        $I->click(Locator::elementAt(self::$quickViews, $position));
        $I->switchToIFrame(self::$productIFrame);

        return new ProductCardPage($I);
    }

    /**
     * Залогиниться
     */
    public function login($email, $passwd)
    {
        $I = $this->acceptanceTester;

        $I->click(self::$loginBtn);
        $I->fillField(self::$email, $email);
        $I->fillField(self::$passwd, $passwd);
        $I->click(self::$submitLoginBtn);

        return new MyAccountPage($I);
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
