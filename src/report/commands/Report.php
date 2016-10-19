<?php
namespace report\commands;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use report\commands\Report;
use report\tasks\ReportListener;
class Report extends ReportListener {
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
		$this->report = new Config(($this->plugin->getDataFolder()."reports/".strtolower($sender->getName())."__report.yml", Config::YAML);     
	     }
	    
	    }
}
