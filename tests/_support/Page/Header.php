<?php
namespace Page;

class Header
{
    // include url of current page
    public static $URL = '';
    
    
    public static $WelcomeBack = '/html/body/div[2]/header/div[1]/div/div[2]/ul/li[1]/a';
    public static $Logout = '/html/body/div[2]/header/div[1]/div/div[2]/ul/li[2]/a';
    public static $Cart = '//*[@id="cart_button"]';
    public static $SearchBox = '/html/body/div[2]/header/div[2]/div/form/ul/li/input';
    public static $SearchButton = '/html/body/div[2]/header/div[2]/div/form/ul/li/div/input';
    
    public static $SignUp = '/html/body/div[2]/header/div[1]/div/div[2]/ul/li[1]/a';
    public static $Login = '/html/body/div[2]/header/div[1]/div/div[2]/ul/li[2]/a';
    
    
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
    public static function route($param)
    {
        return static::$URL.$param;
    }


}
