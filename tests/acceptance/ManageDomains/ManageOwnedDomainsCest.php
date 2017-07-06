<?php
use \Page\Domains as Domains;
use \Page\Header as Header;

class ManageOwnedDomainsCest
{
    public function _before(AcceptanceTester $I)
    { 
        $user = 'xto.jason';
        $pass = 'JustJoshing';
        $I->login($user, $pass);
        $I->amOnPage('/my/domains');

    }

    public function _after(AcceptanceTester $I)
    {
        $I->wait(3);
    }
    
    public function _failed(AcceptanceTester $I)
    {
        $I->wait(5);
    }

    // tests
/**
 * @group print-check
 */  
        public function PrintAutoRenew(AcceptanceTester $I)
    {
        $I->resizeWindow(1500,1000);
        $resultNum= '1'; 
        $urlToCheck = 'domain';
        $I->fillField(Domains::$SearchBox , $urlToCheck);
        $I->click(Domains::$SearchButton);
        $I->waitForJS("return $.active == 0;", 20);
        $I->see($urlToCheck, Domains::$TableStart.$resultNum.Domains::$UrlEnd);
        $resultURL = $I->grabTextFrom(Domains::$TableStart.$resultNum.Domains::$UrlEnd);
        $autoRenew = $I->grabTextFrom(Domains::$TableStart.$resultNum.Domains::$AutoRenewEnd);
        
        $I->comment('---------------------------');
        $I->comment('Auto-renew for '.$resultURL.' is currently '.$autoRenew);
        $I->comment('---------------------------');
        
    }
/**
 * @group test-check
 */      
    
        public function PaginationTest(AcceptanceTester $I)
    {
        $I->resizeWindow(1500,1000);
        $searchTerm = 't';
        $I->comment('---------------------------');
        $I->comment('Set Items Per Page to 1000 and see how many pagification boxes there are.');
        $I->scrollTo(Domains::$ItemsPerPage);
        $I->selectOption(Domains::$ItemsPerPage, '1000'); //up to 1000 hosted domains per page
        $I->waitForJS("return $.active == 0;", 20);
        $I->wait(2);
        //unless an account has >1000 domains there should be 5 buttons
        $I->scrollTo(Domains::$ItemsPerPage);
        $I->seeNumberOfElements('//*[@id="services_table"]/div/div[3]/div[2]/span',5); //checks that there are only 5 pagification buttons
        $I->comment('---------------------------');
        $I->comment('Set Items Per Page to 5, search, and see how many pagification boxes there are.');
        $I->selectOption(Domains::$ItemsPerPage, '5'); //up to 1000 hosted domains per page
        $I->fillField(Domains::$SearchBox , $searchTerm);//make a search with 6+ results
        $I->click(Domains::$SearchButton); //refresh table columns (and thus pagination) via searching
        //look for page 2
        $I->waitForJS("return $.active == 0;", 20);
        $I->wait(1);
        $I->seeNumberOfElements('//*[@id="services_table"]/div/div[3]/div[2]/span',[6,19]); //not sure on max # of pagification buttons, assuming
        $I->comment('---------------------------');                 // that it goes to 19, yet min needed here is 6, yay scalability
        
    }    
    
    public function TurnOffAutoRenewAll(AcceptanceTester $I)
    {
        $I->resizeWindow(1500,1000);  
        $I->scrollTo(Domains::$ItemsPerPage);
        $I->selectOption(Domains::$ItemsPerPage, '1000'); //up to 1000 hosted domains
        $I->waitForJS("return $.active == 0;", 20);
        $I->wait(3);
        $I->seeElementInDOM(Domains::$CheckAll);// normally this box is 'hidden'. It disappears on smaller width dispolays
        $I->click(Domains::$CheckAll);
        $I->selectOption(Domains::$BulkUpdate, 'Update Auto-Renew'); //bulk update
        $I->wait(.25);
        $I->dontSee('No items selected');
        //modal box below
        $I->waitForText('Update the selected domains with the following auto renew information.');
        $I->click(Domains::$AutoRenewSlider);// defaults to On, we click it off

        
        $I->dontSeeCheckboxIsChecked(Domains::$AutoRenewSliderStatus); // the off part
        $I->selectOption(Domains::$AutoRenewPayment, 'Directnic Credits');
        $I->click(Domains::$AutoRenewButton);
        try {
             $I->waitForText('Autorenew Updated',4);
            }
        catch (Exception $e)
            {
            $I->comment('It failed, but why?');
            $I->canSee('Please add a primary credit card under Billing / Payment Settings before renewing with Credits.');
            $I->canSeeInCurrentUrl('/my/domains');
            }
            
    }
/**
 * @group security
 */     
    public function TurnOffSecurityAll(AcceptanceTester $I)
    {
        $I->resizeWindow(1500,1000);  
        $I->scrollTo(Domains::$ItemsPerPage);
        $I->selectOption(Domains::$ItemsPerPage, '1000'); //up to 1000 hosted domains
        $I->waitForJS("return $.active == 0;", 20);
        $I->wait(3);
        $I->seeElementInDOM(Domains::$CheckAll);// normally this box is 'hidden'. It disappears on smaller width dispolays
        $I->click(Domains::$CheckAll);
        $I->selectOption(Domains::$BulkUpdate, 'Update Security Settings'); //bulk update
        $I->wait(.25);
        $I->dontSee('No items selected');
        //modal box below
        $I->waitForText('Update the selected domains with the following security.');
        $I->click(Domains::$SecuritySlider);// defaults to On, we click it off
            
        $I->dontSeeCheckboxIsChecked(Domains::$SecuritySliderStatus); // the off part
        $I->click(Domains::$SecurityButton);
        try {
             $I->waitForText('We have queued up your domains for the security setting update. This may take some time.',2);
            }
        catch (Exception $e)
            {
            $I->comment('It failed, but why?');
            $I->canSeeInCurrentUrl('/my/domains');
            }
    }      
    public function TurnOnSecurityAll(AcceptanceTester $I)
    {
        $I->resizeWindow(1500,1000);  
        $I->scrollTo(Domains::$ItemsPerPage);
        $I->selectOption(Domains::$ItemsPerPage, '1000'); //up to 1000 hosted domains
        $I->waitForJS("return $.active == 0;", 20);
        $I->wait(3);
        $I->seeElementInDOM(Domains::$CheckAll);// normally this box is 'hidden'. It disappears on smaller width dispolays
        $I->click(Domains::$CheckAll);
        $I->selectOption(Domains::$BulkUpdate, 'Update Security Settings'); //bulk update
        $I->wait(.25);
        $I->dontSee('No items selected');
        //modal box below
        $I->waitForText('Update the selected domains with the following security.');
            
        $I->seeCheckboxIsChecked(Domains::$SecuritySliderStatus); // the off part
        $I->click(Domains::$SecurityButton);
        try {
             $I->waitForText('We have queued up your domains for the security setting update. This may take some time.',2);
            }
        catch (Exception $e)
            {
            $I->comment('It failed, but why?');
            $I->canSeeInCurrentUrl('/my/domains');
            }
            
    }
    public function FilterByAll(AcceptanceTester $I)
    {
    
        $I->resizeWindow(1500,1000);
        //seeing how vars can be used
        $resultNum= '1';
        $urlToCheck = 'dirt';
        $I->selectOption (Domains::$ExtensionFilter, '.xyz');
        $I->selectOption (Domains::$ExpiresInFilter, '181-360');
        $I->selectOption (Domains::$SecurityFilter, 'locked');
        $I->selectOption (Domains::$PrivacyFilter, 'Disabled');
        $I->selectOption (Domains::$StatusFilter, 'DNR');
        $I->fillField(Domains::$SearchBox , $urlToCheck);
        $I->click(Domains::$SearchButton);
        $I->waitForJS("return $.active == 0;", 20);
        //$resultURL = $I->grabTextFrom('//*[@id="services_table"]/table[1]/tbody/tr/td[2]/a');
        //$I->comment('The resulting URL from that search');
       // $I->comment($resultURL);/// to see what is actually there
        $I->see($urlToCheck, Domains::$TableStart. $resultNum .Domains::$UrlEnd);
        $resultURL = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$UrlEnd);
        $autoRenew = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$AutoRenewEnd);
        $status = $I->grabAttributeFrom(Domains::$TableStart. $resultNum .Domains::$StatusEnd,'data-hint');
        $security = $I->grabAttributeFrom(Domains::$TableStart. $resultNum .Domains::$SecurityEnd,'data-hint');
        $privacy = $I->grabAttributeFrom(Domains::$TableStart. $resultNum .Domains::$PrivacyEnd,'data-hint');
        $purchased = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$PurchasedEnd);
        $expires = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$ExpiresEnd);
        $nameServers = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$NameServersEnd);
        $details = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$DetailsEnd);
        
        
        $I->comment('---------------------------');
        $I->comment('The result URL: '.$resultURL);
        $I->comment('Auto-renew is currently '.$autoRenew);
        $I->comment('Status: '.$status);
        $I->comment('Security: '.$security);
        $I->comment($privacy);
        $I->comment('Purchased: '.$purchased);
        $I->comment('Expires: '.$expires);
        $I->comment('Name Servers: '.$nameServers);
        $I->comment($details);
        $I->comment('---------------------------');
    }
/*
    public function PrintAllOfOne(AcceptanceTester $I)
    {
        $I->resizeWindow(1500,1000);
        //seeing how vars can be used
        $resultNum= '1';
        $urlToCheck = '.xyz';
        $I->fillField(Domains::$SearchBox , $urlToCheck);
        $I->click(Domains::$SearchButton);
        $I->waitForJS("return $.active == 0;", 20);
        //$resultURL = $I->grabTextFrom('//*[@id="services_table"]/table[1]/tbody/tr/td[2]/a');
        //$I->comment('The resulting URL from that search');
       // $I->comment($resultURL);/// to see what is actually there
        $I->see($urlToCheck, Domains::$TableStart. $resultNum .Domains::$UrlEnd);
        $resultURL = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$UrlEnd);
        $autoRenew = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$AutoRenewEnd);
        $status = $I->grabAttributeFrom(Domains::$TableStart. $resultNum .Domains::$StatusEnd,'data-hint');
        $security = $I->grabAttributeFrom(Domains::$TableStart. $resultNum .Domains::$SecurityEnd,'data-hint');
        $privacy = $I->grabAttributeFrom(Domains::$TableStart. $resultNum .Domains::$PrivacyEnd,'data-hint');
        $purchased = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$PurchasedEnd);
        $expires = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$ExpiresEnd);
        $nameServers = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$NameServersEnd);
        $details = $I->grabTextFrom(Domains::$TableStart. $resultNum .Domains::$DetailsEnd);
        
        
        $I->comment('---------------------------');
        $I->comment('The result URL: '.$resultURL);
        $I->comment('Auto-renew is currently '.$autoRenew);
        $I->comment('Status: '.$status);
        $I->comment('Security: '.$security);
        $I->comment($privacy);
        $I->comment('Purchased: '.$purchased);
        $I->comment('Expires: '.$expires);
        $I->comment('Name Servers: '.$nameServers);
        $I->comment($details);
        $I->comment('---------------------------');
        
    }
*/

}
