<?php
namespace Helper;

use Faker\Provider\Base;

class CustomFakerProvider extends Base {
    protected $cardNumbers = [
        '1234567890123456',
        '1234567890123457',
        '1234567890123458'
    ];

    /**Возвращает карту */
    public function cardNumber() {
        return sprintf($this->cardNumbers[array_rand($this->cardNumbers)]);
    }
}
