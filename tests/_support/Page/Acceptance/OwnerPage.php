<?php
namespace Page\Acceptance;

use Codeception\Util\Locator;

class OwnerPage
{        
    //--------------URL------------------
    /**
     * URL страницы авторизации
     */
    public static $URL = '';

    
    //--------------SELECTORS------------------
    /**
     * Все юзеры
     */
    public static $users = '.users li';

    /**
     * Все username
     */
    public static $userNames = '.users li b';

    /**
     * Все jobs
     */
    public static $userJobs = '.users li p';


    /**
     * Кнопка snap
     */
    public static $snapBtn = '#snap';

    /**
     * Count
     */
    public static $count = '.hello span';

    
    //--------------METHODS------------------

    /**
     * Нажать на кнопку snap
     */
    public function clickSnap()
    {
        $this->acceptanceTester->click(self::$snapBtn);
        return $this;
    }

    /**
     * Получить значение count
     */
    public function getCount()
    {
        return $this->acceptanceTester->grabTextFrom(self::$count);
    }

    /**
     * Получить значение userName по индексу
     */
    public function getUserNameByIndex($id)
    {
        return $this->acceptanceTester->grabTextFrom(Locator::elementAt(self::$userNames, $id));
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
