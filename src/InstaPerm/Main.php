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
    const WEBSITE = "http://boxofdevs.x10host.com/software/instaperm";
    
    public function onEnable(){
        $this->getLogger()->info(slef::PREFIX . TF::GREEN . "Enabled!");
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName()) === "setperm"){
			if(!isset($args[1])){
				$sender->sendMessage(self::PREFIX . TF::DARK_RED . "Usage: /setperm <player> <permission>");
			}else{
                $playername = $args[0];
                $player = $this->getServer()->getPlayer($playername);
				$perm = $args[1];
				$player->setPermission($perm);
 				$sender->sendMessage(self::PREFIX . TF::GREEN. $perm . "successfully set to " . $playername . "!");
        	}
		}
        if(strolower($cmd->getName()) === "rmperm"){
			if(!isset($args[1])){
				$sender->sendMessage(self::PREFIX . TF::DARK_RED . "Usage: /rmperm <player> <permission>");
			}else{
                $playername = $args[0];
                $player = $this->getServer()->getPlayer($playername);
				$perm = $args[1];
				$player->removePermission($perm);
 				$sender->sendMessage(self::PREFIX . TF::GREEN. $perm . "removed from " . $playername . "!");
        	}
		}
        if(strolower($cmd->getName()) === "seeperms"){
			if(!isset($args[0])){
				$sender->sendMessage(self::PREFIX . TF::DARK_RED . "Usage: /seeperms <player>");
			}else{
				$playername = $args[0];
				$player = $this->getServer()->getPlayer($playername);
				$perms = $player->getEffectivePermissions();
				$sender->sendMessage(self::PREFIX . TF::GOLD . $playername . "'s permissions: \n" . TF::AQUA . implode(", ", $perms));
        	}
        }
        if(strolower($cmd->getName()) === "checkperm"){
			if(!isset($args[1])){
				$sender->sendMessage(self::PREFIX . TF::DARK_RED . "Usage: /checkperm <player> <permission>");
			}else{
                $playername = $args[0];
                $player = $this->getServer()->getPlayer($playername);
				$perm = $args[1];
                if($player->hasPermission($perm)){
                    $sender->sendMessage(self::PREFIX . TF::AQUA . $playername . "has permission" . $perm . "!");
                }else{
                    $sender->sendMessage(self::PREFIX . TF::AQUA . $playername . "doesn't have permission" . $perm . "!");
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
        $this->getLogger()->info(self::PREFIX . TF::DARK_RED . "Disabled!");
    }
    
}

?>
