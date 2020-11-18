<?php

namespace wave;

use wave\command\XPBottle as CMD;
use pocketmine\plugin\PluginBase;
use wave\listener\XPListener;

class XpBottle extends PluginBase
{

    public function onEnable()
    {
        $this->getServer()->getCommandMap()->register("XPBottle", new CMD());
        new XPListener($this);
        $this->getLogger()->info("Le plugin a été chargé");
    }

}
