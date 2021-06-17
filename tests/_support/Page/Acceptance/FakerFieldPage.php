<?php
namespace Page\Acceptance;

/**
 * PO для заполнения формы
 */
class FakerFieldPage
{
    // include url of current page
    public static $URL = '';

    //--------------SELECTORS------------------
    /**
     * Поле имени
     */
    public static $firstName = "//input[@id='firstName']";

    /**
     * Поле фамилия
     */
    public static $lastName = "//input[@id='lastName']";

    /**
     * Поле имейл
     */
    public static $email = "//*[@type='email']";

    /**
     * Поле телефон
     */
    public static $phoneNumber = "//input[@id='phoneNumber']";

    /**
     * Поле address 2 line
     */
    public static $addressLine2 = "//input[@id='addr_line2']";

    /**
     * Поле address
     */
    public static $address = "//input[@id='address']";

    /**
     * Поле город
     */
    public static $city = "//input[@id='city']";

    /**
     * Поле state
     */
    public static $state = "//input[@id='state']";

    /**
     * Поле postal
     */
    public static $postal = "//input[@id='postal']";

    /**
     * Кнопка register
     */
    public static $register = "//button[normalize-space()='Register']";

    /**
     * Оплата картой
     */
    public static $cardPaymentMethod = "[value='credit']";

    /**
     * First name card
     */
    public static $cardFirstName = "//input[@id='input_32_cc_firstName']";

        /**
     * Last name card
     */
    public static $cardSecondName = "//input[@id='input_32_cc_lastName']";

        /**
     * credit card number
     */
    public static $cardNumber= "//input[@id='input_32_cc_number']";

        /**
     * security code
     */
    public static $cardSecurityCode = "//input[@id='input_32_cc_ccv']";

        /**
     * expiration month
     */
    public static $cardExpirationMonth = "//select[@id='input_32_cc_exp_month']";

        /**
     * expiration year
     */
    public static $cardExpirationYear = "//select[@id='input_32_cc_exp_year']";

        /**
     * Поле card address
     */
    public static $cardaddress = "//input[@id='input_32_addr_line1']";

    /**
     * Поле card город
     */
    public static $cardcity = "//input[@id='input_32_city']";

    /**
     * Поле cardstate
     */
    public static $cardstate = "//input[@id='input_32_state']";

    /**
     * Поле card postal
     */
    public static $cardpostal = "//input[@id='input_32_postal']";

        /**
     * Поле card country
     */
    public static $cardcountry = "//select[@id='input_32_country']";


}
