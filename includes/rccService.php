<?php

// Map the class name to its file path
$classMap = [
    'Roblox\\Grid\\Rcc\\RCCServiceSoap' => 'C:/xampp/htdocs/idk16/includes/Rcc/RCCServiceSoap.php',
    'Roblox\\Grid\\Rcc\\Status' => 'C:/xampp/htdocs/idk16/includes/Rcc/Status.php',
    'Roblox\\Grid\\Rcc\\Job' => 'C:/xampp/htdocs/idk16/includes/Rcc/Job.php',
    'Roblox\\Grid\\Rcc\\ScriptExecution' => 'C:/xampp/htdocs/idk16/includes/Rcc/ScriptExecution.php',
    'Roblox\\Grid\\Rcc\\LuaValue' => 'C:/xampp/htdocs/idk16/includes/Rcc/LuaValue.php',
    'Roblox\\Grid\\Rcc\\LuaType' => 'C:/xampp/htdocs/idk16/includes/Rcc/LuaType.php',
];

// Register the autoloader function
spl_autoload_register(function ($className) use ($classMap) {
    if (isset($classMap[$className])) {
        require_once $classMap[$className];
    }
});

?>