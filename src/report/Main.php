<?php
namespace report;

use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use report\commands\Report;
class Main extends PluginBase implements Listener{
 CONST $prefix = TF::BLACK . "[" . TF::RED . "Report" . TF::BLACK . "]" . TF::WHITE." ";

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        @mkdir($this->getDataFolder() . "reports/");
		$this->getServer()->getCommandMap()->register("report", new Report($this));

    }
    
    }
