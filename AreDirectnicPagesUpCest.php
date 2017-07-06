<?php

class AreDirectnicPagesUpCest
{
    public function _before(AcceptanceTester $I)
    {//will be executed at the beginning of each test
    }

    public function _after(AcceptanceTester $I)
    {
		$I->moveback();
		//$I->wait(2);
    }
	    public function _failed(AcceptanceTester $I)
    {
        $I->wait(5);
    }

    ///////////////////
	//DIRECTNIC////////
	///////////////////

	/////front page/////
/**
 * @group batch-1
 * @group batch-2
 * @group batch-3
 */ 
	public function setup(AcceptanceTester $I)
	{
		$I->resizeWindow(1500,1000);
		$I->amOnPage('/sitemap');
	}
/**
 * @group batch-1
 */ 
   public function frontPageUp(AcceptanceTester $I)
   {
		$I->amOnPage('/');	
		$I->see('WE HAVE WHAT YOU NEED');  
   }

	/////home/////
/**
 * @group batch-1
 */ 
   public function MyAccountPageUP(AcceptanceTester $I)
   {
		$I->amOnPage('/sitemap');
		$I->click('My Account', '//*[@id="controller_sitemap"]/div[2]/div[1]');
		$I->see('LOG IN OR CREATE AN ACCOUNT');  
   }
/**
 * @group batch-1
 */ 
	   function CreateAnAccountPageUP(AcceptanceTester $I)
   {
		$I->click('Create an Account', '//*[@id="controller_sitemap"]/div[2]/div[1]');
      $I->see('Choose a Username & Password');  
   }
   
    /////Domains/////
/**
 * @group batch-1
 */
	public function DomainSearchPageUP(AcceptanceTester $I)
   {
		$I->amOnPage('/sitemap');
        $I->click('Domain Search', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('There is a domain for you. Find yours today!');  
   }
/**
 * @group batch-1
 */	
	public function DomainTransferPageUP(AcceptanceTester $I)
   {
        $I->click('Domain Transfer', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('Benefits of Transferring to Directnic:');  
   }
/**
 * @group batch-1
 */
	public function DomainNamePricingPageUP(AcceptanceTester $I)
   {
		$I->click('Domain Name Pricing', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('Check out our competitive domain name registration');  
   }
/**
 * @group batch-1
 */	
    public function NewTldsPageUp(AcceptanceTester $I)
   {
		$I->amOnPage('/sitemap');
		$I->click('New TLDs', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('Browse New TLD Categories');
		$I->waitForJS("return $.active == 0;", 60);
		$I->wait(2);
		$I->click('My Watchlist');
		$I->waitForJS("return $.active == 0;", 60);
		$I->see('Manage your New TLD Watchlist here.');
		$I->click('Pre-Orders');
		$I->waitForJS("return $.active == 0;", 60);
		$I->see('Manage your New TLD Domain orders here.');
		$I->click('New TLD FAQs');
		$I->seeInCurrentUrl('/eoi');
		//$I->see('Find the answers you need to commonly asked questions.');
		//figure out how to get to the new tab
	}
/**
 * @group batch-1
 */	   
    public function WHOISPageUp(AcceptanceTester $I)
    {
        $I->click('WHOIS', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('SEARCH WHOIS RECORDS');
    }
/**
 * @group batch-1
 */	   
    public function BulkDomainRegistrationPageUp(AcceptanceTester $I)
    {
        $I->click('Bulk Domain Registration', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('You can register bulk domain name by entering or pasting a list ');
    }
/**
 * @group batch-1
 */	   
    public function EasyRenewPageUp(AcceptanceTester $I)
    {
        $I->click('Easy Renew', '//*[@id="controller_sitemap"]/div[2]');
        $I->see('No password need here. Just enter the domain you want to renew ');
    }
    
	/////All Products/////
/**
 * @group batch-2
 */
    public function DomainsPageUp(AcceptanceTester $I)
    {
		
        $I->comment('AKA: the search page');
		$I->click('Domains', '//*[@id="controller_sitemap"]/div[2]');;
		$I->see('600+ NEW DOMAINS');
    }
/**
 * @group batch-2
 */	
	public function DirectnicHostingPageUp(AcceptanceTester $I)
	{
		$I->click('Directnic Hosting', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('cPanel base hosting that has everything you need for your website. ');	
	}
/**
 * @group batch-2
 */	
	public function DirectnicEmailPageUp(AcceptanceTester $I)
	{
		$I->click('Directnic Email', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('Show them you mean business with an email address based on your domain.');	
	}
/**
 * @group batch-2
 */	
	public function SSLCertificatesPageUp(AcceptanceTester $I)
	{
		$I->click('SSL Certificates', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('Rest easy knowing your customer data and transaction information is safe.');	
	}
/**
 * @group batch-2
 */	
	public function DirectPrivacyPageUp(AcceptanceTester $I)
	{
		$I->click('Direct Privacy', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('Protection against spam, identity theft and telemarketers all year for the low price');	
	}
/**
 * @group batch-2
 */	
	public function SitelockPageUp(AcceptanceTester $I)
	{
		$I->click('Sitelock', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('Find malware, fix site issues and prevent attacks.');	
	}
/**
 * @group batch-2
 */	
	public function DirectDNSPageUp(AcceptanceTester $I)
	{
		$I->click('Direct DNS', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('Use our name servers to point your domain to your IP address, hosting server');	
	}
/**
 * @group batch-2
 */	
	public function MerchantAccountPageUp(AcceptanceTester $I)
	{
		$I->click('Merchant Account', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('Start accepting credit cards within 24 hours upon approval. Rates starting at');	
	}
	
	//////Help & Support//////
/**
 * @group batch-3
 */
	public function FAQKnowledgebasePageUp(AcceptanceTester $I)
	{
		$I->click('FAQ/Knowledgebase', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('Find the answers you need to commonly asked questions.');	
	}
/**
 * @group batch-3
 */	
	public function LiveChatAndSupprtTicketSystemPageUp(AcceptanceTester $I)
	{
		$I->wait(2);
		$I->waitForJS("return $.active == 0;", 60);
		$I->dontSeeElement('//*[@id="livechat-full"]'); //not visible before
		$I->click('Live Chat', '//*[@id="controller_sitemap"]/div[2]');// link on sitemap
		$I->wait(.5);
		$I->seeElementInDOM('//*[@id="livechat-full"]');
		$I->seeElement('//*[@id="livechat-full"]');
		$I->comment("This means phantomJs has seen the chat window opened, \n
					but since it loads a document I can't see things inside it atm");
		//$I->see('Welcome to our LiveChat! Please fill in the form below before starting the chat.');
			
				
		$I->click('Support Ticket System', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('From an easy-to-use Trouble Ticket System to in-depth FAQs,');
	}
/**
 * @group batch-3
 */		
	//////About Directnic//////
	public function CompanyInfoPageUp(AcceptanceTester $I)
	{
		$I->click('Company Info', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('weekend bbq warriors, Mardi Gras revelers, world travelers and domain name zealots!');	
	}
/**
 * @group batch-3
 */			
	public function ContactDirectnicPageUp(AcceptanceTester $I)
	{
		$I->click('Contact Directnic', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('Want to express that happiness but not sure how?');	
	}
	
	//////Legal//////
/**
 * @group batch-3
 */		
	public function TermsOfServicePageUp(AcceptanceTester $I)
	{
		$I->click('Terms of Service', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('This Agreement ("Agreement") between DNC Holdings Inc., DBA as Directnic');		
	}
/**
 * @group batch-3
 */		
	public function URDPPolicyPageUp(AcceptanceTester $I)
	{
		$I->click('UDRP Policy', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('This Uniform Domain Name Dispute Resolution Policy (the "Policy") ');		
	}
/**
 * @group batch-3
 */		
	public function PrivacyPolicyPageUp(AcceptanceTester $I)
	{
		$I->click('Privacy Policy', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('DNC HOLDINGS INC. PRIVACY POLICY');		
	}
/**
 * @group batch-3
 */		
	public function OldPolicyAndDisclaimerPageUp(AcceptanceTester $I)
	{
		$I->click('Old Policy and Disclaimer (OpenSRS)', '//*[@id="controller_sitemap"]/div[2]');
		$I->see('OPENSRS POLICY');		
	}

	
	//////Social Media//////
}
