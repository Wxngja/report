<?php
namespace report\commands;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use report\commands\Report;
use report\tasks\ReportTask;
class Report extends ReportTask {
	private $plugin;
	public function __construct(Main $plugin) {
        $this->plugin = $plugin;
        parent::__construct($plugin, "report", "Report a player!", "/report <player> <..> ", "r");
    }
	
	public function getPlugin(){
        return $this->plugin;
    }
   
	public $report;
	    public function execute(CommandSender $sender, $commandLabel, array $args){
             if($sender instanceof Player){
		$this->report = new Config(($this->plugin->getDataFolder()."reports/".strtolower($sender->getName())."__report.yml", Config::
	         if (count($args) === 0) {
           $sender->sendMessage(SELF::prefix . TF::RED . $this->usageMessage;);
             }
	  if (isset($args[0]) && strtolower($args[0]) === "report") {
            if ($args[1] == "") {
                $sender->sendMessage($this->prefix . TF::RED . "Failed to report a message!");
            } else {
                foreach ($this->getServer()->getOnlinePlayers() as $pl) {
                    if ($pl->hasPermission("eoncore.report")) {
                        $pl->sendMessage($this->prefix . TF::BLUE . "Report : " . TF::RED . $sender->getName() . " - " . TF::BLUE . $args[1] . " " .  TF::BLUE. $args[2] . " " .  TF::BLUE. $args[3] ." " .  TF::BLUE. $args[4] . " " .  TF::BLUE. $args[5] . " " .  TF::BLUE. $args[6] . " " .  TF::BLUE. $args[7] . " " .  TF::BLUE.$args[8] .  " " .  TF::BLUE.$args[9] .  " " .  TF::BLUE.$args[10]);
                    } else {
                        $sender->sendMessage($this->prefix . TF::RED . "Failed to report message as no operators are online!");
                    }
                }
            }

        }
		}
	    
	    }
}
