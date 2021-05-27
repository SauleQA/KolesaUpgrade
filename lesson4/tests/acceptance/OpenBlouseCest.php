<?php

class OpenBlouseCest
{
    // tests
    //Открывается карточку блузки
    public function openBlouseCard(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->moveMouseOver( '#homefeatured > li:nth-child(2) > div > div.left-block > div > a.product_img_link > img' );
        $I->waitForElementVisible('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view');
        $I->click('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view');
        $I->waitForElementVisible('#index > div.fancybox-overlay.fancybox-overlay-fixed > div > div > a');
        $I->switchToIFrame('.fancybox-iframe');
        $I->waitForText('Blouse', 10, '#product > div > div > div.pb-center-column.col-xs-12.col-sm-4 > h1');
    }   
}
