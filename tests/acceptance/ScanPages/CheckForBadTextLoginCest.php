<?php


class CheckForBadTextLoginCest
{
    public function _before(AcceptanceTester $I)
    {   
        $user = 'xto.jason';
        $pass = 'JustJoshing';
        $I->login($user, $pass);
        $I->resizeWindow(1500,1000);
    }

    public function _after(AcceptanceTester $I)
    {
        $I->wait(3);
    }
    
    public function _failed(AcceptanceTester $I)
    {
        $I->wait(3);
    }
    
    //AccountInfo Dahsboard extras//
    public function AccountInfoPages(AcceptanceTester $I)
    {   
        $I->amOnPage('/my/alerts');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/my');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/my/tickets');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/my/tickets');
        $I->CAPSDotCAPSfailer();
    }
    
    //My Services//
    public function MyServicesPages(AcceptanceTester $I)
    {   
        $I->amOnPage('/my/services');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/my/transfers');
        $I->CAPSDotCAPSfailer();
        $I->comment('this gets a failure from the formatting of nameservers,  check manually for the time being');
        $I->amOnPage('/my/domains');
        $I->CAPSDotCAPSfailer();


    }
    
    //Settings//
    public function SettingsPages(AcceptanceTester $I)
    {   //it fails cause it couldnt find it
        $I->amOnPage('/my/profile/communications');
        $I->CAPSDotCAPSfailer();  
        $I->amOnPage('/my/contacts');
        $I->CAPSDotCAPSfailer();   
        $I->amOnPage('/my/nameservers');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/my/profile/security');
        $I->CAPSDotCAPSfailer();
    }

    //Billing//
    public function BillingPages(AcceptanceTester $I)
    {   
        $I->amOnPage('/my/payments');
        $I->CAPSDotCAPSfailer(); 
        $I->amOnPage('/my/payments/wire');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/my/credits');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/my/invoices');
        $I->CAPSDotCAPSfailer();
    }
    
    //Reports//
    public function ReportsPages(AcceptanceTester $I)
    {   
        $I->amOnPage('/my/hitory');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/my/notifications');
        $I->CAPSDotCAPSfailer();
        $I->amOnPage('/my/history/map');
        $I->CAPSDotCAPSfailer();
        $I->comment('this gets a failure from the formatting of nameservers, check manually for the time being');
        $I->amOnPage('/my/domains/list');
        $I->CAPSDotCAPSfailer();
    }
}
