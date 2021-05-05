<?php

class Fighter{
    public const MAX_LIFE = 100;
    public $name;
    public $strength;
    public $dexterity;
    public $life = self::MAX_LIFE;

    public function __construct($name, $strength, $dexterity) {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
    }

    public function fight($Fighter){
        $damage = rand(1, $this->strength) - rand(1, $this->dexterity);
        if ($damage <= 0){
            $damage = 0;
        }
        $this->life = $this->life - $damage;
        return $damage;
    }
    public static function isAlive($Fighter){
        if ($Fighter->life > 0){
            return true;
        } else{
            return false;
        }
    } 
}

$Heracles = new Fighter("Heracles", 20, 6);
$Lion = new Fighter("Lion", 11, 13);

$round = 1;
while($Heracles->life > 0 && $Lion->life > 0){
    echo "Round #" . $round ."\n";
    echo "🧔 Heracle attacked 🦁 Lion and made " . $Heracles->fight($Lion) . " damage\n";
    echo "🦁 Lion attacked 🧔 Heracle and made " . $Lion->fight($Heracles) . " damage\n\n";
    $round++;
}

if(Fighter::isAlive($Lion)){
    echo "🦁 Lion wins and left with ". $Lion->life ." health\n";
} else{
    echo "🦁 Lion is dead\n";
}

if(Fighter::isAlive($Heracles)){
    echo "🧔 Heracles wins and left with ". $Heracles->life ." health\n";
} else{
    echo "🧔 Heracles is dead\n";
}



?>