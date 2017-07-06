<?php


class CheckForBadTextCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }
    
    //HomePages//
    public function HomePages(AcceptanceTester $I)
    {   
        $I->amOnPage('/account/login');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/account/signup');
        $I->CAPSDotCAPSfailer();
    }
    
    //Domains//
    public function DomainsPages(AcceptanceTester $I)
    {   
        $I->amOnPage('/search');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/transfer');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/pricing');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/eoi');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/whois');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/search/bulk');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/easyrenew');
        $I->CAPSDotCAPSfailer();


    }
    
    //All Products//
    public function AllProductsPages(AcceptanceTester $I)
    {   //it fails cause it couldnt find it
        $I->amOnPage('/hosting');
        $I->CAPSDotCAPSfailer();  
        $I->amOnPage('/email');
        $I->CAPSDotCAPSfailer();   
        $I->amOnPage('/ssl');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/page/privacy');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/hosting/sitelock');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/dns');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/page/merchant');
        $I->CAPSDotCAPSfailer();
    }
    //Help&Support//
    public function HelpAndSupportPages(AcceptanceTester $I)
    {   
        $I->amOnPage('/knowledge');
        $I->CAPSDotCAPSfailer(); 
        $I->amOnPage('/help');
        $I->CAPSDotCAPSfailer();
    }
    
    //About Directnic//
    public function AboutDirectnicPages(AcceptanceTester $I)
    {   
        $I->amOnPage('/page/company-info');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/contact');
        $I->CAPSDotCAPSfailer();  
    }
    
    //legal//
    public function LegalPages(AcceptanceTester $I)
    {   
        $I->amOnPage('/terms');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/terms/doc/UDRP.policy');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/terms/doc/privacy.policy');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/terms/doc/opensrs.policy');
        $I->CAPSDotCAPSfailer();
    }
    
    //misc
    public function MiscPages(AcceptanceTester $I)
    {   
        $I->amOnPage('/careers');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/sitemap');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/easyrenew');
        $I->CAPSDotCAPSfailer();
        
    }
    
}
