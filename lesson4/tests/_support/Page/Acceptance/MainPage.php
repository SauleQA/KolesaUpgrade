<?php
namespace Page\Acceptance;

class MainPage
{
    // include url of current page
    public static $URL = '';

    //--------------SELECTORS------------------
    /**
     * Dresses
     */
    public static $dresses = '//a[@title="Women"]/parent::li/following-sibling::li/a';

    /**
     * Summer Dresses
     */
    public static $summerDresses = '.sfHover [title="Summer Dresses"]';


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
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

}
