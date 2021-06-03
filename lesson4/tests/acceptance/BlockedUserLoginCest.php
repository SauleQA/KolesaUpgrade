<?php

use Page\Acceptance\LoginPage;
/**
 * Класс для проверки авторизации заблокированным юзером
 */
class BlockedUserLoginCest
{
    /**
     *  Проверка закрытия блока с ошибкой при неудачной авторизации
     */ 
    public function closeErrorBlock(AcceptanceTester $I)
    {
        $loginPage = new LoginPage($I);
        
        $I->amOnPage(LoginPage::$URL);
        $loginPage->fillUserName(LoginPage::BLOCKEDUSERNAME)
            ->fillPassword(LoginPage::PASSWORD)
            ->clickLogin();
        $I->waitForElementVisible(LoginPage::$errorBlock);
        $loginPage->closeErrorBlock();
        $I->waitForElementNotVisible(LoginPage::$errorBlock);
    }
}