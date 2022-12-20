<?php 

# Language

class Language extends Class_ {
	public function __construct() {
		global $folders;

		parent::__construct(self::class);

		$this -> folders = $folders;

		$this -> Define_Languages();
	}

	private function Define_Languages() {
		$this -> languages = json_decode(file_get_contents($this -> folders["apps"]["app_text_files"]["language"]["languages"]), true);
		array_splice($this -> languages["small"], 0, 0, "general");

		$array = $this -> languages["full"];

		$this -> languages["full"] = [
			"general" => "General",
		];

		foreach (array_keys($array) as $key) {
			$this -> languages["full"][$key] = $array[$key];
		}

		unset($array);
	}

	public function Define_User_Language() {
		global $website;

		$this -> user_language = $website["language"];

		$website["language"] = $this -> user_language;
		$website["full_language"] = $this -> user_language;

		$i = 0;
		foreach ($this -> languages["small"] as $language) {
			$full_language = $this -> languages["full"][$language];

			if ($this -> user_language == $full_language) {
				$this -> user_language = $language;

				$website["language_number"] = $i;
			}

			$c = 0;
			foreach (array_keys($this -> languages["full_translated"]) as $key) {
				foreach (array_values($this -> languages["full_translated"][$key]) as $full_translated_language) {
					if ($this -> user_language == $full_translated_language) {
						$this -> user_language = $key;

						$website["language_number"] = $i;
					}
				}

				$c++;
			}

			$i++;
		}

		$this -> full_user_language = $this -> languages["full"][$this -> user_language];

		$website["language"] = $this -> user_language;
		$website["full_language"] = $this -> full_user_language;

		$website["texts"] = File::JSON($this -> folders["php"]["classes"]["text_files"]["texts"]);
		$website["language_texts"] = self::Item($website["texts"]);

		$this -> texts = $website["texts"];
		$this -> language_texts = $website["language_texts"];

		$website["language_icon"] = $website["language_texts"]["language_icon"];
	}

	public static function Item($item) {
		global $website;

		$language = $website["language"];

		if ($website["language"] == "general") {
			$language = "en";
		}

		if (is_array($item) == True and isset($item[$language]) == True) {
			return $item[$language];
		}

		if (is_array($item) == True and isset($item[$language]) == False) {
			$array = $item;

			foreach (array_keys($array) as $key) {
				if (isset($item[$key]) == True and isset($item[$key][$language]) == True) {
					$array[$key] = $item[$key][$language];
				}
			}

			return $array;
		}
	}
}

?>