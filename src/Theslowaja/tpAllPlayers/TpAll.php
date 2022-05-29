<?php

namespace Theslowaja\tpAllPlayers;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\world\Position;


class TpAll extends PluginBase{

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "tpall":
				foreach ($this->getServer()->getOnlinePlayers() as $p) {
          if(count($args) == 1){
            $a = $this->getServer()->getPlayerByPrefix($args[0]);
						$p->teleport($a);
						$p->sendMessage("§l§8[§eTPAllPlayers§8] §r§8> §aTeleporting...\n");
          } else {
            $p->teleport($sender);
						$p->sendMessage("§l§8[§eTPAllPlayers§8] §r§8> §aTeleporting...\n");
          }
        }
        break;
	  	} 
    return true;
		}
}	
