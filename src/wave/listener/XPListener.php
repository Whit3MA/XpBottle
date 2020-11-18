<?php

namespace wave\listener;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;
use wave\XpBottle;

class XPListener implements Listener
{

    public function __construct(XpBottle $pg)
    {
        $pg->getServer()->getPluginManager()->registerEvents($this, $pg);
    }

    public function onInteract(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $item = $event->getItem();
        $lore = $item->getLore();

        if ($item->getId() === Item::EXPERIENCE_BOTTLE and isset($lore[1])) {

            $event->setCancelled();

            $xp = TextFormat::clean($lore[1]);
            if (is_numeric($xp)) {

                $player->addXpLevels($xp);
                $player->getInventory()->removeItem($item);

            }

        }

    }

}
