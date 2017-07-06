<?php
class AreAccountPagesUpCest
{
    public function _before(AcceptanceTester $I)
    {
        $user = 'xto.jason';
        $pass = 'JustJoshing';
        $I->login($user, $pass);
        $I->resizeWindow(1500,1000);
		$I->amOnPage('/sitemap');
    }

    public function _after(AcceptanceTester $I)
    {
    }
	    public function _failed(AcceptanceTester $I)
    {
        $I->wait(5);
    }

    // tests
    public function AccountInfoPagesUp(AcceptanceTester $I)
    {	// gets it from header
        $I->click('Dashboard', '//*[@id="controller_sitemap"]/div[2]');
        $I->canSee('321 Fake Lane Tampa, FL 33618');
      	$I->moveback();
        $I->click('Edit Profile', '//*[@id="controller_sitemap"]/div[2]');
        $I->canSee('MY PROFILE SETTINGS');
        $I->moveback();
        $I->click('Tickets', '//*[@id="controller_sitemap"]/div[2]');
        $I->canSee('Please fill out the form below to send your questions or concerns to our customer support specialists.');
    }
    
    public function MyServicesPagesUp(AcceptanceTester $I)
    {	//gets things from sitemap
        $I->click('Domains', '//*[@id="controller_sitemap"]/div[2]/div[2]/div/ul/div[2]/ul');
        $I->wait(2);
        $I->canSeeInCurrentUrl('/my/domains');
		$I->cantSee('404');
        $I->canSeeOptionIsSelected('//*[@id="controller_accountservices"]/div[2]/form/div/ul[1]/li/div/select','Domain');
        //leads to 404?
        $I->moveback();
        $I->click('Transfers', '//*[@id="controller_sitemap"]/div[2]/div[2]/div/ul/div[2]/ul');
        $I->wait(2);
        $I->canSeeInCurrentUrl('/my/transfers');
		$I->cantSee('404');
        $I->canSeeOptionIsSelected('//*[@id="controller_accountservices"]/div[2]/form/div/ul[1]/li/div/select','Transfers');
        //leads to 404?
        $I->moveback();
        $I->click('Directnic Hosting', '//*[@id="controller_sitemap"]/div[2]/div[2]/div/ul/div[2]/ul');
        $I->wait(2);
        $I->seeInCurrentUrl('/my/services');
		$I->cantSee('404');
        $I->canSeeOptionIsSelected('//*[@id="controller_accountservices"]/div[2]/form/div/ul[1]/li/div/select','Hosting');
        //see in field hosting OK
        $I->moveback();
        $I->click('SSL Certificates', '//*[@id="controller_sitemap"]/div[2]/div[2]/div/ul/div[2]/ul');
        $I->wait(2);
        $I->seeInCurrentUrl('/my/services');
		$I->cantSee('404');
        $I->canSeeOptionIsSelected('//*[@id="controller_accountservices"]/div[2]/form/div/ul[1]/li/div/select','SSL Certificates');
        //currently loads default services page
        $I->moveback();
        $I->click('Directnic Email', '//*[@id="controller_sitemap"]/div[2]/div[2]/div/ul/div[2]/ul');
        $I->wait(2);
        $I->seeInCurrentUrl('/my/services');
		$I->cantSee('404');
        $I->canSeeOptionIsSelected('//*[@id="controller_accountservices"]/div[2]/form/div/ul[1]/li/div/select','Email');
        //see in field email OK
        
    }
    
    public function SettingsPagesUp(AcceptanceTester $I)
    {
        $I->click('Communication Preferences', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('COMMUNICATION PREFERENCES');
        $I->moveback();
        
        $I->click('Security Settings', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('CHANGE YOUR PASSWORD');
        $I->moveback();
        
        $I->click('Contact Manager', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('CONTACT MANAGER');
        $I->moveback();
        
        $I->click('Name Server Profiles', '//*[@id="controller_sitemap"]/div[2]');
        $I->see ('NAME SERVER MANAGER');
    }
    
    public function BillingPagesUp(AcceptanceTester $I)
    {
        $I->click('Payment Settings', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('Manage your credit cards and payment settings.');
        
        $I->moveback();
        $I->click('Wire/Check Payments', '//*[@id="controller_sitemap"]/div[2]');
        $I->see("We recommend purchasing at least one month's worth of credits in advance for Auto Renew and hosting");
        
        $I->moveback();
        $I->click('Invoices', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('INVOICES');
        
        $I->moveback();
        $I->click('Directnic Credits', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('Use Directnic Credits and avoid using your credit card for every transaction.');
    }
    
    public function ReportsPagesUp(AcceptanceTester $I)
    {   $I->click('Security Log', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('SECURITY LOG');
        
        $I->moveback();
        $I->click('Communication Log', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('COMMUNICATION LOG');
        
        $I->moveback();
        $I->click('Domain List', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('DOMAIN LIST');
        
        $I->moveback();
        $I->click('Login Map', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('View past account access locations with the login map.');
    }
}
