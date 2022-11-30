<?php

namespace App\Tasks;

/**
 * Второе задание
 */
class SecondTask
{
    /**
     * Метод считает сумму двух больших чисел столбиком
     *
     * @param string $firstNumber
     * @param string $secondNumber
     *
     * @return string
     */
    public function makeSumTwoBigNumbers(string $firstNumber, string $secondNumber): string
    {
        $maxLength = strlen(max($firstNumber, $secondNumber)); // Длина самого большого числа

        $temp     = 0; // Временная переменная
        $totalSum = ''; // итоговая сумма двух чисел в виде строки

        // Уравниваем длины чисел в строках , путем добавления 0
        $firstNumber  = str_pad($firstNumber, $maxLength, '0', STR_PAD_LEFT);
        $secondNumber = str_pad($secondNumber, $maxLength, '0', STR_PAD_LEFT);

        // реализация сложения столбиком
        for ($i = $maxLength - 1; $i >= 0; $i--) {
            //
            $sum  = (int)$firstNumber[$i] + (int)$secondNumber[$i] + $temp; // К сумме добавляем 1 если сумма прошлых двух чисел была >= 10
            $temp = 0;

            if ($sum >= 10) {
                $sum  = $sum % 10;
                $temp = 1;
            }
            $totalSum = $sum . $totalSum; // добавляем сумму чисел к итоговому результату
        }

        return $totalSum;
    }
}
