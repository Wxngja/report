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
	      if(isset($args[0]) && strtolower($args[0]) == ""){
			$sender = $p;
			$p->sendMessage(SELF::prefix . TF::GREEN . "Invalid Player!");
		}
	    if(isset($args[1]) && strtolower($args[1]) == ""){
			$sender = $p;
			$p->sendMessage(SELF::prefix . TF::GREEN . "Invalid message!");
		}
	   if(isset($args[1]) && strtolower($args[1]) == "" && isset($args[0]) && strtolower($args[0]) == "" ){
			$sender = $p;
			$p->sendMessage(SELF::prefix . TF::GREEN . "Report failed...!");
		}
			$target = $this->getServer()->getPlayer($args[0]);
                  if($target instanceof Player) {
			if($target == null){
			$sender = $p;
			$p->sendMessage(SELF::prefix . TF::RED . "ERROR: Target not found!");
		}
			     $sender->sendMessage(SELF::prefix . TF::RED . " Successfully reported " . TF::GREEN. $target->getName(); . TF::RED . " for " . implode(" ", $args));
                   foreach ($this->getServer()->getOnlinePlayers() as $pl) {
                    if ($pl->hasPermission("report.bypass")) {                         $pl->sendMessage(SELF::prefix . TF::BLUE . "Report : " . TF::RED . $sender->getName() . " - " . TF::BLUE . $args);
                        $this->report->set("Report", $args);
		    } else {
                        $sender->sendMessage(SELF::prefix . TF::RED . "Failed to report message as no operators are online!");
                    }
                }
		}
	    }
}
