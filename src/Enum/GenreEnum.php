<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class GenreEnum
{
    // https://support.discogs.com/hc/fr/articles/360005055213-Guide-d-Utilisation-de-la-Base-de-Donn%C3%A9es-9-Genres-Styles
    
    public const BLUES = 'Blues';
    public const BRASS_AND_MILITARY = 'Brass_and_military';
    public const CHILDREN = 'Children';
    public const CLASSICAL = 'Classical';
    public const ELECTRONIC = 'Electronic';
    public const FOLK_WORLD_COUNTRY = 'folk, world, & country';
    public const FUNK_SOUL = 'funk_soul';
    public const HIP_HOP = 'hip hop';
    public const JAZZ = 'jazz';
    public const LATIN = 'latin';
    public const NO_MUSIC = 'no_music';
    public const POP = 'pop';
    public const REGGAE = 'reggae';
    public const ROCK = 'rock';
    public const STAGE_AND_SCREEN = 'stage_and_screen';
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
        return [
            self::BLUES,
            self::BRASS_AND_MILITARY,
            self::CHILDREN,
            self::CLASSICAL,
            self::ELECTRONIC,
            self::FOLK_WORLD_COUNTRY,
            self::FUNK_SOUL,
            self::HIP_HOP,
            self::JAZZ,
            self::LATIN,
            self::NO_MUSIC,
            self::POP,
            self::REGGAE,
            self::ROCK,
            self::STAGE_AND_SCREEN,
            self::NO_MUSIC,
            self::POP,
            self::REGGAE,
            self::ROCK,
            self::STAGE_AND_SCREEN,
        ];
    }
}