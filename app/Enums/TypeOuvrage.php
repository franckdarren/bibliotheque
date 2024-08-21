<?php

namespace  App\Enums;


enum TypeOuvrage:String {
    case LIVRE= 'Livre';
    case RAPPORT= 'Rapport';

    public static function values():array {
        return array_map(fn($element) => $element->value,self::cases());
    }
}
