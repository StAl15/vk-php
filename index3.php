<?php

// Доработайте код из test_task_2.php так, чтобы он мог выполняться на сайте с возможностью выбора языка отображения
// Для простоты считаем, что имя животного может быть на любом языке, при этом порода собаки только на выбранном языке
// Пример псевдо-кода такого сайта: 

//------можно было бы просто в json запихать транслейт как в i18n но это для слабых, не хардкорно-------//

require_once('./index2.php');

class ConfigReader {
  public const LOCALE_RU = 'ru';
  public const LOCALE_EN = 'en';
}

class Controller {
  // тут нужно дописать код
  private string $locale;

  public function __construct(string $locale = ConfigReader::LOCALE_RU) {
    $this->locale = $locale;
  }

  public function getLocale(): string {
    return $this->locale;
  }

  public function setLocale(string $locale) {
    $this->locale = $locale;
  }

  public function getSays() {
    $variants = [
        "ru" => "говорит",
        "en" => "says",
    ];
    return $variants[$this->locale] ?? $variants[0];
  }

  public function index() {
    $rex = new Labrador('Rex');
    $murka = new Cat('Мурка');

    $this->showLine($rex);
    $this->showLine($murka);
  }

  public function showLine(Animal $animal) {
    // тут нужно написать код
    $animal->setLocale($this->locale);
    echo $animal->getBreed() . " " . $animal->getName() . " " . $this->getSays() . " " . $animal->makeSound() . "\n";
  }
}

$controller = new Controller(ConfigReader::LOCALE_RU);
$controller->index();
$controller_en = new Controller(ConfigReader::LOCALE_EN);
$controller_en->index();

// Ожидаемый результат работы программы
// Лабрадор Rex говорит Гав
// Кошка Мурка говорит Мяу
// Labrador Rex says Woof
// Cat Мурка says Meow