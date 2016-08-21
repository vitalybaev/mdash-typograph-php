PHP версия Типографа Муравьева
===============

Данный репозиторий содержит PSR-4 совместимый пакет Composer, созданный на основе кода [Типографа Муравьева](http://mdash.ru/)

Evgeny Muravjev Typograph, http://mdash.ru Authors: Evgeny Muravjev & Alexander Drutsa

EMT - Evgeny Muravjev Typograph

### Установка

Для установки с помощью Composer, выполните команду:

```
composer require emuravjev/mdash
```

### Использование

```php
$typograph = new \Emuravjev\Mdash\Typograph();
$typograph->set_text('Текст "к которому" применить - типограф.');

// типографируем
$result = $typograph->apply();

// выводим результат
echo $result;
```

### Лицензия

```
Public Domain
Типограф Муравьева является общественным достоянием.
```

### Roadmap
* Добавить тесты
