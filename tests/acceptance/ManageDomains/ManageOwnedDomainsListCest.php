<?php
use \Page\DomainsList as DomainsList;
use \Codeception\Util\Locator as Locator;

class ManageOwnedDomainsListCest
{
    public function _before(AcceptanceTester $I)
    {

        $user = 'xto.jason';
        $pass = 'JustJoshing';
        $I->login($user, $pass);
        $I->amOnPage('/my/domains/list');
        $I->resizeWindow(1500,1000);
    }

    public function _after(AcceptanceTester $I)
    {
        $I->wait(3);
    }
    
    public function _failed(AcceptanceTester $I)
    {
        $I->wait(5);
    }
   // public function intitalSetup(AcceptanceTester $I)
   // {
   //    $I->resizeWindow(1500,1000);  
   // }
    // tests
/**
 * @group search
 */  
    public function SearchByName(AcceptanceTester $I)
    {
        $searchTerm = 'another';
        $resultNumber = '1';
        $I->fillField(DomainsList::$SearchBox , $searchTerm);
        $I->click(DomainsList::$SearchButton);
        $I->waitForJS("return $.active == 0;", 20);
        // change $resultNumber to whatever result you want/*[@id="list_table"]/table[1]/tbody/tr['$resultNumber']/td[1]'
        // here it is 1       
        $resultURL = $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$DomainEnd);
        $I->comment('-----------------------------------------------------------');                                                                   
        $I->comment('The desired URL from that search: '.$resultURL);
        $I->comment('-----------------------------------------------------------');

        /*toggle Sorting Domains alphabetically when that gets fixed
        
        $resultURL = $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$DomainEnd);
        $I->comment('-----------------------------------------------------------');                                                                   
        $I->comment('The desired URL from that search: '.$resultURL);*/
    }
     
/**
 * @group search
 */     
        public function SearchByExpiration(AcceptanceTester $I)
    {   $I->wait(3);
        $searchTerm = '6/19/2018';
        $resultNumber = '1';
        $I->fillField(DomainsList::$ExpirationDateBox , $searchTerm);
        $I->click(DomainsList::$SearchButton);
        $I->waitForJS("return $.active == 0;", 20);
        // change $resultNumber to whatever result you want/*[@id="list_table"]/table[1]/tbody/tr['$resultNumber']/td[1]'
        // here it is 1       
        $resultURL = $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$DomainEnd);
        $I->comment('-----------------------------------------------------------');                                                                   
        $I->comment('The desired URL from that search: '.$resultURL);
        $I->comment('-----------------------------------------------------------');
    }
/**
 * @group search
 */   
    public function SearchByPurchase(AcceptanceTester $I)
    {
        $searchTerm = '6/19/2017';
        $resultNumber = '1';
        $I->fillField(DomainsList::$ExpirationDateBox , $searchTerm);
        $I->click(DomainsList::$SearchButton);
        $I->waitForJS("return $.active == 0;", 20);
        // change $resultNumber to whatever result you want/*[@id="list_table"]/table[1]/tbody/tr['$resultNumber']/td[1]'
        // here it is 1       
        $resultURL = $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$DomainEnd);
        $I->comment('-----------------------------------------------------------');                                                                   
        $I->comment('The desired URL from that search: '.$resultURL);
        $I->comment('-----------------------------------------------------------');
    }
/**
 * @group search
 */  
    public function SearchDomainsListAllInfo(AcceptanceTester $I)
    {
        $searchTerm = 'specific';
        $resultNumber = '2';// second result
        $I->wait(.25);
        $I->DomainsListExpandCategories();
        $I->fillField(DomainsList::$SearchBox, $searchTerm);
        $I->click(DomainsList::$SearchButton);
        $I->waitForJS("return $.active == 0;", 20);
        // change $resultNumber to whatever result you want/*[@id="list_table"]/table[1]/tbody/tr['$resultNumber']/td[1]'
        // here it is 1                                                       vvv
        $resultURL =   $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$DomainEnd);
        $forwarded =    $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$ForwardedEnd);
        $privacy =     $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$PrivacyEnd);
        $autorenew =   $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$AutoRenewEnd);
        $hosting =     $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$HostingEnd);
        $contact =     $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$ContactEnd);
        $nameservers = $I->grabAttributeFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$NameServersEndLong,'data-hint');
        $purchased =   $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$PurchasedEndLong);
        $expires =     $I->grabTextFrom(DomainsList::$TableStart.$resultNumber.DomainsList::$ExpiresEndLong);
        $I->comment('-----------------------------------------------------');
        $I->comment('The desired info from that search: ');
        $I->comment('-----------------------------------------------------');
        $I->comment('Domain: '.$resultURL);
        $I->comment('Forwarded: '.$forwarded);
        $I->comment('Privacy: '.$privacy);
        $I->comment('Autorenew: '.$autorenew);
        $I->comment('Hosting: '.$hosting);
        $I->comment('Contact: '.$contact);
        $I->comment('Name Servers: '.$nameservers);
        $I->comment('Purchased: '.$purchased);
        $I->comment('Expires: '.$expires);
        
        
        
    }
/**
 * @group test-check
 * @group will-fail
 */   
    public function DoesItemsPerPageWork(AcceptanceTester $I)
    {
        //$I->canSee('the6thdomainfortesting.xyz');// these two names are furthest apart alphabetically
        //$I->canSee('anothernamethatcostscheap.xyz');// so they wont be on the same list of 5 domains
        $I->scrollTo(DomainsList::$ItemsPerPage);
        $I->selectOption(DomainsList::$ItemsPerPage, '1000'); //up to 1000 hosted domains
        $resultURL1 = $I->grabTextFrom(DomainsList::$TableStart.'1'.DomainsList::$DomainEnd);
        $resultURL6 = $I->grabTextFrom(DomainsList::$TableStart.'6'.DomainsList::$DomainEnd);
        $I->waitForJS("return $.active == 0;", 60);
        $I->wait(2);
        $I->selectOption(DomainsList::$ItemsPerPage, '5'); //up to 5 hosted domains
        $I->waitForJS("return $.active == 0;", 20);
        $I->wait(2);
        $I->comment('-------------------------------------------');
        $I->See($resultURL1);// these two names are furthest apart alphabetically
        $I->dontSee($resultURL6);// so they wont be on the same list of 5 domains
        $I->comment('-------------------------------------------');
    }
/**
 * @group will-fail
 * @group test-check
 */ 
    public function DoesSortingWork(AcceptanceTester $I)
    {
        $I->wantTo('see how categories change when the sorting method is changed');
        $I->DomainsListExpandCategories($I);
        $I->click(DomainsList::$SearchButton);
        $I->wait(1);
        //3 that are usually there
        $I->comment('-------------------------------------------');
        $I->comment('Verifying that all the columns are present in the table then searching');
        $I->see('Domain' ,'//*[@id="list_table"]');
        $I->see('Purchased' ,'//*[@id="list_table"]');
        $I->see('Expires' ,'//*[@id="list_table"]');
        //ones that you have to add via boxes
        $I->see('Forwarded' ,'//*[@id="list_table"]');
        $I->see('Privacy' ,'//*[@id="list_table"]');
        $I->see('Autorenew' ,'//*[@id="list_table"]');
        $I->see('Hosting' ,'//*[@id="list_table"]');
        $I->see('Contact' ,'//*[@id="list_table"]');
        $I->click(DomainsList::$SearchButton);        
        $I->waitForJS("return $.active == 0;", 20);
        $I->wait(1);
        $I->comment('-------------------------------------------');
        $I->comment('Sort By Domain');
        $I->click(DomainsList::$DomainSortShort);
        $I->waitForJS("return $.active == 0;", 20);
        $I->comment('-------------------------------------------');
        $I->expect('the next 3 tests to pass, and the 5 after to fail');
        try{
        //3 that are usually there
        $I->see('Domain' ,'//*[@id="list_table"]');
        $I->see('Purchased' ,'//*[@id="list_table"]');
        $I->see('Expires' ,'//*[@id="list_table"]');
        //ones that you have to add via boxes
        $I->see('Forwarded' ,'//*[@id="list_table"]');
        $I->see('Privacy' ,'//*[@id="list_table"]');
        $I->see('Autorenew' ,'//*[@id="list_table"]');
        $I->see('Hosting' ,'//*[@id="list_table"]');
        $I->see('Contact' ,'//*[@id="list_table"]');
        }
        catch (Exception $e){
        $I->comment('Ideally they should all still be See-able.');
        \PHPUnit_Framework_Assert::fail();
        }
        
        
        $I->comment('-------------------------------------------');     
    }
/**
 * @group test-check
 */  
    public function PaginationTest(AcceptanceTester $I)
    {
        $searchTerm = 't';
        //initally the nameservers column is displayed 
        $I->seeCheckboxIsChecked(DomainsList::$NameServersButton.'/input');
        $I->seeNumberOfElements('//*[@id="list_table"]/div/div[3]/div[2]/span',5);// pagination boxes at 5 means there aren't other pages
        $I->comment('-------------------------------------------');
        $I->comment('Change the items per page to wipe columns, and then change it back to 5');
        $I->scrollTo(DomainsList::$ItemsPerPage);
        $I->selectOption(DomainsList::$ItemsPerPage, '1000'); //up to 1000 hosted domains per page initally
        $I->waitForJS("return $.active == 0;", 20);
        $I->wait(2);
        $I->scrollTo(DomainsList::$ItemsPerPage);
        $I->selectOption(DomainsList::$ItemsPerPage, '5'); //set to 5 domains per page
        $I->waitForJS("return $.active == 0;", 20);
        $I->wait(2);
        $I->comment('-------------------------------------------');
        //name servers is now unchecked via 
        $I->comment('Confirm the bug of columns being wiped after changing Items Per Page, here we care about nameservers');
        $I->canSeeCheckboxIsChecked(DomainsList::$NameServersButton.'/input');
        $I->comment('The next test failing means pagification isnt working right');
        $I->canSeeNumberOfElements('//*[@id="list_table"]/div/div[3]/div[2]/span',[6,19]); //checks if there are only 5 pagification buttons
        $I->comment('-------------------------------------------');
        

        $I->Comment('Check the nameservers box and make a search to update the table with the nameservers column');
        try{$I->seeCheckboxIsChecked(DomainsList::$NameServersButton.'/input');}
        catch (Exception $e){
           $I->click(DomainsList::$NameServersButton); //check the box if it isnt already
        }
        
        $I->fillField(DomainsList::$SearchBox , $searchTerm);//make a search with 6+ results
        $I->click(DomainsList::$SearchButton); //refresh table columns (and thus pagination) via searching
        $I->waitForJS("return $.active == 0;", 20);
        $I->wait(2);
        
        $I->seeCheckboxIsChecked(DomainsList::$NameServersButton.'/input');       
        $I->seeNumberOfElements('//*[@id="list_table"]/div/div[3]/div[2]/span',[6,19]); //not sure on max # of pagification buttons, assuming
                                                                            // that it goes to 19, yet min needed here is 6, yay scalability
        
    }
}
