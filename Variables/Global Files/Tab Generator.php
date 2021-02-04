<?php 

#Array of button names
$i = 0;
while ($i <= $tabnumb) {
	$txtsize = 'h2';

	if (isset($citiestxts[$i])) {
		$citytxts[$i] = '<'.$txtsize.'>'.$citiestxts[$i].'</'.$txtsize.'>';
	}

	$i++;
}

#Array of tab texts
$i = 0;
while ($i <= $tabnumb) {
	$tabtxts[$i] = $citytxts[$i];

	$i++;
}

if ($website_name == $website_things_i_do) {
	$i = 0;
	while ($i <= $tabnumb) {
		if ($i < 1) {
			$txtsize = 'h6';	
		}

		if ($i > 1) {
			$txtsize = 'h4';	
		}

		$citytxts[$i] = '<'.$txtsize.'>'.$citiestxts[$i].'</'.$txtsize.'>';
		$i++;
	}
}

else {
	#Array of mobile button names
	$i = 0;
	while ($i <= $tabnumb) {
		$txtsize = 'h4';
		$citytxts[$i] = '<'.$txtsize.'>'.$citiestxts[$i].'</'.$txtsize.'>';
	
		$i++;
	}
}

#Array of mobile tab texts
$i = 0;
while ($i <= $tabnumb) {
	$tabtxtsm[$i] = $citytxts[$i];

	$i++;
}

if ($website_name == $website_watch_history) {
	#Citycodes array generator
	$i = 0;
	while ($i <= $tabnumb) {
		if ($i < 3) {
			$citycodes[$i] = $website.'-'.strtolower($tabnames[$i]);
		}
	
		if ($i >= 3) {
			$citycodes[$i] = 'watched'.'-'.strtolower($tabnames[$i]);
		}
		
		if ($i == 7) {
			$citycodes[$i] = strtolower($tabnames[7]);
		}
	
		$i++;
	}
}

else {
	#Array of button codes
	$i = 0;
	while ($i <= $tabnumb) {
		$citycodes[$i] = $website.'-'.strtolower($tabnames[$i]);

		$i++;
	}
}

#Array of city codes
$i = 0;
while ($i <= $tabnumb) {
	$tabcodes[$i] = $citycodes[$i];

	$i++;
}

#Array of mobile city codes
$i = 0;
while ($i <= $tabnumb) {
	$tabcodesm[$i] = $citycodes[$i].'m';

	$i++;
}

if ($website_hide_tabs_setting == True) {
	$hide_tabs_text = 'style="display:none;"';
}

if ($website_hide_tabs_setting != True) {
	$hide_tabs_text = '';
}

if ($website_uses_tab_body_generator == false) {
	#Array of the city body files
	$i = 0;
	$i2 = $i + 1;

	#$citybodyfiles_array[$i] = $selected_website_folder.'CityBody'.$i2.'.php';

	if (file_exists($selected_website_folder.'CityBody'.$i2.'.php')) {
		while ($i <= $tabnumb) {
			$i2 = $i + 1;

			$citybodyfiles[$i] = $selected_website_folder.'CityBody'.$i2.'.php';

			$i++;
		}
	}

	else {
		if (in_array($website_language, $en_languages_array)) {
			$placeholdercitybody = 'Placeholder for the Body of the Tab: [Icon]';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$placeholdercitybody = 'Espaço reservado para o Corpo da Aba: [Ícone]';
		}

		$citybodyfiles[$i] = $placeholdercitybody;
	}
}

if ($website_name == $website_watch_history) {
	# Include the buttons loader PHP file
	include $computer_buttons_bar_loader;

	# Every Watched Button Yellow
	$every_watched_button_computer = $computer_buttons[0].$computer_buttons[3].$computer_buttons[4];

	# Mobile Every Watched Button Yellow
	$every_watched_button_mobile = $mobile_buttons[0].$mobile_buttons[3].$mobile_buttons[4];

	# Every Archived Button Yellow
	$every_archived_medias_button = $div_left_animation.$computer_buttons[5].$div_close.$div_right_animation.$computer_buttons[6].$div_close;

	# Mobile Every Archived Button Yellow
	$every_archived_medias_button_mobile = $div_left_animation.$mobile_buttons[5].$div_close.$div_right_animation.$mobile_buttons[6].$div_close;
}

if ($website_name == $website_things_i_do or $website_name == $website_text_maker) {
	# Include the buttons loader PHP file
	include $computer_buttons_bar_loader;
}

#City body files includer
$i = 0;
while ($i <= $tabnumb) {
	if (isset($citybodyfiles[$i])) {
		if (file_exists($citybodyfiles[$i])) {
			include $citybodyfiles[$i];
		}
	}

	$i++;
}

if ($website_name == $website_things_i_do) {
	#Include the buttons loader PHP file
	include $computer_buttons_bar_loader;
}

#Comments Tab includer if the setting is True
if ($website_has_comments_tab == True or $story_name_has_write_form == True) {
	include $website_forms_php;
}

#Stories Tab includer if the setting is True
if ($website_has_stories_tab_setting == True) {
	include $story_variables_php_variable;
}

if ($website_uses_tab_body_generator == True) {
	require $tab_bodies_generator_php_variable;
}

#City content array generator
$zzz = 0;
$zxx = 1;
$tabnumb3 = $tabnumb + 1;
while ($zzz <= $tabnumb3) {
	if (file_exists($selected_website_folder.'CityContent'.$zxx.'.php')) {
		ob_start();
		include $selected_website_folder.'CityContent'.$zxx.'.php';
		$citycontents[$zzz] = ob_get_clean();
		ob_clean();
	}

	else {
		if (in_array($website_language, $en_languages_array)) {
			$placeholdercitycontent = $div_zoom_animation.'Placeholder for the Content of the Tab.'.$div_close;
		}

		if (in_array($website_language, $pt_languages_array)) {
			$placeholdercitycontent = $div_zoom_animation.'Espaço reservado para o Conteúdo da Aba.'.$div_close;
		}

		$citycontents[$zzz] = $placeholdercitycontent;
	}

	$zxx++;
	$zzz++;
}

#Citiescontent array generator
$i = 0;
while ($i <= $tabnumb) {
	$i2 = $i + 1;

	if (isset($citybodies[$i])) {
		if (isset($citytitles)) {
			$citiescontent[$i] = $citytitles[$i].$citybodies[$i].$citycontents[$i];
		}

		if (!isset($citytitles)) {
			$citiescontent[$i] = $citybodies[$i].$citycontents[$i];
		}
	}

	else {
		#print_r($citytitles);
		if (isset($citytitles)) {
			$citiescontent[$i] = $citytitles[$i].$citycontents[$i];
		}

		if (!isset($citytitles)) {
			$citiescontent[$i] = $citycontents[$i];
		}
	}

	$i++;
}

if ($website_name != $website_things_i_do and $website_name != $website_watch_history) {
	#Include the buttons loader PHP file
	include $computer_buttons_bar_loader;
}

?>