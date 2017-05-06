<?php
    require('team.php');
    $filename = 'top3list.csv';
    date_default_timezone_set('America/New_York');
    $teams = array();
    $delim = '+';
    
    $handle = fopen($filename, "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $pieces = explode(',',$line);
            $t = new Team($pieces[0], $pieces[1]);
            array_push($teams, $t);
        }
        fclose($handle);
        echo "\n";
        echo "Filename: ".$filename."\n";
        echo "Modified At: ".(date ("Y-m-d h:i a", filemtime($filename)))."\n\n";
    } else {
        echo "Something went wrong.";
    }
    foreach ($teams as $team) {
        $ws = strlen("| Name: ".$team->name." |") - 2;
        $border = str_repeat("-",$ws);
        echo $delim.$border.$delim."\n";
        echo "| Name: ".$team->name." |\n";
        $sp = $ws - strlen("| Super Bowl Wins: ".$team->super_bowl_wins);
        $s = str_repeat(" ",$sp);
        echo "| Super Bowl Wins: ".$team->super_bowl_wins.$s." |\n";
        echo $delim.$border.$delim."\n\n";
    }
?>