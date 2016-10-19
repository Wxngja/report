<?php
namespace report\commands;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use report\Main;
use pocketmine\command\CommandSender;
use report\tasks\ReportTask;
class Report extends ReportTask
{
	private $plugin;

	public function __construct(Main $plugin)
	{
		$this->plugin = $plugin;
		parent::__construct($plugin, "report", "Report a player!", "/report <player> <..> ", "r");
	}

	public function getPlugin()
	{
		return $this->plugin;
	}

	public $report;

	public function execute(CommandSender $sender, $commandLabel, array $args)
	{
		if ($sender instanceof Player) {
			$this->report = new Config($this->plugin->getDataFolder() . "reports/" . strtolower($sender->getName()) . "__report.yml", Config::YAML);
			if (count($args) === 0) {
				$sender->sendMessage(Main::prefix . TF::RED . $this->usageMessage);
			}
			if (isset($args[0]) && strtolower($args[0]) == "") {
				$p = $sender;
				$p->sendMessage(Main::prefix . TF::GREEN . "Invalid Player!");
			}
			if (isset($args[1]) && strtolower($args[1]) == "") {
				$sender->sendMessage(Main::prefix . TF::GREEN . "Invalid message!");
			}
			if (isset($args[1]) && strtolower($args[1]) == "" && isset($args[0]) && strtolower($args[0]) == "") {
				$sender->sendMessage(Main::prefix . TF::GREEN . "Report failed...!");
			}
			$target = $this->plugin->getServer()->getPlayer($args[0]);
			if ($target instanceof Player) {
				if ($target == null) {
					$sender->sendMessage(Main::prefix . TF::RED . "ERROR: Target not found!");
				}
				$sender->sendMessage(Main::prefix . TF::RED . " Successfully reported " . TF::GREEN . $target->getName() . TF::RED . " for " . implode(" ", $args));
				foreach ($this->plugin->getServer()->getOnlinePlayers() as $pl) {
					if ($pl->hasPermission("report.bypass")) {
						$pl->sendMessage(Main::prefix . TF::BLUE . "Report : " . TF::RED . $sender->getName() . " - " . TF::BLUE . $args);
						$this->report->set("Report", $args);
					} else {
						$sender->sendMessage(Main::prefix . TF::RED . "Failed to report message as no operators are online!");
					}
				}
			}
		}
	}
}
