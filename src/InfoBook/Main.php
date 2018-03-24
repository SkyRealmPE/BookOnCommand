<?php
declare(strict_types=1);

namespace InfoBook;

use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\item\Item;

class Main extends PluginBase {

    public function onEnable() : void{
        $this->getLogger()->notice("InfoBook enabled!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        switch(strtolower($command->getName())){
            case "core":
                if(!$sender instanceof Player){
                    $sender->sendMessage(TextFormat::RED . "Use this command in-game!");
                    return false;
                }

                if(!isset($args[0])){
                    $sender->sendMessage("§cUsage: /core help");
                    return false;
                }
                if($args[0] === "help"){
                        $this->giveHelp($sender);
                        $sender->sendMessage("§7-==+ §bSkyRealm §eHelp §7+==-");
                        $sender->sendMessage(TextFormat::GOLD . "use /core help again to learn more about our server! Be sure to explore as much as possible :)");
                        $sender->sendMessage("§cThis help sevtion of server it being developer so be patient.");
                        $sender->sendMessage(§7"-====================-");
                 }
                break;
        }
        return true;
    }

    public function giveHelp(Player $player) : void{
        $book = Item::get(Item::WRITTEN_BOOK, 0, 1);
        $book->setTitle(TextFormat::GREEN . TextFormat::UNDERLINE . "Information Booklet");
        $book->setPageText(0, "§bHello there §cNEW§a Guest, we hope you enjoy your stay \n Welcome to the HELP section of SkyRealmsFactions \n Just to be clear this server is under developement and is not perfect");
        $book->setPageText(1, TextFormat::GREEN . TextFormat::UNDERLINE . "How can my Kingdom win?" . TextFormat::BLACK . "\n - You can earn power in the weekly wars, and from PvPing enemy kingdoms! \n - You can earn power in our KOTH at warzone.");
        $book->setPageText(2, TextFormat::GREEN . TextFormat::UNDERLINE . "How do I store my loot, and get loot?" . TextFormat::BLACK . "\n - Try doing /pv 1, for a vault! \n - Go to your kingdoms world, and make a base, skybase, or lair! \n - Make sure you raid other kingdoms bases!");
        $book->setPageText(3, TextFormat::GREEN . TextFormat::UNDERLINE . "Helpful Commands" . TextFormat::BLACK . "\n- /k \n - /warpme \n - /pv \n - /shop \n - /potions \n - /ulog \n - /cp");
        $book->setAuthor("SkyRealm Network");
        $player->getInventory()->addItem($book);
    }
}
