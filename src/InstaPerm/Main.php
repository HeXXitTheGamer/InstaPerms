<?php

/*
*  ___  ________   ________  _________  ________  ________  _______   ________  _____ ______      
* |\  \|\   ___  \|\   ____\|\___   ___\\   __  \|\   __  \|\  ___ \ |\   __  \|\   _ \  _   \    
* \ \  \ \  \\ \  \ \  \___|\|___ \  \_\ \  \|\  \ \  \|\  \ \   __/|\ \  \|\  \ \  \\\__\ \  \   
*  \ \  \ \  \\ \  \ \_____  \   \ \  \ \ \   __  \ \   ____\ \  \_|/_\ \   _  _\ \  \\|__| \  \  
*   \ \  \ \  \\ \  \|____|\  \   \ \  \ \ \  \ \  \ \  \___|\ \  \_|\ \ \  \\  \\ \  \    \ \  \ 
*    \ \__\ \__\\ \__\____\_\  \   \ \__\ \ \__\ \__\ \__\    \ \_______\ \__\\ _\\ \__\    \ \__\
*     \|__|\|__| \|__|\_________\   \|__|  \|__|\|__|\|__|     \|_______|\|__|\|__|\|__|     \|__|
*                    \|_________|                                                               
* 
* The instant permissions manager that really is instant!
*
* @author BoxOfDevs Team
* @link http://boxofdevs.x10host.com/
* 
*/

namespace InstaPerm;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\permission\Permission;

class InstaPerm extends PluginBase{
    
    const PREFIX = TF::BLACK."[".TF::AQUA."InstaPerm".TF::BLACK."]";
    const AUTHOR = "BoxOfDevs Team";
    const VERSION = "1.0";
    const WEBSITE = "http://boxofdevs.x10host.com/plugins/instaperm";
    
    public function onEnable(){
        $this->getLogger()->info(TF::GREEN."Enabled!");
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName()) == "setperm"){
            if(!($sender instanceof Player)){
                if(!isset($args[1])){
                    $sender->sendMessage(TF::DARK_RED."Usage: /setperm <player> <permission>");
                }else{
                    $player = $args[0];
                    $perm = $args[1];
                    $player->setPermission($perm);
                    $sender->sendMessage(TF::GREEN."$perm successfully set to $player!");
                }
            }elseif($sender instanceof Player){
                if(!isset($args[1])){
                    $sender->sendMessage(TF::DARK_RED."Usage: /setperm <player> <permission>");
                }else{
                    $player = $args[0];
                    $perm = $args[1];
                    $player->setPermission($perm);
                    $sender->sendMessage(TF::GREEN."$perm successfully set to $player!");
                }
            }
        }
        if(strolower($cmd->getName()) == "rmperm"){
            if(!($sender instanceof Player)){
                if(!isset($args[1])){
                    $sender->sendMessage(TF::DARK_RED."Usage: /rmperm <player> <permission>");
                }else{
                    $player = $args[0];
                    $perm = $args[1];
                    $player->removePermission($perm);
                    $sender->sendMessage(TF::GREEN."$perm successfully removed from $player!");
                }
            }elseif($sender instanceof Player){
                if(!isset($args[1])){
                    $sender->sendMessage(TF::DARK_RED."Usage: /rmperm <player> <permission>");
                }else{
                    $player = $args[0];
                    $perm = $args[1];
                    $player->removePermission($perm);
                    $sender->sendMessage(TF::GREEN."$perm successfully removed from $player!");
                }
            }
        }
        if(strolower($cmd->getName()) == "checkperm"){
            if(!($sender instanceof Player)){
                if(!isset($args[1])){
                    $sender->sendMessage(TF::DARK_RED."Usage: /checkperm <player> <permission>");
                }else{
                    $player = $args[0];
                    $perm = $args[1];
                    if($player->hasPermission($perm)){
                        $sender->sendMessage(TF::GREEN."$player has permission $perm!");
                    }else{
                        $sender->sendMessage(TF::GREEN."$player doesn't have permission $perm!");
                    }
            }elseif($sender instanceof Player){
                if(!isset($args[1])){
                    $sender->sendMessage(TF::DARK_RED."Usage: /checkperm <player> <permission>");
                }else{
                    $player = $args[0];
                    $perm = $args[1];
                    if($player->hasPermission($perm)){
                        $sender->sendMessage(TF::GREEN."$player has permission $perm!");
                    }else{
                        $sender->sendMessage(TF::GREEN."$player doesn't have permission $perm!");
                    }
                }
            }
        }
    return true;
    }
    
    public function getPrefix(){
        return self::PREFIX;
    }

    public function getAuthor(){
        return self::AUTHOR;
    }

    public function getVersion(){
        return self::VERSION;
    }

    public function getWebsite(){
        return self::WEBSITE;
    }
    
    public function onDisable(){
        $this->getLogger()->info(TF::DARK_RED."Disabled!");
    }
    
}

?>
