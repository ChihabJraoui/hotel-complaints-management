<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{

	protected $fillable = ['picturable_id', 'picturable_type', 'filename', 'extension', 'is_cover'];


	/*
	 *  Relationships
	 */

	public function picturable()
	{
		return $this->morphTo();
	}


	/*
	 *  Custom Attributes
	 *  ------------------------------------------
	 */

	public function getUri()
	{
		if(empty($this->picturable_type))
		{
			return asset('storage/gallery/' . $this->filename);
		}
		else
		{
			return asset('storage/tours/' . $this->filename);
		}
	}

	public function getPath()
	{
		$file = $this->attributes['filename'];

		if(empty($this->attributes['picturable_type']))
		{
			return public_path('storage/gallery/') . $file;
		}
		else
		{
			return public_path('storage/tours/') . $file;
		}
	}

	public function getThumbnail($width, $height, $path = false)
	{
		$file = $this->attributes['filename'];

		$thumbnail_dir = $width . 'x' . $height .'/';

		if(empty($this->attributes['picturable_type']))
		{
			$file_path = 'storage/gallery/'. $thumbnail_dir . $file;
		}
		else
		{
			$file_path = 'storage/tours/'. $thumbnail_dir . $file;
		}

		if ($path)
		{
			return public_path($file_path);
		}
		else
		{
			return asset($file_path);
		}
	}
}