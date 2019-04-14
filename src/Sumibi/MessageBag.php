<?php

namespace Primestyle\Sumibi;

class MessageBag
{
    /**
     * A holder of error messages.
     *
     * @var array
     */
    private $messages = [];

    public function addMessagesToKey(String $key, array $messages_for_item): void
    {
        $this->messages[$key] = $messages_for_item;
    }

    /**
     * get error messages as Array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->messages;
    }

    /**
     * check if errors esixt or not.
     *
     * @return boolean
     */
    public function hasErrors(): bool
    {
        foreach ($this->messages as $message) {
            if (count($message) > 0) return true;
        }
        return false;
    }

    /**
     * get messages for the specific key.
     * This returns empty array if the key doesn't have errors.
     *
     * @param string $key
     * @return array
     */
    public function getMessagesForKey(string $key): array
    {
        return $this->messages[$key];
    }
}
