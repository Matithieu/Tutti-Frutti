<?php

class FruitEnum
{
    public const POMME = 'pomme';
    public const BANANE = 'banane';
    public const POIRE = 'poire';
    public const MURE_NOIRE = 'mure noire';
    public const MURE_BLEUE = 'mure bleue';
    public const CERISE = 'cerise';
    public const CERISE_TOMATE = 'cerise tomate';
    public const CITRON = 'citron';
    public const NOIX_DE_COCO = 'noix de coco';
    public const MAIS = 'mais';
    public const CONCOMBRE = 'concombre';
    public const DRAGON = 'dragon';
    public const MOURETTE = 'mourette';
    public const FRAMBOISE_AUBERGINE = 'framboise de l aubergine';
    public const FRUIT_DU_BOIS = 'fruit du bois';
    public const GRENADE = 'grenade';
    public const POMME_GRENADE = 'pomme grenade';
    public const GOYAVE = 'goyave';
    public const POINT_D_OR = 'point d or';
    public const AGRUME = 'agrum';
    public const ANANAS = 'ananas';
    public const OLIVES = 'olives';
    public const PAPAYE = 'papaye';
    public const PERSIL = 'persil';
    public const PERSILLE = 'persille';
    public const NOYAU_DE_PERSILLE = 'noyau de persille';
    public const PRUNE = 'prune';
    public const ANANAS_PERSILLE = 'ananas persille';
    public const FRAMBOISE = 'framboise';
    public const CHOU_ROUGE = 'chou rouge';
    public const GRENADE_ROUGE = 'grenade rouge';
    public const OIGNON_ROUGE = 'oignon rouge';
    public const POIVRON_ROUGE = 'poivron rouge';
    public const CAROTTE = 'carotte';
    public const FRAISE = 'fraise';
    public const TOMATE = 'tomate';
    public const MELON_D_EAU = 'melon d eau';
    public const MAFE = 'mafe';
    public const BISSAP = 'bissap';

    public function __construct(string $value)
    {
        if (!in_array($value, self::getValidValues(), true)) {
            throw new \InvalidArgumentException("Valeur de fruit invalide : $value");
        }

        $this->value = $value;
    }

    public static function getValidValues(): array
    {
        return [
            self::POMME,
            self::BANANE,
            self::POIRE,
            self::MURE_NOIRE,
            self::MURE_BLEUE,
            self::CERISE,
            self::CERISE_TOMATE,
            self::CITRON,
            self::NOIX_DE_COCO,
            self::MAIS,
            self::CONCOMBRE,
            self::DRAGON,
            self::MOURETTE,
            self::FRAMBOISE_AUBERGINE,
            self::FRUIT_DU_BOIS,
            self::GRENADE,
            self::POMME_GRENADE,
            self::GOYAVE,
            self::POINT_D_OR,
            self::AGRUME,
            self::ANANAS,
            self::OLIVES,
            self::PAPAYE,
            self::PERSIL,
            self::PERSILLE,
            self::NOYAU_DE_PERSILLE,
            self::PRUNE,
            self::ANANAS_PERSILLE,
            self::FRAMBOISE,
            self::CHOU_ROUGE,
            self::GRENADE_ROUGE,
            self::OIGNON_ROUGE,
            self::POIVRON_ROUGE,
            self::CAROTTE,
            self::FRAISE,
            self::TOMATE,
            self::MELON_D_EAU,
            self::MAFE,
            self::BISSAP
        ];
    }
}
