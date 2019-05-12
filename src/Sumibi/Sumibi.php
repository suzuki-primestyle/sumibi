<?php

namespace Primestyle\Sumibi;

use Primestyle\Sumibi\MessageBag;
use Primestyle\Sumibi\Rulenames;
use Primestyle\Sumibi\Rules\{
    FullNameKatakana,
    Required,
    Kanji,
};
use Primestyle\Sumibi\Utils;

class Sumibi
{
    private $error_dictionary;
    /**
     * hold error messages
     *
     * @var MessageBag
     */
    private $message_bag;

    public function __construct(array $error_dictionary = null, MessageBag $message_bag = null)
    {
        $this->message_bag = $message_bag ?? new MessageBag();
        $this->error_dictionary = $error_dictionary;
    }
    public function validate(array $data, array $rules): MessageBag
    {
        foreach ($data as $key => $value) {
            $messages = $this->validateField($value, $rules[$key]);
            $this->message_bag->addMessagesToKey($key, $messages);
        }
        return $this->message_bag;
    }
    private function validateField($value, $rules_for_field): array
    {
        $messages = [];
        $rules = $this->splitRules($rules_for_field);
        foreach ($rules as $rule) {
            $validator = $this->getValidatorForRule($rule);
            if ($validator->failed($value)) {
                $messages[] = (new Utils())->getMessage($rule, $this->error_dictionary);
            }
        }
        return $messages;
    }
    private function getValidatorForRule($rule)
    {
        switch ($rule) {
            case Rulenames::REQUIRED():
                return new Required();
                break;
            case Rulenames::FULL_NAME_KATAKANA():
                return new FullNameKatakana();
                break;
            case Rulenames::KANJI():
                return new Kanji();
                break;
            default: {
                throw new \Exception("You call undefined rule name '".$rule."'.");
                break;
            }
        }
    }
    private function splitRules(string $rules): array
    {
        return explode('|', $rules);
    }
    public function getMessageBag()
    {
        return $this->getMessageBag;
    }
}
