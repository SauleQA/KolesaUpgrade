<?php

class OpenBlouseCest
{
    // tests
    //Открывает карточку блузки
    public function openBlouseCard(AcceptanceTester $I)
    {
        $blouseImgCss = '#homefeatured img[title="Blouse"]';
        $quickViewCss = '#homefeatured a[title="Blouse"] ~ a.quick-view';
        $closeCardCss = 'a.fancybox-close';
        $blouseCardCss = '.fancybox-iframe';
        $blouseNameCss = '#product h1';
    
        $blouseImgXPath = '//*[@id="homefeatured"]//img[@title="Blouse"]';
        $quickViewXPath = '//*[@id="homefeatured"]//a[@title="Blouse"]/following-sibling::a[@class="quick-view"]';
        $closeCardXPath = '//a[@class="fancybox-item fancybox-close"]';
        $blouseCardXPath = '//*[@class="fancybox-iframe"]';
        $blouseNameXPath = '//body[@id="product"]//h1';
    
        $I->amOnPage('');
        $I->moveMouseOver( '#homefeatured > li:nth-child(2) > div > div.left-block > div > a.product_img_link > img' );
        $I->waitForElementVisible('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view');
        $I->click('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view');
        $I->waitForElementVisible('#index > div.fancybox-overlay.fancybox-overlay-fixed > div > div > a');
        $I->switchToIFrame('.fancybox-iframe');
        $I->waitForText('Blouse', 10, '#product > div > div > div.pb-center-column.col-xs-12.col-sm-4 > h1');
    }   
}
