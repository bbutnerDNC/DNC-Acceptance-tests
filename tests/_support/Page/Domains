<?php
namespace Page;

class Cart
{
    // include url of current page
    public static $URL = '/cart';

    public static $CouponBox = '//*[@id="controller_cart"]/div/div/div[2]/div[1]/div[2]/div/form/div/input';
    public static $CouponButton = '//*[@id="applyCoupon"]';
    
    public static $Subtotal = '//*[@id="controller_cart"]/div/div/div[2]/div[2]/div/div[2]/div/div[1]/ul/li[1]/div[2]';
    public static $ICANNFees = '//*[@id="controller_cart"]/div/div/div[2]/div[2]/div/div[2]/div/div[1]/ul/li[2]/div[2]';
    public static $Total = '//*[@id="main_cart_total"]';
    public static $Checkout = '//*[@id="checkout_link"]';
    
    public static $ClearCart = '//*[@id="deleteAll"]';
    public static $RemovePrivacy = '//*[@id="deleteAllRow"]/div/form/span/button';
    
    public static $Row = '//*[@id="cart_table"]/tbody/tr[';
    public static $Domain = ']/td[1]/h5';
    public static $PrivacyBox = ']/td[1]/div/form/label';
    public static $Term = ']/td[2]/form/div/select';
    public static $RemoveRow = ']/td[4]/div/div/div[2]/span/a';
    public static $RowSubtotal = ']/td[4]/div/div/div[1]/p[1]/span';
//*[@id="cart_table"]/tbody/tr[1]/td[2]/form/div/select
    
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
