<?php
//buying domains using DNC credits on the account
use \Page\Header as Header;
use \Page\Cart as Cart;
use \Page\SearchQ as SearchQ;

class TimeToBuyWithCredits_00Cest
{
    public function _before(AcceptanceTester $I)
    {
        $user = 'xto.jason';
        $pass = 'JustJoshing';
        $I->loginEmpty($user, $pass);
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        //there seem to be some search terms that don't play nice with the search page,
        //find one that does and jsut add numbers to the end of it
        $searchterm = ('7thdomaintotest'); //ONLY RE-USE SEARTCHTERMS AFTER ~1 HOUR, OTHERWISE THE CART WONT CHANGE
        $I->amGoingTo('Search for a domain');
        $I->search($searchterm);
        
            //search page
        $I->see("welcome back");
        $queriedDomain = $I->grabTextFrom(SearchQ::$QueriedDomain); //grabs the searchterm with .xyz suffix
        
            //adding things to the cart
        $I->waitForJS("return $.active == 0;", 20); //this one usually takes a long time but succeeds 
        $I->canSee('BUY NOW $0.99'); //will fail if already in cart or not purchasable
        try{
            $I->dontSee('MAKE AN OFFER');
        }
         catch (Exception $e){
            $I->comment('This Domain is already taken');
            \PHPUnit_Framework_Assert::fail();
         }
        $I->click(SearchQ::$LeftButton); //clicks the button below the queried domain
        //$I->waitForText('was added to your cart', 6);
        $I->waitForJS("return $.active == 0;", 20);
        
            //verifying things are in the cart
        $I->moveMouseOver(Header::$Cart);
        $I->waitForText('VIEW CART');//wait using waitfortext ✔
        $I->seeNumberOfElements('//*[starts-with(@id, "minicart-")]',1); //fails if the searchterm was the same as last time
        $I->click(SearchQ::$Checkout);
        
            //Cart page
        $I->SeeCurrentUrlEquals('/cart');
        $I->see("welcome back");
        $I->dontSee('Your cart is empty');
        $I->canSee($queriedDomain);
        
            //reducing price
        $I->see('42.33', Cart::$Total);
        $I->click(Cart::$RemovePrivacy);
        $I->waitForText('Privacy has been removed from domains in your cart.', 6);
            $I->reloadPage();
            $I->waitForJS("return $.active == 0;", 20);
        $I->see('27.33', Cart::$Total);
        $I->wait(3);
        $I->selectOption(Cart::$Row.'1'.Cart::$Term, '1 Year');
        $I->waitForText('Register .XYZ Domain was updated in your cart');
        $I->waitForJS("return $.active == 0;", 20);
        $I->see('0.99', Cart::$Total);
            $I->reloadPage();
            $I->waitForJS("return $.active == 0;", 20);
        $I->see('0.99', Cart::$Total);
        $I->click(Cart::$Checkout);

            //payment
        $I->seeInCurrentUrl('/cart/payment');
        $I->see('0.99',Cart::$Total);
        $I->click('//*[@id="payment_form"]/div[2]/section/div[1]/label');
        $I->see('0',Cart::$Total);
       // $I->click('//*[@id="purchase"]');
        
            //confirmation page
        //$I->seeInCurrentUrl('cart/success/');
        //$I->see('Thank you! Your payment has been accepted.');
    }
}
