<?php

namespace Theslowaja\tpAllPlayers;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\world\Position;
use pocketmine\utils\Config;


class TpAll extends PluginBase{

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "tpall":
				foreach ($this->getServer()->getOnlinePlayers() as $p) {
          if(count($args) == 1){
            $a = $this->getServer()->getPlayerByPrefix($args[0]);
            $p->teleport($a);
	    $p->sendMessage($this->getConfig()->get("Prefix")." " . str_replace("%toplayer", $a, $this->getConfig()->get("message-to-players")));
          } else {
            $p->teleport($sender);
	    $p->sendMessage($this->getConfig()->get("Prefix")." " . $this->getConfig()->get("message-To-Yourself"));
          }
        }
        break;
	  	} 
    return true;
		}
}	
