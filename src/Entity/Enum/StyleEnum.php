<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class StyleEnum
{
    public const ELECTRONIC = 'Electronic';
    public const HIP_HOP = 'Hip-Hop';
    // Add more styles as needed

    #[ORM\Column(type: 'string', length: 255)]
    public string $value;

    public function __construct(string $value)
    {
        if (!in_array($value, self::getValidValues(), true)) {
            throw new \InvalidArgumentException("Invalid style value: $value");
        }

        $this->value = $value;
    }

    public static function getValidValues(): array
    {
        return [self::ELECTRONIC, self::HIP_HOP];
        // Add more styles as needed
    }
}
