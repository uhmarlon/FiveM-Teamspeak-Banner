<?php
//                        Developed by slashchv                                //
//     github.com/slashchv/PHP-Simple-Query-connected-players-FiveM-Server     //
//                                                                             //

function FivemQueryPlayers($IPServer, $PortServer) {
    $opts = array('http' =>
    array(
        'method'  => 'GET',
        'timeout' => 2 // Timeout GET 
    ));
   $context  = stream_context_create($opts);
   $content_info = json_decode(@file_get_contents("http://".$IPServer.":".$PortServer."/info.json", false, $context), true);
    if ($content_info) {
        $gta5_players = @file_get_contents("http://".$IPServer.":".$PortServer."/players.json", false, $context);
        $content_players = json_decode($gta5_players, true);
        $pl_count = count($content_players);
        return $pl_count;
    } else {
        return;
    }
}
?>
