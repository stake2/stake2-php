<?php

# folders array
$folders = array(
	"hard_drive_letter" => substr(__FILE__, 0, 2)."/",
);

# Root folders
$names = [
	"Apps",
	"Mega",
	"Mídias",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders[$key] = [
		"root" => $folders["hard_drive_letter"].$item."/",
	];
}

# Apps folders
$names = [
	"App Text Files",
	"Modules",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["apps"][$key] = [
		"root" => $folders["apps"]["root"].$item."/",
	];
}

# App Text Files files
$names = [
	"Language",
	"Watch_History",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["apps"]["app_text_files"][$key] = [
		"root" => $folders["apps"]["app_text_files"]["root"].$item."/",
	];
}

# Languages.json file
$folders["apps"]["app_text_files"]["language"]["languages"] = $folders["apps"]["app_text_files"]["language"]["root"]."Languages.json";

# Watch History "Texts.json" file
$folders["apps"]["app_text_files"]["watch_history"]["texts"] = $folders["apps"]["app_text_files"]["watch_history"]["root"]."Texts.json";

# Mega folders
$names = [
	"Bloco De Notas",
	"Image",
	"PHP",
	"Stories",
	"Websites",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"][$key] = [
		"root" => $folders["mega"]["root"].$item."/",
	];
}

# Bloco De Notas folders
$names = [
	"Dedicação",
	"Dump",
	"Locked",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["bloco_de_notas"][$key] = [
		"root" => $folders["mega"]["bloco_de_notas"]["root"].$item."/",
	];
}

# Bloco De Notas/Dedicação folders
$names = [
	"Diary",
	"Diary Slim",
	"Networks",
	"Years",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["bloco_de_notas"]["dedicação"][$key] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["root"].$item."/",
	];
}

# Networks/Audiovisual Media Network folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["root"]."Audiovisual Media Network/",
];

# Audiovisual Media Network/Watch History folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["root"]."Watch History/",
];

# Watch History/Watched folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["root"]."Watched/",
];

# Current year Watched folder
$current_year = new DateTime();
$current_year = (string)$current_year -> format("Y");

$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$current_year] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"]["root"].$current_year."/",
];

# "Per Media Type" folder of Current year Watched folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$current_year]["per_media_type"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$current_year]["root"]."Per Media Type/",
];

# "Per Media Type" files folder of Current year Watched folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$current_year]["per_media_type"]["files"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$current_year]["per_media_type"]["root"]."Files/",
];

# Years folders
$folders["mega"]["bloco_de_notas"]["dedicação"]["years"][$current_year] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["years"]["root"].$current_year."/",
];

# Temporary define the root PHP folder as the Remake folder, because I am remaking my PHP code structure
$folders["mega"]["php"]["root"] = $folders["mega"]["php"]["root"]."Remake/";

# PHP folders
$names = [
	"Classes",
	"JSON",
	"Modules",
	"Websites",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"][$key] = [
		"root" => $folders["mega"]["php"]["root"].$item."/",
	];
}

# Classes folders and files
$folders["mega"]["php"]["classes"]["text_files"] = [
	"root" => $folders["mega"]["php"]["classes"]["root"]."Text files/",
];

# Text files files
$names = [
	"Switches",
	"Texts",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", explode(".", strtolower($item))[0]);

	$folders["mega"]["php"]["classes"]["text_files"][$key] = $folders["mega"]["php"]["classes"]["text_files"]["root"].$item.".json";
}

# Classes files
$names = [
	"Class list.txt",
	"Loader.php",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", explode(".", strtolower($item))[0]);

	$folders["mega"]["php"]["classes"][$key] = $folders["mega"]["php"]["classes"]["root"].$item;
}

# JSON files
$names = [
	"Colors",
	"Icons",
	"URL",
	"Website template",
	"Websites",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", explode(".", strtolower($item))[0]);

	$folders["mega"]["php"]["json"][$key] = $folders["mega"]["php"]["json"]["root"].$item.".json";
}

# Modules files
$names = [
	"Slim",
	"TPL",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"]["modules"][$key] = $folders["mega"]["php"]["modules"]["root"].$item.".php";
}

# Website Information files
$folders["mega"]["php"]["websites"]["root_websites"] = $folders["mega"]["php"]["websites"]["root"]."Root websites.json";

# Index PHP files
$names = [
	"Folders",
	"Index",
	"SQL",
	"Story",
	"Website",
	"Website_Dictionary",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"][$key] = $folders["mega"]["php"]["root"].$item.".php";
}

# Mega Stories folders
$folders["mega"]["stories"]["database"] = [
	"root" => $folders["mega"]["stories"]["root"]."Database/",
];

# Mega Stories Database Stories JSON file
$folders["mega"]["stories"]["database"]["stories"] = $folders["mega"]["stories"]["database"]["root"]."Stories.json";

# Mega Websites folders
$names = [
	"Audio",
	"CSS",
	"Images",
	"JavaScript",
	"Texts",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["websites"][$key] = [
		"root" => $folders["mega"]["websites"]["root"].$item."/",
	];
}

# Mega Websites Images folders
$names = [
	"Backgrounds",
	"Icons",
	"Images",
	"Story Covers",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["websites"]["images"][$key] = [
		"root" => $folders["mega"]["websites"]["images"]["root"].$item."/",
	];
}

# Mega Websites Website.json file
$folders["mega"]["websites"]["website"] = $folders["mega"]["websites"]["root"]."Website.json";

# Define PHP folder key as the Mega PHP folder key
$folders["php"] = $folders["mega"]["php"];

?>