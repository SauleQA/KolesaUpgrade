<?php

class FindPrintedDressCest
{
    // tests
    public function findPrintedDress(FunctionalTester $I)
    {
        $searchFieldCss = '#search_query_top';
        $searchButtonCss = '#searchbox button';
        $productsCss = '.product-container';
    
        $searchFieldXPath = '//*[@id="search_query_top"]';
        $searchButtonXPath = '//*[@id="searchbox"]/button';
        $productsXPath = '//*[@class="product-container"]';

        $I->amOnPage('');
        $I->seeElement('#search_query_top');
        $I->fillField('#search_query_top', 'Printed dress');
        $I->click('#searchbox > button');
        $I->seeNumberOfElements('.product-container', 4);
    }
}
