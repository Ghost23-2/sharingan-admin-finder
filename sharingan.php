<?php

print"\033[1;38;5;196m 


MMMMMMMMMMMMMMMNds+/-.``  ``.-/+sdNMMMMMMMMMMMMMMM
MMMMMMMMMMMNho-``...---`    `....``-ohNMMMMMMMMMMM
MMMMMMMMMd+.`.--------`        `.---.`.+dMMMMMMMMM
MMMMMMMh:`.----------.            .----.`:hMMMMMMM
MMMMMd:`.---------..`               .----.`:dMMMMM
MMMMs``--------.`.--`         `      `-----``sMMMM
MMN+ .------.``--::-          --.``   `-----. +NMM
MM+ .-----.``.-::::.          .:::-.`  `-----. +MM
Ms .-----` `-:::::-            -::::-.` `-----. sM
m``----.   -::::--.            .--::::-` .-----``m
o ----.   .::::---`    ````    `---::::-``------ o
- ---.    -:::--.`   .------.   `.--::::- ------ -
``---     -::-.`    .--------.    `.-:::: .-----``
``--.     --.       .--------.       .-::`.-----``
- --      `          .------.          .- ------ -
o --                   ````               ------ o
m``-                                      `.---``m
Ms .                ```.--.```              .-. sM
MM+           ```.--------------.`           ` +MM
MMN+  ``.....`.--::::::::::::::-.`            +NMM
MMMMs``--------.`..----------.`          ````sMMMM
MMMMMd:`.---------..``````           `....`:dMMMMM
MMMMMMMh:`.------------............----.`:hMMMMMMM
MMMMMMMMMd+.`.----------------------.`.+dMMMMMMMMM
MMMMMMMMMMMNho-``...----------...``-ohNMMMMMMMMMMM
MMMMMMMMMMMMMMMNds+/-.``````.-/+sdNMMMMMMMMMMMMMMM 
\033[0m";
                                                                                       
echo "\033[1;38;5;13m WEB Admin Finder - coded by : kumiho\033[0m";
print"\033[1;38;5;13m \n Special  Thanks to  : Anonyminhack5 \033[0m";
echo "\n\033[1;38;5;154m Enter A  Site(https://www.example.com):\033[0m";
$target = trim(fgets(STDIN));
$list = "wordlist.txt";
if(!preg_match("/^http:\/\//",$target) AND !preg_match("/^https:\/\//",$target)){
	$the_target = "http://$target";
}else{
	$the_target= $target;
}

$open= fopen("$list","r");
$size = filesize("$list");
$read = fread($open,$size);
$lists = explode("\r\n",$read);

foreach($lists as $login){
	$log = "$the_target/$login";
	$ch = curl_init("$log");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($httpcode == 200){
		 $handle = fopen("result.txt", "a+");
		fwrite($handle, "$log\n");
		print "\n\n [".date('H:m:s')."] try : $log => Found\n";
	}else{
		print "\n[".date('H:m:s')."] try : $log => not found";
	}
}

?>