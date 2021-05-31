<?php
namespace Page\Acceptance;

class SearchPage
{
    // include url of current page
    public static $URL = '/index.php?id_category=11&controller=category';


    //--------------SELECTORS------------------

    /**
     * Display title
     */

     public static $displayTitle = '.display-title';
    /**
     * Grid display view when it is selected   
     */
    public static $selectedGrid = '#grid.selected';

    /**
     * List display view    
     */
    public static $list = '#list';

    /**
     * List display view when it is selected    
     */
    public static $selectedList = '#list.selected';

    /**
     * Products view in grid    
     */
    public static $productRowGrid = '.product_list.row.grid';

    /**
     * Products view in list   
     */
    public static $productRowList = '.product_list.row.list';



    //--------------METHODS------------------

    /**
     * Нажать на кнопку List
     */
    public function clickList()
    {
        $this->acceptanceTester->click(self::$list);
        return $this;
    }


    /**
     * Проверить, что отображается в виде grid
     */
    public function isProductsViewAGrid()
    {
        $this->acceptanceTester->seeElement(self::$selectedGrid);
        $this->acceptanceTester->dontSeeElement(self::$selectedList);
        $this->acceptanceTester->seeElement(self::$productRowGrid);
        $this->acceptanceTester->dontSeeElement(self::$productRowList);

        return $this;
    }

    /**
     * Проверить, что отображается в виде list
     */
    public function isProductsViewAList()
    {
        $this->acceptanceTester->seeElement(self::$selectedList);
        $this->acceptanceTester->dontSeeElement(self::$selectedGrid);
        $this->acceptanceTester->seeElement(self::$productRowList);
        $this->acceptanceTester->dontSeeElement(self::$productRowGrid);

        return $this;
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
