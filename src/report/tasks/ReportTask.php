<?php
namespace report\tasks;

use report\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
class ReportTask extends Command implements PluginIdentifiableCommand {

    private $plugin;

    public function __construct(Main $plugin, $name, $description, $usageMessage, $aliases){
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->plugin = $plugin;
    }

   public function getPlugin(){
        return $this->plugin;
    }
	
    public function execute(CommandSender $sender, $commandLabel, array $args) {
        if($this->testPermission($sender)){
            $result = $this->onExecute($sender, $args);
            if(is_string($result)){
                $sender->sendMessage($result);
            }
            return true;
        }
        return false;
    }

 
    public function onExecute(CommandSender $sender, array $args){

    }

}
