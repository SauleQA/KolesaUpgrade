<?php
namespace Page\Acceptance;

class MainHabrPage
{
    // include url of current page
    public static $URL = '';

    /**
     * PageHeader
     */
    public static $pageHeader = ".page-header";

    //--------------SELECTORS------------------
    /**
     * Категории в Меню
     */
    public static $category = "//a[contains(@class,'nav-links__item-link')][contains(text(),'%s')]";
    }
