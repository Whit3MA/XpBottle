<?php
/**
 * Created by PhpStorm.
 * User: Lilian
 * Date: 18/08/2019
 * Time: 21:50
 */

namespace Virvolta;

use Virvolta\command\XPBottle as CMD;
use pocketmine\plugin\PluginBase;
use Virvolta\listener\XPListener;

class XpBottle extends PluginBase
{

    public function onEnable()
    {
        $this->getServer()->getCommandMap()->register("XPBottle", new CMD());
        new XPListener($this);
        $this->getLogger()->info("Le plugin a été chargé par Virvolta");
    }

}