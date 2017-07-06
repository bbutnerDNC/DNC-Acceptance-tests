<?php
use \Page\Header as Header;
use \Page\Cart as Cart;
use \Page\DomainsList as DomainsList;
/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    // do not ever remove this line!
    use _generated\AcceptanceTesterActions;
    /**
    * Define custom actions here
    */
    public function login($name, $password)
    {
        $I = $this;
        $I->amOnPage('account/login/');
        try {
            $I->dontSee(', welcome back');
            $I->submitForm('#login_vertical',  ['username' => $name, 'password' => $password]);
            $I->see('MY ACCOUNT: Dashboard');
            }
        catch (Exception $e){
            $I->comment('Login Failed');
            \PHPUnit_Framework_Assert::fail();
            }

        //$I->amOnPage('/');
    }
   /**
    * Define custom actions here
    */
   public function search($searchingterm)
    {
        $I = $this;
        $termLower = strtolower($searchingterm);
        $termNoSpace = str_replace(' ', '', $termLower);
        $I->fillField(Header::$SearchBox, $termNoSpace);
        $I->click(Header::$SearchButton);
        $I->seeInCurrentUrl('search?q='.$termNoSpace);
    }
    
    public function loginEmpty($name, $password) //hasn't failed yet
    {
        $I = $this;
        $I-> login($name, $password);
        $I->amOnPage('/cart');
        try {
            $I->moveMouseOver('#cart_button > a');
            $I->waitForText('VIEW CART');
            $I->seeNumberOfElements('//*[starts-with(@id, "minicart-")]',0);
            $I->comment('It started empty');
            }
        catch (Exception $e){
            $I->comment('It didn\'t start empty');
            $I->click('#deleteAll');
            $I->wait(3);
            }
            $I->reloadPage();
        $I->wait(1);
        $I->waitForJS("return $.active == 0;", 20);
        $I->moveMouseOver('#cart_button > a');
        $I->waitForText('VIEW CART');
        $I->seeNumberOfElements('//*[starts-with(@id, "minicart-")]',0);
        $I->see('Your cart is empty.');
        $I->amOnPage('/');
    }
    
    public function DomainsListExpandCategories()
    {   $I = $this;
        $I->wantTo('check every unchecked category');
        $I->seeCurrentUrlEquals('/my/domains/list');
        try{ $I->see('Nameservers' ,'//*[@id="list_table"]');}
            catch (Exception $e){$I->click(DomainsList::$NameServersButton);}
        try{ $I->see('Purchased' ,'//*[@id="list_table"]');}
            catch (Exception $e){$I->click(DomainsList::$PurchasedButton);}
        try{ $I->see('Expires' ,'//*[@id="list_table"]');}
            catch (Exception $e){$I->click(DomainsList::$ExpiresButton);}
        try{ $I->see('Forwarded' ,'//*[@id="list_table"]');}
            catch (Exception $e){$I->click(DomainsList::$ForwardedButton);}
        try{ $I->see('Privacy' ,'//*[@id="list_table"]');}
            catch (Exception $e){$I->click(DomainsList::$PrivacyButton);}
        try{ $I->see('Autorenew' ,'//*[@id="list_table"]');}
            catch (Exception $e){$I->click(DomainsList::$AutoRenewButton);}
        try{ $I->see('Hosting' ,'//*[@id="list_table"]');}
            catch (Exception $e){$I->click(DomainsList::$HostingButton);}
        try{ $I->see('Contact' ,'//*[@id="list_table"]');}
            catch (Exception $e){$I->click(DomainsList::$ContactsButton);}
    }
    
    public function CAPSDotCAPSFailer()
    {   //done individually for each page and tab
        $I = $this;
        $holder = ('We\'re good');
        //$I->wantTo('Fail a page containing UPPERCASE.WORDS with a period inbetween');
        //look in DOM or somethign for regex
        //grabTextFrom then see if it == null or something ONLY CARES FOR ELEMENTS SO CLOSE
        //grabPageSource seems to be a good lead
        // http://codeception.com/docs/reference/Module#assertRegExp
        //    [A-Z]+\.[A-Z]+
        // http://phptest.club/t/pass-a-regex-to-see-cansee-etc/311
        // ececuteJS with some js script
        $holder = $I->grabPageSource();
        $I->comment('grabbed the source ok');
        try {
            $I->dontSeeMatches('([A-Z]{4,}\.[A-Z]{4,})', $holder); //this one follows the pattern but needs 4 letters on the left side (dodges U.S.A and .CO.UK)
            $I->comment('Pattern not found');
            }
        catch (Exception $e){
            $I->comment('UPPERCASE.WORDS pattern found on page, go find it!');
            \PHPUnit_Framework_Assert::fail();
            }
    }    
        //        //if all esle fails its 26*26 (676) comparisons to check on every page and tab 
    
        public function dontSeeMatches($pattern, $value)
    {
        \PHPUnit_Framework_Assert::assertNotRegExp($pattern, $value);
    }
    
        
}
