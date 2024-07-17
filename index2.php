<?php

// В этом задании вам нужно исправить ошибки в предоставленном коде. Код имеет несколько логических и синтаксических ошибок, которые необходимо найти и исправить.

//------можно было бы просто в json запихать транслейт как в i18n но это для слабых, не хардкорно-------//

use function PHPSTORM_META\map;

class Animal {
  protected $name;
  protected string $breed;
  protected string $locale;  
  
  public function __construct($name, $breed = "Animal", $locale = "") {
    $this->name = $name;
    $this->breed = $breed;
    $this->locale = $locale;
  }
  public function getName() { return $this->name; }
  public function getBreed() { return $this->breed; }
  public function getLocale() { return $this->locale; }
  public function setLocale($locale_) { $this->locale = $locale_; }
  public function makeSound() {}


}

class Dog extends Animal {

  public function __construct(string $name, string $breed = "Dog",  $locale = "") {
    parent::__construct($name, $breed, $locale);
  }

  public function makeSound(): string {
    $variants =  [
        "en" => "Woof",
        "ru" => "Гав",
    ];
    return $variants[$this->locale] ?? $variants[0];
  }
}

class Labrador extends Dog {
    public function __construct(string $name, string $breed = "Labrador",  $locale = "") {
        parent::__construct($name, $breed, $locale);
      }
      public function getBreed() {
        $variants = [
            "en"=> "Labrador",
            "ru"=> "Лабрадор"
        ];
        return $variants[$this->locale] ?? $variants[0];
      }
}

class Cat extends Animal {
  public function __construct(string $name, string $breed = "Cat",  $locale = "") {
    parent::__construct($name, $breed, $locale);
  }

  public function makeSound(): string {
    $variants =  [
        "en" => "Meow",
        "ru" => "Мяу",
    ];
    return $variants[$this->locale] ?? $variants[0];
  }

  public function getBreed() {
    $variants = [
        "en"=> "Cat",
        "ru"=> "Кошка"
    ];
    return $variants[$this->locale] ?? $variants[0];
  }
}

$rex = new Dog("Rex", "Labrador");
$stooped = new Dog("Stooped");
$murka = new Cat("Murka");

$rex->setLocale("en");
$stooped->setLocale("en");
$murka->setLocale("en");

echo $rex->getBreed() . " " . $rex->getName() . " says " . $rex->makeSound() . "\n";
echo $stooped->getBreed() . " " . $stooped->getName() . " says " . $stooped->makeSound() . "\n";
echo $murka->getBreed() . " " . $murka->getName() . " says " . $murka->makeSound() . "\n";

// Ожидаемый результат работы программы
// Labrador Rex says Woof
// Dog Stooped says Woof
// Cat Murka says Meow
?>