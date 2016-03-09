<?php
namespace DJK\how;

use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;

class Main extends PluginBase implements Listener{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
		$this->getLogger()->info(TEXTFORMAT::AQUA . "DJKaiDEV" .TEXTFORMAT::YELLOW. " >>" .TEXTFORMAT::AQUA.  " YAY! How is now enabled! Ready to help!");
	}
	public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        $cmd = strtolower($command->getName());
        switch ($cmd){
            case "how":
                if (!($sender instanceof Player)){
                    $sender->sendMessage("§7--§l[ §eHOW §7]--");
                    $sender->sendMessage($this->getConfig()->get("how1"));
                    return true;
                }
                $player = $this->getServer()->getPlayer($sender->getName());
                if ($player->hasPermission("djkai.how")){
                    $sender->sendMessage("§7--§l[ §eHOW §7]--");
                    $sender->sendMessage($this->getConfig()->get("how1"));
                    return true;
                }
                break;
            }
        }
    }
?>
