<?php

// Исправьте ошибки в приведенном ниже коде. Ваш исправленный код должен корректно выполнять поставленные задачи

/**
* Вычисляет факториал (вы написали здесь логарифм, можно встроенную функцию использовать либо формулу ln(a) / ln(b))
*/
function calculateFactorial($num_) {
  if ($num_ === 0) {
    return 1;
  } else {
    return calculateFactorial($num_ - 1) * $num_;
  }
}

/**
* Проверяет, является ли число простым
 */
function isPrime($num) {
  if ($num <= 1) {
    return false;
  }
  for ($i = 2; $i <= sqrt($num); $i++) {
    if ($num % $i == 0) {
      return false;
    }
  }
  return true;
}

echo "Введите число: ";
$number = readline();
echo $number . "\n";
echo "Факториал is: " . calculateFactorial($number) . "\n";

if (isPrime($number)) {
  echo "$number - это простое число.\n";
} else {
  echo "$number - это не простое число.\n";
}

?>