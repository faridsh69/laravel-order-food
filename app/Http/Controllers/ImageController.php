<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
	public function getUserProfile($image_id, $filename)
	{
		$exploded_filename = explode('.', $filename);
		$file_extention = str_replace("jpeg", "jpg", $exploded_filename[sizeof($exploded_filename) - 1]);
		$output_width = 100;
		$output_height = 100;
		// $output = \Cache::remember($this->_long_cache_time, function () use ($file_extention, $filename, $image_id, $output_width, $output_height) {
		$base_image = \App\Models\Image::where('id', $image_id)->where('original_name', $filename)->first()->data;
		$image = \Image::make($base_image);
		return $image->response($file_extention);
	}

	// private function _scale_size($old_width, $old_height, $new_width, $new_height)
	// {
	// 	if ($old_height >= $old_width && $new_width > 0) {
	// 		$scale = intval($new_width) / intval($old_width);
	// 		$output['width'] = intval($new_width);
	// 		$output['height'] = intval($old_height * $scale);
	// 	} else {
	// 		$scale = intval($new_height) / intval($old_height);
	// 		$output['width'] = intval($old_width * $scale);
	// 		$output['height'] = intval($new_height);
	// 	}
	// 	if ($output['width'] == null) {
	// 		$output['width'] = $old_width * $scale;
	// 	}
	// 	if ($output['height'] == null) {
	// 		$output['height'] = $old_height * $scale;
	// 	}

	// 	return $output;
	// }
}
