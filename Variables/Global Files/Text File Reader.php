<?php 

if ($siteusesuniversalfilereader == true) {
	$i = 0;
	foreach ($filenamesarray as $file) {
		$filesarray[$i] = $file;

		$i++;
	}

	#File text reader that makes an array of the text files
	$i = 0;
	foreach ($filesarray as $file) {
		if (file_exists($file) == true) {
			$fp = fopen($file, 'r', 'UTF-8'); 
			if ($fp) {
				${"$filetextarraynames[$i]"} = explode("\n", fread($fp, filesize($file)));
				${"$filetextarraynames[$i]"} = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", ${"$filetextarraynames[$i]"});

				$filetexts[$i] = ${"$filetextarraynames[$i]"};
			}
		}

		$i++;
	}

	#File line number counter
	$i = 0;
	foreach ($filesarray as $file) {
		if (file_exists($file) == true) {
			${"$filenumberarraynames[$i]"} = 0;
			$handle = fopen ($file, "r");
			while (!feof ($handle)){
				$line = fgets ($handle);
				${"$filenumberarraynames[$i]"}++;
			}

			$filenumbers[$i] = ${"$filenumberarraynames[$i]"};
		}

		$i++;
	}
}

if ($website_name == $sitediario) {
	$diarionumbersfile = $used_folder.'Diário Numbers.txt';

	if (file_exists($diarionumbersfile) == true) {
		$diarionumbersfp = fopen($diarionumbersfile, 'r', 'UTF-8');
		if ($diarionumbersfp) {
			$blocksnumber = explode("\n", fread($diarionumbersfp, filesize($diarionumbersfile)));
		}
	}
}

if ($website_name == $sitewatch or in_array($website_name, $yeararray)) {
	#Files definer for Watch.php and Years websites
	$watched2018textfile = $notepad_watch_history_folder.$site2018.'/Watched '.$site2018.' Episodes.txt';
	$watched2018timefile = $notepad_watch_history_folder.$site2018.'/Watched '.$site2018.' Time.txt';

	if (in_array($website_language, $en_languages_array)) {
		$watched2018mediatypefile = $notepad_watch_history_folder.$site2018.'/Watched '.$site2018.' MediaType '.strtoupper($enus_language).'.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$watched2018mediatypefile = $notepad_watch_history_folder.$site2018.'/Watched '.$site2018.' MediaType '.strtoupper($ptbr_language).'.txt';
	}

	$watched2019textfile = $notepad_watch_history_folder.$site2019.'/Watched '.$site2019.' Episodes.txt';
	$watched2019timefile = $notepad_watch_history_folder.$site2019.'/Watched '.$site2019.' Time.txt';

	if (in_array($website_language, $en_languages_array)) {
		$watched2019mediatypefile = $notepad_watch_history_folder.$site2019.'/Watched '.$site2019.' MediaType '.strtoupper($enus_language).'.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$watched2019mediatypefile = $notepad_watch_history_folder.$site2019.'/Watched '.$site2019.' MediaType '.strtoupper($ptbr_language).'.txt';
	}

	$watched2020textfile = $notepad_watch_history_folder.$site2020.'/Watched '.$site2020.' Episodes.txt';
	$watched2020timefile = $notepad_watch_history_folder.$site2020.'/Watched '.$site2020.' Time.txt';

	if (in_array($website_language, $en_languages_array)) {
		$watched2020mediatypefile = $notepad_watch_history_folder.$site2020.'/Watched '.$site2020.' MediaType '.strtoupper($enus_language).'.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$watched2020mediatypefile = $notepad_watch_history_folder.$site2020.'/Watched '.$site2020.' MediaType '.strtoupper($ptbr_language).'.txt';
	}

	$watchedmediatypefilearray = array(
	$watched2018mediatypefile,
	$watched2019mediatypefile,
	$watched2020mediatypefile,
	);

	$watchedmoviestextfile = $notepad_watch_history_folder.'Watched Movies.txt';
	$watchedmoviestimefile = $notepad_watch_history_folder.'Watched Movies Time.txt';
	$twfile = $notepad_watch_history_folder.'To Watch Episodes.txt';
	$twstatusfile = $notepad_watch_history_folder.'To Watch Status.txt';
	$twmediafile = $notepad_watch_history_folder.'To Watch Folders.txt';

	if (in_array($website_language, $en_languages_array)) {
		$twmediatypefile = $notepad_watch_history_folder.'To Watch MediaType '.strtoupper($enus_language).'.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$twmediatypefile = $notepad_watch_history_folder.'To Watch MediaType '.strtoupper($ptbr_language).'.txt';
	}

	#$twmediatypeenusfile = $notepad_watch_history_folder.'To Watch MediaType '.strtoupper($enus_language).'.txt';
	#$twmediatypeptbrfile = $notepad_watch_history_folder.'To Watch MediaType '.strtoupper($ptbr_language).'.txt';

	if (file_exists($watchedmoviestextfile) == true) {
		$moviesnumber = 0;
		$handle = fopen ($watchedmoviestextfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$moviesnumber++;
		}
	}

	if (file_exists($watched2018textfile) == true) {
		$watched2018number = 0;
		$handle = fopen ($watched2018textfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$watched2018number++;
		}
	}

	if (file_exists($watched2019textfile) == true) {
		$watched2019number = 0;
		$handle = fopen ($watched2019textfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$watched2019number++;
		}
	}

	if (file_exists($watched2020textfile) == true) {
		$watched2020number = 0;
		$handle = fopen ($watched2020textfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$watched2020number++;
		}
	}

	if (file_exists($twfile) == true) {
		$twnumber = 0;
		$handle = fopen ($twfile, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$twnumber++;
		}
	}

	if (file_exists($watchedmoviestextfile) == true) {
		$watchedmoviesfp = fopen($watchedmoviestextfile, 'r', 'UTF-8');
		if ($watchedmoviesfp) {
			$watchedmoviestextroot = explode("\n", fread($watchedmoviesfp, filesize($watchedmoviestextfile)));
			$watchedmoviestextarray = str_replace(";", ":", $watchedmoviestextroot);
		}
	}

	if (file_exists($watched2020textfile) == true) {
		$watched2020fp = fopen($watched2020textfile, 'r', 'UTF-8');
		if ($watched2020fp) {
			$watched2020textroot = explode("\n", fread($watched2020fp, filesize($watched2020textfile)));
			$watched2020textarray = str_replace(";", ":", $watched2020textroot);
		}
	}

	if (file_exists($watchedmoviestimefile) == true) {
		$watchedmoviesfp = fopen($watchedmoviestimefile, 'r', 'UTF-8'); 
		if ($watchedmoviesfp) {
			$watchedmoviestimearray = explode("\n", fread($watchedmoviesfp, filesize($watchedmoviestimefile)));
			$watchedmoviestime = str_replace("^", "", $watchedmoviestimearray);
			$watchedmoviestime = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $watchedmoviestime);
		}
	}

	if (file_exists($watchedmoviestextfile) == true) {
		$watchedmoviesfp = fopen($watchedmoviestextfile, 'r', 'UTF-8'); 
		if ($watchedmoviesfp) {
			$watchedmoviestxt = str_replace("^", "", $watchedmoviestextarray);
			$watchedmoviestxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $watchedmoviestxt);
		}
	}

	if (file_exists($watched2018mediatypefile) == true) {
		$watched2018mediatypefp  = fopen($watched2018mediatypefile, 'r', 'UTF-8');
		if ($watched2018mediatypefp) {
			$watched2018mediatypearray = explode("\n", fread($watched2018mediatypefp, filesize($watched2018mediatypefile)));
			$watched2018mediatypetxt = str_replace("^", "", $watched2018mediatypearray);
			$watched2018mediatypetxt = str_replace("\n", "", $watched2018mediatypetxt);
		}
	}	

	if (file_exists($watched2018timefile) == true) {
		$watched2018fp = fopen($watched2018timefile, 'r', 'UTF-8');
		if ($watched2018fp) {
			$watched2018timeroot = explode("\n", fread($watched2018fp, filesize($watched2018timefile)));
			$watched2018time = str_replace(";", ":", $watched2018timeroot);
			$watched2018time = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $watched2018time);
		}
	}

	if (file_exists($watched2018textfile) == true) {
		$watched2018fp = fopen($watched2018textfile, 'r', 'UTF-8');
		if ($watched2018fp) {
			$watched2018textroot = explode("\n", fread($watched2018fp, filesize($watched2018textfile)));
			$watched2018txt = str_replace(";", ":", $watched2018textroot);
			$watched2018txt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $watched2018txt);
		}
	}

	if (file_exists($watched2019mediatypefile) == true) {
		$watched2019mediatypefp  = fopen($watched2019mediatypefile, 'r', 'UTF-8');
		if ($watched2019mediatypefp) {
			$watched2019mediatypearray = explode("\n", fread($watched2019mediatypefp, filesize($watched2019mediatypefile)));
			$watched2019mediatypetxt = str_replace("^", "", $watched2019mediatypearray);
			$watched2019mediatypetxt = str_replace("\n", "", $watched2019mediatypetxt);
		}
	}

	if (file_exists($watched2019timefile) == true) {
		$watched2019fp = fopen($watched2019timefile, 'r', 'UTF-8');
		if ($watched2019fp) {
			$watched2019timeroot = explode("\n", fread($watched2019fp, filesize($watched2019timefile)));
			$watched2019time = str_replace("^", "", $watched2019timeroot);
			$watched2019time = str_replace("\n", "", $watched2019time);
		}
	}

	if (file_exists($watched2019textfile) == true) {
		$watched2019fp = fopen($watched2019textfile, 'r', 'UTF-8');
		if ($watched2019fp) {
			$watched2019textroot = explode("\n", fread($watched2019fp, filesize($watched2019textfile)));
			$watched2019txt = str_replace(";", ":", $watched2019textroot);
			$watched2019txt = str_replace("\n", "", $watched2019txt);
		}
	}

	if (file_exists($watched2020mediatypefile) == true) {
		$watched2020mediatypefp = fopen($watched2020mediatypefile, 'r', 'UTF-8');
		if ($watched2020mediatypefp) {
			$watched2020mediatypearray = explode("\n", fread($watched2020mediatypefp, filesize($watched2020mediatypefile)));
			$watched2020mediatypetxt = str_replace("^", "", $watched2020mediatypearray);
			$watched2020mediatypetxt = str_replace("\n", "", $watched2020mediatypetxt);
		}
	}

	if (file_exists($watched2020timefile) == true) {
		$watched2020fp = fopen($watched2020timefile, 'r', 'UTF-8'); 
		if ($watched2020fp) {
			$watched2020timearray = explode("\n", fread($watched2020fp, filesize($watched2020timefile)));
			$watched2020time = str_replace("^", "", $watched2020timearray);
			$watched2020time = str_replace("\n", "", $watched2020time);
		}
	}

	if (file_exists($watched2020textfile) == true) {
		$watched2020fp = fopen($watched2020textfile, 'r', 'UTF-8'); 
		if ($watched2020fp) {
			$watched2020txt = str_replace("^", "", $watched2020textarray);
			$watched2020txt = str_replace("\n", "", $watched2020txt);
		}
	}

	if (file_exists($twfile) == true) {
		$twfilefp = fopen($twfile, 'r', 'UTF-8');
		if ($twfilefp) {
			$twroot = explode("\n", fread($twfilefp, filesize($twfile)));
			$twtxt = str_replace("\n", "", $twroot);
		}
	}

	if (file_exists($twstatusfile) == true) {
		$twstatusfilefp = fopen($twstatusfile, 'r', 'UTF-8');
		if ($twstatusfilefp) {
			$twstatusroot = explode("\n", fread($twstatusfilefp, filesize($twstatusfile)));
			$twstatustxt = str_replace("\n", " ", $twstatusroot);
		}
	}

	if (file_exists($twmediafile) == true) {
		$twmediafilefp = fopen($twmediafile, 'r', 'UTF-8');
		if ($twmediafilefp) {
			$twmediaroot = explode("\n", fread($twmediafilefp, filesize($twmediafile)));
			$twmediatxt = str_replace("^", "", $twmediaroot);
			$twmediatxt = str_replace("\n", "", $twmediatxt);
		}
	}

	if (file_exists($twmediatypefile) == true) {
		$twmediatypefilefp = fopen($twmediatypefile, 'r', 'UTF-8');
		if ($twmediatypefilefp) {
			$twmediatyperoot = explode("\n", fread($twmediatypefilefp, filesize($twmediatypefile)));
			$twmediatypetxt = str_replace("^", "", $twmediatyperoot);
			$twmediatypetxt = str_replace("\n", "", $twmediatypetxt);
		}
	}

	$watchedmoviestxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $watchedmoviestxt);
	$twtxt = str_replace(array("\r\n", "\r", "\n"), "", $twtxt);
	$twstatustxt = str_replace(array("\r\n", "\r", "\n"), "", $twstatustxt);
	$twmediatxt = str_replace(array("\r\n", "\r", "\n"), "", $twmediatxt);
	$twmediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $twmediatypetxt);

	$watchedtxtarray = array(
	$watched2018txt = str_replace(array("\r\n", "\r", "\n"), "", $watched2018txt),
	$watched2019txt = str_replace(array("\r\n", "\r", "\n"), "", $watched2019txt),
	$watched2020txt = str_replace(array("\r\n", "\r", "\n"), "", $watched2020txt),
	);

	$watchedtimearray = array(
	$watched2018time = str_replace(array("\r\n", "\r", "\n"), "", $watched2018time),
	$watched2019time = str_replace(array("\r\n", "\r", "\n"), "", $watched2019time),
	$watched2020time = str_replace(array("\r\n", "\r", "\n"), "", $watched2020time),
	);

	$watchedmediatypearray = array(
	$watched2018mediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $watched2018mediatypetxt),
	$watched2019mediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $watched2019mediatypetxt),
	$watched2020mediatypetxt = str_replace(array("\r\n", "\r", "\n"), "", $watched2020mediatypetxt),
	);

	$watchednumb2018filetext = $watched2018number;
	$watchednumb2018 = $watchednumb2018filetext;

	$watchednumb2019filetext = $watched2019number;
	$watchednumb2019 = $watchednumb2019filetext;

	$watchednumb2020filetext = $watched2020number;
	$watchednumb2020 = $watchednumb2020filetext;

	$watchednumbfilearray = array(
	$watchednumb2018file = $watched2018number - 1,
	$watchednumb2019file = $watched2019number - 1,
	$watchednumb2020file = $watched2020number - 1,
	);

	$twnumbfile = $twnumber - 1;
	$twnumbfiletxt = $twnumber;
	$towatchnumb = $twnumbfiletxt;
	$watchedmoviesnumbfile = $moviesnumber - 1;
	$watchedmoviesnumbfiletext = $moviesnumber;
	$moviesnumb = $watchedmoviesnumbfiletext;
	$archnumb = 2;
	$linksnumb = 6;
	$watchednumbtxt = $watchednumb2020filetext;
	$everywatchednumb = $watchednumb2020filetext + $watchednumb2019filetext + $watchednumb2018filetext;

	$watchednumb2018array = array(2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51);
	$watchednumb2018timearray = array(1, 9, 10, 11, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 46, 47, 48, 49, 50, 51);
	$watchedmovie2018numbarray = array(0, 1, 3, 33, 23, 81, 148, 164);
	$watchedmovie2018timenumbarray = array(1, 4, 5, 6 , 7);
	$watchedmovie2019numbarray = array(23, 81, 148, 164);
	$watchedmovienumbarray = array(0, 1, 3, 33, 23, 81, 148, 164, 180);
	$watchedmovietimenumbarray = array(1, 4, 5, 6, 7, 8, 9, 10);
	$watchedmoviecommentarray = array(1, 4, 5, 6, 7, 8);

	if ($ano == 2018) {
		#Media lines array
		$linesarray = array(
		$moviesline = 1, #Movies
		$seriesline = 14, #Series
		$cartoonsline = 3, #Cartoons
		$animeline = '0', #Animes
		$videoline = 2, #Videos
		);
	}

	if ($ano == 2019) {
		#Media lines array
		$linesarray = array(
		$moviesline = 23, #Movies
		$seriesline = 10, #Series
		$cartoonsline = 2, #Cartoons
		$animeline = 7, #Animes
		$videoline = '0', #Videos
		);
	}

	if ($ano == 2020) {
		#Media lines array
		$linesarray = array(
		$animeline = 2, #Animes
		$cartoonsline = 62, #Cartoons
		$seriesline = 16, #Series
		$moviesline = 84, #Movies
		$videoline = '0', #Videos
		);
	}

	$yearnumber = 2;
	$watchednumbfile = $watchednumbfilearray[$yearnumber];
	$watchedtxtmedia = $watchedtxtarray[$yearnumber];
	$watchedtime = $watchedtimearray[$yearnumber];
	$watchedtype = $watchedmediatypearray[$yearnumber];
	$watchedtypefile = $watchedmediatypefilearray[$yearnumber];

	if (file_exists($watchedtypefile) == true) {
		$i = 0;
		$animesnumb = 0;
		while ($i <= $watchednumbfile) {
			if ($watchedtype[$i] == 'Anime') {
				$animesnumb++;
			}

			$i++;
		}
	}

	if (file_exists($watchedtypefile) == true) {
		$i = 0;
		$cartoonsnumb = 0;
		while ($i <= $watchednumbfile) {
			if ($watchedtype[$i] == 'Cartoon' or $watchedtype[$i] == 'Desenho' or $watchedtype[$i] == 'Cartoon^') {
				$cartoonsnumb++;
			}

			$i++;
		}
	}

	if (file_exists($watchedtypefile) == true) {
		$i = 0;
		$seriesnumb = 0;
		while ($i <= $watchednumbfile) {
			if ($watchedtype[$i] == 'Series' or $watchedtype[$i] == 'Série') {
				$seriesnumb++;
			}

			$i++;
		}
	}

	if (file_exists($watchedtypefile) == true) {
		$i = 0;
		$moviesnumb = 0;
		while ($i <= $watchednumbfile) {
			if ($watchedtype[$i] == 'Movie' or $watchedtype[$i] == 'Filme' or $watchedtype[$i] == 'Movie^' or $watchedtype[$i] == 'Filme^') {
				$moviesnumb++;
			}

			$i++;
		}
	}

	if (file_exists($watchedtypefile) == true) {
		$i = 0;
		$videonumb = 0;
		while ($i <= $watchednumbfile) {
			if ($watchedtype[$i] == 'Video' or $watchedtype[$i] == 'Vídeo') {
				$videonumb++;
			}

			$i++;
		}
	}

	#Media numbers array
	$medianumbers = array(
	$animesnumb, #Animes
	$cartoonsnumb, #Cartoons
	$seriesnumb, #Series
	$moviesnumb, #Movies
	$videonumb, #Videos
	);

	if (file_exists($twfile) == true) {
		$i = 0;
		$twitems = 0;
		while ($i <= $twnumbfile) {
			if (strpos ($twstatustxt[$i], 'w') == true) {
				echo '';
			}
			
			if (strpos ($twstatustxt[$i], 'tw') == true) {
				$twitems++;
			}

			$i++;
		}
	}
}

if ($website_name == $sitepequenata or $website_name == $sitenazzevo or $sitetype1 == $website_types_array[1]) {
	$story_folder = $notepad_stories_folder_variable.$story_name_folder.'/';
	$story_info_folder = $story_folder.'Story Info/';
	$story_comments_folder = $story_folder.'Comments/';
	$story_readers_and_reads_folder = $story_folder.'Readers and Reads/';

	# Story Synopsis, Readers, comments, readings,  and story date file paths
	$story_synopsis_file = $story_info_folder.'Synopsis.txt';
	$story_readers_file = $story_readers_and_reads_folder.'Readers.txt';
	$story_comments_file = $story_comments_folder.'Comments.txt';
	$story_comments_check_file = $story_comments_folder.'Check.txt';
	$story_creation_date_file = $story_info_folder.'Creation Date.txt';

	if ($website_name == $sitenazzevo) {
		$chapter_number_file = $story_folder.'ChaptersNumber.txt'; 
	}

	$chapter_number_file = $story_folder.'Chapter Number.txt'; 

	$titles_enus_file = $story_chapter_files_folder.strtoupper($enus_language).'/'.$titles_enus_text.'/'.$titles_enus_text.'.txt';

	# Language-dependent text files
	if (in_array($website_language, $en_languages_array)) {
		$titles_file = $story_chapter_files_folder_language.'/'.$titles_text.'/'.$titles_text.'.txt';
		$story_reads_file = $story_readers_and_reads_folder.'Reads'.'.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$titles_file = $story_chapter_files_folder_language.'/'.$titles_text.'/'.$titles_text.'.txt';
		$story_reads_file = $story_readers_and_reads_folder.'Leituras'.'.txt';
	}

	# File line number counters
	if (file_exists($titles_file) == true) {
		$chapters = 0;
		$handle = fopen ($titles_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$chapters++;
		}
	}

	if (file_exists($story_comments_file) == true) {
		$story_comments_number = 0;
		$handle = fopen ($story_comments_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$story_comments_number++;
		}
	}

	/*$file = $story_comments_check_file;
	if (file_exists($file) == true) {
		${str_replace("file", "number", "$file")} = 0;
		$handle = fopen ($file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			${str_replace("file", "number", print_var_name($story_comments_check_file))}++;
			$newvar = ${str_replace("file", "number", print_var_name($story_comments_check_file))};
		}
	}*/

	
	$file = $story_comments_check_file;
	if (file_exists($file) == true) {
		$comments_check_number = 0;
		$handle = fopen ($file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$comments_check_number++;
		}
	}


	if (file_exists($story_readers_file) == true) {
		$readersnumb = 0;
		$handle = fopen ($story_readers_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$readersnumb++;
		}
	}

	if (file_exists($story_reads_file) == true) {
		$readsnumb = 0;
		$handle = fopen ($story_reads_file, "r");
		while (!feof ($handle)){
			$line = fgets ($handle);
			$readsnumb++;
		}
	}

	#File line number fixers
    if (isset($story_comments_number)) {
        $cmntsfile = $story_comments_number - 1;
        $cmntstxt = $story_comments_number;
    }

    if (isset($readersnumb)) {
        $readers_file_number = $readersnumb - 1;
        $readerstxt = $readersnumb;
    }

    if (isset($readsnumb)) {
        $readsfilenumb = $readsnumb - 1;
        $readsfiletxt = $readsnumb;
    }

	#File text readers
	if (file_exists($titles_file) == true) {
		$fp = fopen($titles_file, 'r', 'UTF-8'); 
		if ($fp) {
			$titlestxt = explode("\n", fread($fp, filesize($titles_file)));
			$chapter_titles = str_replace("^", "", $titlestxt);
		}
	}

	if (file_exists($titles_enus_file) == true) {
		$fp = fopen($titles_enus_file, 'r', 'UTF-8'); 
		if ($fp) {
			$titlesenustxt = explode("\n", fread($fp, filesize($titles_enus_file)));
			$titlesenus = str_replace("^", "", $titlesenustxt);
		}
	}

	if (file_exists($story_readers_file) == true) {
		$fp = fopen($story_readers_file, 'r', 'UTF-8'); 
		if ($fp) {
			$story_readers_file = explode("\n", fread($fp, filesize($story_readers_file)));
			$readers = str_replace("^", "", $story_readers_file);
		}
	}

	if (file_exists($story_comments_file) == true) {
		$fp = fopen($story_comments_file, 'r', 'UTF-8'); 
		if ($fp) {
			$commentsfilearray = explode("\n", fread($fp, filesize($story_comments_file)));
			$comments = str_replace("|", "", $commentsfilearray);
		}
	}

	if (file_exists($story_reads_file) == true) {
		$fp = fopen($story_reads_file, 'r', 'UTF-8'); 
		if ($fp) {
			$readsfilearray = explode("\n", fread($fp, filesize($story_reads_file)));
			$readstxt = str_replace("|", "", $readsfilearray);
		}
	}

	if (file_exists($story_creation_date_file) == true) {
		$fp = fopen($story_creation_date_file, 'r', 'UTF-8'); 
		if ($fp) {
			$story_namedatetext = explode("\n", fread($fp, filesize($story_creation_date_file)));
			$story_namedate = str_replace("^", "", $story_namedatetext);
		}
	}

	if (file_exists($story_synopsis_file) == true) {
		$fp = fopen($story_synopsis_file, 'r', 'UTF-8'); 
		if ($fp) {
			$synopsistext = explode("\n", fread($fp, filesize($story_synopsis_file)));
			$story_synopsis = str_replace("^", "", $synopsistext);
		}
	}

	if (file_exists($story_synopsis_file)) {
		$story_synopsis = [];
		$file = $story_synopsis_file;

		if ($file = fopen($file, "r")) {
		while(!feof($file)) {
			$line = fgets($file);
			$line = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $line);

			array_push($story_synopsis, $line);
		}
			fclose($file);
		}
	}

	if ($website_name == $sitenazzevo) {
		if (file_exists($chapter_number_file) == true) {
			$fp = fopen($chapter_number_file, 'r', 'UTF-8'); 
			if ($fp) {
				$chapterstext = explode("\n", fread($fp, filesize($chapter_number_file)));
				$chapters = str_replace("^", "", $chapterstext);
			}
		}
	}

	if (file_exists($chapter_number_file) == true) {
		$fp = fopen($chapter_number_file, 'r', 'UTF-8');
		if ($fp) {
			$chapter_number_text = explode("\n", fread($fp, filesize($chapter_number_file)));
			$chapter_number = str_replace("^", "", $chapter_number_text);
		}
	}

	#File character replacers
    if (isset($titlesenus)) {
		$titlesenus = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $titlesenus);
    }

    if (isset($chapter_titles)) {
		$chapter_titles = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $chapter_titles);
    }

	if (isset($readers)) {
		$readers = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $readers);
	}

	if (isset($comments)) {
		$comments = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $comments);
	}

	if (isset($readstxt)) {
		$readstxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $readstxt);
	}

	if (isset($story_namedate)) {
		$story_namedate = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $story_namedate);
	}

	if (isset($story_synopsis)) {
		$story_synopsis = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $story_synopsis);
	}

	if ($website_name == $sitenazzevo) {
		$chapters = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $chapters);
	}
}

if ($sitehaschangelog == true) {
	#Changelog text file definer
	if ($website_name == $sitewatch) {
		if (in_array($website_language, $en_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$languages_array[1].'.php';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$languages_array[2].'.php';
		}
	}

	#Changelog text file definer
	else {
		if (in_array($website_language, $en_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$languages_array[1].'.txt';
		}

		if (in_array($website_language, $pt_languages_array)) {
			$website_changelog_file = $selected_website_folder.'Changelog '.$languages_array[2].'.txt';
		}
	}

	if (file_exists($website_changelog_file) == true) {
		#Changelog number counter
		$clnumber = 0;
		$handle = fopen ($website_changelog_file, "r");
		while (!feof ($handle)) {
			$line = fgets ($handle);
			$clnumber++;
		}
	
		#Changelog number
		$clfile = $clnumber - 1;
		$clfiletext = $clnumber;
	
		#Changelog file reader
		$clfilefp = fopen ($website_changelog_file, 'r', 'UTF-8');
		if ($clfilefp) {
			$clroot = explode("\n", fread($clfilefp, filesize($website_changelog_file)));
			$website_changelog_file_text = str_replace("^", "", $clroot);
		}
	}
}

?>