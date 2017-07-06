<?php
namespace Page;

class SearchQ
{
    // include url of current page
    public static $URL = '/search?q=';
    
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */
    public static $QueriedDomain = '//*[@id="queried_domain"]';
    public static $DomainAvailable = '//*[@id="result_header"]/h6';
    public static $LeftButton = '//*[@id="domain_add_main"]';
    public static $Checkout = '//*[@id="more_filters_text"]/div[2]/div/a';
    
    
    //usage SearchQ::$PopStart.$number.SearchQ::$PopTextEnd
    //usage SearchQ::$SugStart.$number.SearchQ::$PriceEnd
    public static $PopStart = '//*[@id="table_1"]/div/div[';
    public static $PopTextEnd = ']/div/strong[1]';
    
    public static $SugStart = '//*[@id="new_tlds_available"]/div/div/div[';
    public static $SugTextEnd = ']/div/div';
    
    public static $PremStart = '//*[@id="moreOptions"]/div/div/div[';
    public static $PremTextEnd = ']/div/div';
        
    public static $PriceEnd = ']/div/ul/li/label/a/em';
    public static $BoxEnd = ']/div/ul/li/label/span';
    
    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }


}
