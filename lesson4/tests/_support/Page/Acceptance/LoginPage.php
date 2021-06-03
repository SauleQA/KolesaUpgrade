<?php
namespace Page\Acceptance;

/**
 * Страница авторизации
 */
class LoginPage
{
    //--------------CONST------------------
    /**
     * Заблокированный username
     */
    public const BLOCKEDUSERNAME = 'locked_out_user';
    
    /**
     * Стандартный пароль
     */
    public const PASSWORD = 'secret_sauce';

    
    //--------------URL------------------
    /**
     * URL страницы авторизации
     */
    public static $URL = '';

    
    //--------------SELECTORS------------------
    /**
     * Поле ввода логина
     */
    public static $loginInput = '#user-name';

    /**
     * Поле ввода пароля
     */
    public static $passwordInput = '#password';

    /**
     * Кнопка Login
     */
    public static $loginButton = '#login-button';

    /**
     * Блок с ошибкой
     */
    public static $errorBlock = 'h3[data-test="error"]';

    /**
     * Кнопка закрытия блока с ошибкой
     */
    public static $errorBlockCloseButton = '.error-button';

    
    //--------------METHODS------------------

    /**
     * Заполняет поле ввода логина
     */
    public function fillUserName($param)
    {
        $this->acceptanceTester->fillField(self::$loginInput, $param);
        return $this;
    }

    /**
     * Заполняет поле ввода пароль
     */
    public function fillPassword($param)
    {
        $this->acceptanceTester->fillField(self::$passwordInput, $param);
        return $this;
    }

    /**
     * Нажать на кнопку Login
     */
    public function clickLogin()
    {
        $this->acceptanceTester->click(self::$loginButton);
        return $this;
    }

    /**
     * Закрыть блок с ошибкой
     */
    public function closeErrorBlock()
    {
        $this->acceptanceTester->click(self::$errorBlockCloseButton);
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
