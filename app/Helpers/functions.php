<?php

/**
 * Format date from "2019-01-01T11:11:11Z" to "2019-01-01 11:11:11"
 */
function date_fix_tz($date)
{
	if (strlen($date) == 20) {
		$date = substr($date, 0, 19); // Remove "Z" at the end
		$date = str_replace('T', ' ', $date); // Remove "T" in the middle
	}

	return $date;
}


function add_first_zero($value): string
{
	$return = str_pad($value, 2, '0', STR_PAD_LEFT);

	return $return;
}

function get_user_ip()
{
	$client = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote = $_SERVER['REMOTE_ADDR'];

	if (filter_var($client, FILTER_VALIDATE_IP)) {
		$ip = $client;
	}
	else if (filter_var($forward, FILTER_VALIDATE_IP)) {
		$ip = $forward;
	}
	else {
		$ip = $remote;
	}

	return $ip;
}

function array_sum_only_numeric($array)
{
	$sum = 0;

	foreach ($array as $row) {
		$int_row = (int)filter_var($row, FILTER_SANITIZE_NUMBER_INT);
		$sum = $sum + $int_row;
	}

	return $sum;
}

function float_to_int($float_value): float
{
	// 39.30 to INT: Fix for floats like : 3929.9999999999995452526491135358810424804688
	// Example:
	//echo sprintf('%.40F', 39.30 * 100);

	return round((($float_value) * 100), 2);
}

function int_to_float($int_value): float|int
{
	return ($int_value / 100);
}

function flat_array($array): array
{
	$result = [];

	if (is_array($array) && count($array) > 0) {
		foreach ($array as $data) {
			if (is_array($data) && count($data) > 0) {
				foreach ($data as $value) {
					$result[] = $value;
				}
			}
		}
	}

	return $result;
}

/**
 * Check if the ISO date is valid
 * @param string $str ISO date (YYYY-MM-DD) to test.
 **/
function is_valid_date(string $str): bool
{
	$pattern = "/^(\d{4})-(\d{2})-(\d{2})$/";

	if (preg_match($pattern, $str, $matches)) {
		if (checkdate($matches[2], $matches[3], $matches[1])) {
			return true;
		}
	}

	return false;
}

/**
 * Check if the ISO time is valid
 * If "short" is specified (= true) - use hh:mm format
 * @param string  $str   ISO time (hh:mm:ss) to test.
 * @param boolean $short OPTIONAL. If the time contains seconds or not.
 **/
function is_valid_time(string $str, bool $short = false): bool
{
	if ($short) {
		$pattern = "/^([01][0-9]|2[0-3]):([0-5][0-9])$/";
	}
	else {
		$pattern = "/^([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/";
	}

	if (preg_match($pattern, $str, $matches)) {
		if ($matches[1] >= 0 && $matches[1] <= 23 && $matches[2] >= 0 && $matches[2] <= 59) {
			if (! $short) {
				if ($matches[3] >= 0 && $matches[3] <= 59) {
					return true;
				}
				else {
					return false;
				}
			}

			return true;
		}
	}

	return false;
}

/**
 * Check URL for correct syntax
 * @param string $url URL to test.
 **/
function check_url(string $url): bool|int
{
	$pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
	$test = preg_match($pattern, $url);

	return $test;
}

/**
 * Return TRUE if a string is a longitude or a longitude
 * @param string $str Longitude or longitude.
 **/
function is_lat_long(string $str): bool|int
{
	$pattern = "/^([-.,0-9]+)\$/";
	$test = preg_match($pattern, $str);

	return $test;
}

/**
 * Return TRUE if a string contains only numbers
 * @param string $str String to test.
 **/
function only_numbers(string $str): bool|int
{
	$str = str_replace('&#034;', '"', $str);
	$str = str_replace('&#039;', "'", $str);
	$pattern = "/^([.0-9]+)\$/";

	return preg_match($pattern, $str);
}

/**
 * Return a string with only numbers
 * (delete all other chars)
 * @param string $str String to test and clean.
 * @return string        Cleaned string.
 **/
function leave_only_numbers(string $str): string
{
	$str = str_replace('&#034;', '"', $str);
	$str = str_replace('&#039;', "'", $str);
	$pattern = '/[^0-9]*/';

	return preg_replace($pattern, '', $str);
}

/**
 * Return TRUE if a string contains only letters and 3 special characters: ['], [-] and [ ]
 * @param string $str String to test
 **/
function only_chars(string $str): bool|int
{
	$str = str_replace('&#034;', '"', $str);
	$str = str_replace('&#039;', "'", $str);
	$pattern = "/^([a-z àáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞß.’'\-]+)\$/i";

	return preg_match($pattern, $str);
}

/**
 * Return a string with only letters and 3 special characters: ['], [-] and [ ]
 * (delete all other chars)
 * @param string $str String to test and clean.
 * @return string        Cleaned string.
 **/
function leave_only_chars(string $str): string
{
	$str = str_replace('&#034;', '"', $str);
	$str = str_replace('&#039;', "'", $str);
	$pattern = '/[^a-zA-Z àáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞß.’\'\-]*/';

	return preg_replace($pattern, '', $str);
}

/**
 * Return TRUE if a string contains only numbers, letters and 3 special characters: ['], [-] and [ ]
 * @param string $str String to test.
 **/
function only_alpha_num(string $str): bool|int
{
	$str = str_replace('&#034;', '"', $str);
	$str = str_replace('&#039;', "'", $str);
	$pattern = "/^([a-z0-9 àáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞß.’'\-]+)\$/i";

	return preg_match($pattern, $str);
}

/**
 * Return a string with only numbers, letters and 3 special characters: ['], [-] and [ ]
 * (delete all other chars)
 * @param string $str String to test and clean.
 * @return string        Cleaned string.
 **/
function leave_only_alpha_num(string $str): string
{
	$str = str_replace('&#034;', '"', $str);
	$str = str_replace('&#039;', "'", $str);
	$pattern = '/[^a-zA-Z0-9 àáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞß.’\'\-]*/';

	return preg_replace($pattern, '', $str);
}

/**
 * Check email syntax in 3 steps
 * @param string $email
 * @return bool
 **/
function check_email(string $email): bool
{
    // Define a regular expression pattern for a valid email address
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    // Use the preg_match function to check if the email matches the pattern
    if (preg_match($pattern, $email)) {
        return true; // Valid email format
    }
    else {
        return false; // Invalid email format
    }
}

/**
 * Check phone number
 * @param string $phone
 * @return bool
 * (555) 555-5555
 * 555-555-5555
 */
function check_phone(string $phone): bool
{
	$pattern1 = "/^\(\d{3}\) \d{3}-\d{4}$/";
	$pattern2 = "/^\d{3}-\d{3}-\d{4}$/";

	if (!preg_match($pattern1, $phone) && !preg_match($pattern2, $phone)) {
		return false;
	}

	return true;
}

function is_email($email): bool
{
	return check_email($email);
}

/**
 * Return TRUE if a string is a valid IP address
 * @param string $ip_address IP address.
 **/
function check_ip_address(string $ip_address): bool
{
	$pattern = "/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/";
	$test = preg_match($pattern, $ip_address);

	if (empty($ip_address)) {
		return false;
	}

	if (strlen($ip_address) > 15) {
		return false;
	}

	if ($test) {
		$parts = explode('.', $ip_address);

		if (is_array($parts) && count($parts) > 0) {
			foreach ($parts as $ip_parts) {
				if (intval($ip_parts) > 255 || intval($ip_parts) < 0) {
					return false;
				}
			}
		}

		return true;
	}
	else {
		return false;
	}
}

function is_md5($md5 = ''): bool|int
{
	return preg_match('/^[a-z0-9]{32}$/', $md5);
}

function words_limit($str, $limit)
{
	$test_length = preg_split("/\s+/", $str);
	$arr = preg_split("/\s+/", $str, $limit + 1);
	$arr = array_slice($arr, 0, $limit);

	if (is_array($test_length) && count($test_length) > $limit) {
		$out = join(' ', $arr) . '...';

		return $out;
	}

	return $str;
}

/**
 * Sub string from left.
 * @param string  $str    String to work with.
 * @param integer $length Length on chars to return.
 * @return string                Cut string from the right.
 **/
function left(string $str, int $length): string
{
	$out = substr($str, 0, $length);

	return $out;
}

/**
 * Sub string from middle.
 * @param string  $str    String to work with.
 * @param integer $start  Start position for the substring.
 * @param integer $length Length on chars to return.
 * @return string                Cut string from the left.
 **/
function mid(string $str, int $start, int $length): string
{
	$out = substr($str, $start, $length);

	return $out;
}

/**
 * Sub string from right.
 * @param string  $str    String to work with.
 * @param integer $length Length on chars to return.
 * @return string            Cut string from left and right.
 **/
function right(string $str, int $length): string
{
	$out = substr($str, -$length);

	return $out;
}

/**
 * Recursively remove directory and files.
 * @param string $dir Directory.
 **/
function rmdir_rec(string $dir): void
{
	$files = array_diff(scandir($dir), ['.', '..']);

	foreach ($files as $file) {
		$path = $dir . '/' . $file;
		$path = str_replace('//', '/', $path);

		if (is_dir($path)) {
			rmdir_rec($path);
		}
		else {
			unlink($dir . '/' . $file);
		}
	}

	rmdir($dir);
}

/**
 * Cut the string after a limit of chars and add 3 dots at the end.
 * @param string $str   String to work with.
 * @param int    $limit Number of chars to leave in the string.
 * @return string            Cut string with 3 dots at the end.
 */
function string_limit(string $str, int $limit): string
{
	if (strlen($str) > $limit) {
		$words = str_word_count($str, 2);
		$pos = array_keys($words);
		$str = substr($str, 0, $pos[$limit]) . '...';
	}

	return $str;
}

/**
 * Generate a 32 chars string.
 */
function random_str($length = 32): string
{
	$salt = str_split('abcdefghijklmnopqrstuvwxyz0123456789');
	$saltLength = count($salt) - 1;
	$str = '';

	for ($i = 0; $i < $length; $i++) {
		$tmp = $salt[mt_rand(0, $saltLength)];
		$str .= substr(md5($tmp), $i, 1);
	}

	return $str;
}

/**
 * Capitalize segments of a name and put the rest into lower case.
 * @param string $str   String to work with.
 * @param array  $chars OPTIONAL. Array of chars to split. By default: "'", "-", " ".
 * @return string            String with uppercase the first character of each word in a string.
 **/
function ucfirst_extended(string $str, array $chars = ["'", "-", " "]): string
{
	// $str contains the complete raw name string
	// $chars is an array containing the characters we use as separators for capitalization
	// If you don't pass anything, there are three in there as default
	$string = strToLower($str);

	if (is_array($chars) && count($chars) > 0) {
		foreach ($chars as $temp) {
			$pos = strpos($string, $temp);

			if ($pos >= 0) {
				// We are in the loop because we found one of the special characters in the array,
				// so lets split it up into chunks and capitalize each one
				$mend = '';
				$split = explode($temp, $string);

				if (is_array($split) && count($split) > 0) {
					foreach ($split as $temp2) {
						// Capitalize each portion of the string
						// which was separated at a special character
						$mend .= ucfirst($temp2) . $temp;
					}
				}

				$string = substr($mend, 0, -1);
			}
		}
	}

	$out = ucfirst($string);

	return $out;
}

/**
 * Round a number to float representation with 2 digits at the end.
 * @param integer $num Number to format.
 * @return float                Rounded float with 2 digits after the dot.
 **/
function round_float(int $num): float
{
	$out = sprintf("%01.2f", round($num, 2));

	return $out;
}

/**
 * Parse and explode a canadian postal code.
 * @param string $postal_code Canadian postal code.
 * @param string $index
 * @return array|string Array with 4 elements of postal code with different formatting.
 *                            Example, for "A1A 2B2":
 *                            [0] => A1A
 *                            [1] => 2B2
 *                            [2] => A1A 2B2
 *                            [3] => A1A2B2
 */
function canadian_pc_to_array(string $postal_code, string $index = ''): array|string
{
	$postal_code = strToUpper($postal_code);
	$postal_code = str_replace(' ', '', $postal_code);
	$postal_code = str_replace("\t", '', $postal_code);
	$postal_code_part1 = substr($postal_code, 0, 3);
	$postal_code_part2 = substr($postal_code, 3, 3);

	$out = [];
	$out[] = $postal_code_part1; // 0
	$out[] = $postal_code_part2; // 1
	$out[] = $postal_code_part1 . ' ' . $postal_code_part2; // 2
	$out[] = $postal_code_part1 . $postal_code_part2; //3

	if ($index == '') {
		return $out;
	}

	return $out[$index];
}

/**
 * Parse and explode a phone number.
 * @param string $phone American phone with area code (10 digits).
 * @param string $index
 * @return array|string Array with 8 elements of phone with different formatting.
 *                      Example, for "514-555-6677":
 *                      [0] => 514
 *                      [1] => 555
 *                      [2] => 6677
 *                      [3] => 514 555-6677
 *                      [4] => 514-555-6677
 *                      [5] => (514) 555-6677
 *                      [6] => 1 514 555-6677
 *                      [7] => 1 514-555-6677
 */
function phone_to_array(string $phone, string $index = ''): array|string
{
	$out = [];

	if ($phone == '') {
		return $phone;
	}

	$phone = str_replace(' ', '', $phone);
	$phone = str_replace("\t", '', $phone);
	$phone = str_replace('(', '', $phone);
	$phone = str_replace(')', '', $phone);
	$phone = str_replace('-', '', $phone);

	$phone_part1 = substr($phone, 0, 3);
	$phone_part2 = substr($phone, 3, 3);
	$phone_part3 = substr($phone, 6, 4);

	$out[] = $phone_part1;
	$out[] = $phone_part2;
	$out[] = $phone_part3;
	$out[] = $phone_part1 . ' ' . $phone_part2 . '-' . $phone_part3;
	$out[] = $phone_part1 . '-' . $phone_part2 . '-' . $phone_part3;
	$out[] = '(' . $phone_part1 . ') ' . $phone_part2 . '-' . $phone_part3;
	$out[] = '1 ' . $phone_part1 . ' ' . $phone_part2 . '-' . $phone_part3;
	$out[] = '1 ' . $phone_part1 . '-' . $phone_part2 . '-' . $phone_part3;

	if ($index == '') {
		return $out;
	}

	return $out[$index];
}

/**
 * Removes harmful <script> and <table> tags from the input,
 * strips out white spaces, removes/replaces some html entities.
 * @param string $str String to work with.
 * @return string        HTML code to show on the page, encoded with UTF-8, with line breaks.
 **/
function print_html_code(string $str): string
{
	$text = trim($str);
	$text = htmlentities($text, ENT_QUOTES, 'UTF-8');
	$text = str_replace("\n", '', $text);
	$text = str_replace("\r", '<br />', $text);
	$text = stripslashes($text);

	return $text;
}

/**
 * Return extension of script name.
 * @param string $str String to work with.
 * @return string            File extension without dot.
 **/
function get_file_extension(string $str): string
{
	$str = strrev($str);
	$out = explode('.', $str, 2);
	$out = strToLower(strrev($out[0]));

	return $out;
}

/**
 * Return TRUE if remote file exists.
 * @param string $url URL to test.
 * @return boolean            true/false if remote file exists.
 **/
function remote_file_exists(string $url): bool
{
	if (@fclose(@fopen($url, 'r'))) {
		return true;
	}

	return false;
}

/**
 * Return file size in B, KB, MB etc.
 * @param integer $size Number of bytes.
 * @return string            Well formatted size.
 **/
function bytes_to_string(int $size = 0, int $precision = 2): string
{
	if ($size != 0) {
		$units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
		$base = floor(log($size, 1024));
		$return = round($size / pow(1024, $base), $precision) . ' ' . $units[$base];

		return $return;
	}

	return '0 B';
}

function mb_ucfirst($str, $encoding = 'UTF-8', $lower_str_end = false): string
{
	$first_letter = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding);

	if ($lower_str_end) {
		$str_end = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encoding), $encoding), $encoding);
	}
	else {
		$str_end = mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
	}

	$str = $first_letter . $str_end;

	return $str;
}

function base64_url_encode($data): string
{
	return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64_url_decode($data): bool|string
{
	return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '='));
}

function explode_not_empty($separator, $array): array
{
	$exploded = explode($separator, $array);
	$exploded = array_filter($exploded, function ($var)
	{
		return (trim($var) !== '');
	});

	return $exploded;
}

function implode_not_empty($separator, $array): string
{
	$array = array_filter($array, function ($var)
	{
		return (trim($var) !== '');
	});

	return implode($separator, $array);
}
