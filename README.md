## Sumibi

Validator for Japanese special fields.

### Usage

```php
<?php
use Primestyle\Sumibi\Sumibi;

$validator = new Sumibi();
$data = ['name' => 'ひらがな'];
$rules = ['name' => 'required|kanji'];
$result = $validator->validate($data, $rules);

foreach ($result->getMessagesForKey('name') as $message) {
    echo $message."\n";
}
```
