<?php
namespace Primestyle\Sumibi;

use Symfony\Component\Yaml\Yaml;
use Primestyle\Sumibi\Rulenames;

class Utils {
    private static $messages = null;

    public function getMessage(string $rulename, array $error_dictionary = null){

        if (!self::$messages) {
            $base_messages = Yaml::parse(file_get_contents(__DIR__.'/Lang/en.yml'));
            self::$messages = $error_dictionary ? array_merge($base_messages, $error_dictionary) : $base_messages;
        }
        return self::$messages[$rulename];
    }
}
