<?php
namespace Page;
use \AcceptanceTester as AT;

class DomainsList
{
    // include url of current page
    public static $URL = 'my/domains/list';
    
    
    public static $SearchBox = '//*[@id="controller_accountdomains"]/div[2]/form/div/ul/li/input';
    public static $SearchButton= '//*[@id="controller_accountdomains"]/div[2]/form/div/div[3]/div/button';
    
    public static $ItemsPerPage = '//*[@id="list_table"]/div/div[3]/div[1]/ul/li/div/select';
    public static $DownloadCSV = '//*[@id="controller_accountdomains"]/div[1]/div/a';
    public static $PurchaseDateBox = '//*[@id="controller_accountdomains"]/div[2]/form/div/div[1]/span/input';
    public static $ExpirationDateBox = '//*[@id="controller_accountdomains"]/div[2]/form/div/div[2]/span/input';
        
    public static $NameServersButton = '//*[@id="controller_accountdomains"]/div[2]/form/div/div[4]/div/ul/li[1]/label';
    public static $PurchasedButton = '//*[@id="controller_accountdomains"]/div[2]/form/div/div[4]/div/ul/li[2]/label';
    public static $ExpiresButton = '//*[@id="controller_accountdomains"]/div[2]/form/div/div[4]/div/ul/li[3]/label';
    public static $ForwardedButton = '//*[@id="controller_accountdomains"]/div[2]/form/div/div[4]/div/ul/li[4]/label';
    public static $PrivacyButton = '//*[@id="controller_accountdomains"]/div[2]/form/div/div[4]/div/ul/li[5]/label';
    public static $AutoRenewButton = '//*[@id="controller_accountdomains"]/div[2]/form/div/div[4]/div/ul/li[6]/label';
    public static $HostingButton = '//*[@id="controller_accountdomains"]/div[2]/form/div/div[4]/div/ul/li[7]/label';
    public static $ContactsButton = '//*[@id="controller_accountdomains"]/div[2]/form/div/div[4]/div/ul/li[8]/label';
    
    public static $DomainSortShort = '//*[@id="list_table"]/table[1]/thead/tr/th[1]/a';
    public static $PurchasedSortShort = '//*[@id="list_table"]/table[1]/thead/tr/th[8]/a';
    public static $ExpiresSortShort = '//*[@id="list_table"]/table[1]/thead/tr/th[9]/a';
    
    public static $TableStart = '//*[@id="list_table"]/table[1]/tbody/tr[';
    public static $DomainEnd = ']/td[1]';
    public static $NameServersEndShort = ']/td[2]/a';
    public static $PurchasedEndShort = ']/td[3]';
    public static $ExpiresEndShort = ']/td[4]';
    
    public static $ForwardedEnd = ']/td[2]';
    public static $PrivacyEnd = ']/td[3]';
    public static $AutoRenewEnd = ']/td[4]';
    public static $HostingEnd = ']/td[5]';
    public static $ContactEnd = ']/td[6]';
    public static $NameServersEndLong = ']/td[7]/a';
    public static $PurchasedEndLong = ']/td[8]';
    public static $ExpiresEndLong = ']/td[9]';
    
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public function __construct(AT $I)
    {
        $this->tester = $I;
    }
    public static function route($param)
    {
        return static::$URL.$param;
    }
    
    /*public function ExpandCategories(AT $I)
    {
        $I->wantTo('check every unchecked category');
        $I->seeCurrentUrlEquals('/my/domains/list');
        try{ $I->see('Nameservers' ,'//*[@id="list_table"]');}
            catch (Exception $e){$I->click(DomainsList::$NameserversButton);}
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
    }*/
}
