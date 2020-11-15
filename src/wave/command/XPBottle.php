<?php

namespace Virvolta\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\item\Item;
use pocketmine\item\ItemIds;

use pocketmine\Player;

class XPBottle extends Command
{

    public function __construct(){
        parent::__construct("xpbottle", "Transform votre Level en bouteille");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){

            if ($sender->getXpLevel() > 0) {

                $levelToBottles = $sender->getXpLevel();

                $toGive = Item::get(ItemIds::EXPERIENCE_BOTTLE, 0, 1);
                $toGive->setLore(array(
                    "§eContenant :",
                    "§b" . $levelToBottles,
                    "§eLevels"
                ));

                $sender->getInventory()->addItem($toGive);
                $sender->setXpLevel(0);

            } else {

                $sender->sendMessage("§6Désolés mais tu na pas assez de level d'xp pour faire cette commande");

            }

        }

    }

}