<?php

namespace Primestyle\Sumibi;

use Primestyle\Sumibi\MessageBag;
use Primestyle\Sumibi\Rulenames;
use Primestyle\Sumibi\Rules\{
    FullNameKatakana,
    Required,
    Kanji,
};

class Sumibi
{
    /**
     * hold error messages
     *
     * @var MessageBag
     */
    private $message_bag;

    public function __construct(MessageBag $message_bag = null)
    {
        $this->message_bag = $message_bag ?? new MessageBag();
    }
    public function validate(array $data, array $rules): MessageBag
    {
        foreach ($data as $key => $value) {
            $messages = $this->validateItem($value, $rules[$key]);
            $this->message_bag->addMessagesToKey($key, $messages);
        }
        return $this->message_bag;
    }
    public function validateItem($value, $rules_for_item): array
    {
        $messages = [];
        $rules = $this->splitRules($rules_for_item);
        foreach ($rules as $rule) {
            switch ($rule) {
                case Rulenames::REQUIRED():
                    if ((new Required())->failed($value)) {
                        $messages[] = 'must be required';
                    }
                    break;
                case Rulenames::FULL_NAME_KATAKANA():
                    if ((new FullNameKatakana())->failed($value)) {
                        $messages[] = 'must be katakana name';
                    }
                    break;
                case Rulenames::KANJI():
                    if((new Kanji)->failed($value)) {
                        $messages[] = 'must be kanji';
                    }
                    break;
                default: {
                    break;
                }
            }
        }
        return $messages;
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
