<?php
namespace Helper;

class RandomArray
{
    /**
     * Массив из 2 рандомных элементов данного массива
     */
    public static function getTwoRandomElements(Array $arr) {
        $randIndex = array_rand($arr, 2);
        return [
            $arr[$randIndex[0]],
            $arr[$randIndex[1]]
        ];
    }
}
