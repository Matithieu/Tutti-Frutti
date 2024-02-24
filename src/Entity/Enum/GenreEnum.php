<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class GenreEnum
{
    public const ROCK = 'Rock';
    public const POP = 'Pop';
    // Add more genres as needed

    #[ORM\Column(type: 'string', length: 255)]
    public string $value;

    public function __construct(string $value)
    {
        if (!in_array($value, self::getValidValues(), true)) {
            throw new \InvalidArgumentException("Invalid genre value: $value");
        }

        $this->value = $value;
    }

    public static function getValidValues(): array
    {
        return [self::ROCK, self::POP];
        // Add more genres as needed
    }
}