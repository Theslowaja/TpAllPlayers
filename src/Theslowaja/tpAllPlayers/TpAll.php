<?php

namespace Theslowaja\tpAllPlayers;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\world\Position;
use pocketmine\utils\Config;
use pocketmine\player\Player;

class TpAll extends PluginBase
{
    public function onCommand(
        CommandSender $sender,
        Command $command,
        string $label,
        array $args
    ): bool {
        switch ($command->getName()) {
            case "tpall":
                $target = $sender;
                if (count($args) == 1) {
                    $a = $this->getServer()->getPlayerByPrefix($args[0]);
                    if ($a instanceof Player) {
                        $target = $a;
                        $p->sendMessage(
                            $this->getConfig()->get("Prefix") .
                                " " .
                                str_replace(
                                    "%toplayer",
                                    $a,
                                    $this->getConfig()->get(
                                        "message-to-players"
                                    )
                                )
                        );
                    } else {
                        $p->sendMessage(
                            $this->getConfig()->get("Prefix") .
                                " " .
                                $this->getConfig()->get(
                                    "message-player-notfound"
                                )
                        );
                        return false;
                    }
                }
                foreach ($this->getServer()->getOnlinePlayers() as $p) {
                    if ($target !== $sender) {
                        $p->teleport($target);
                        $p->sendMessage(
                            $this->getConfig()->get("Prefix") .
                                " " .
                                str_replace(
                                    "%toplayer",
                                    $target->getName(),
                                    $this->getConfig()->get(
                                        "message-to-players"
                                    )
                                )
                        );
                    } else {
                        $p->teleport($target);
                        $p->sendMessage(
                            $this->getConfig()->get("Prefix") .
                                " " .
                                $this->getConfig()->get("message-To-Yourself")
                        );
                    }
                }
                break;
        }
        return true;
    }
}
