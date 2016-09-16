<?php

namespace App\Models;

use Eloquent;

class Card extends Eloquent
{

	protected $table = 'card';
	protected $fillable = ['twitter_card', 'twitter_site', 'twitter_creator', 'twitter_title', 'twitter_description', 
				// twitter media
				'twitter_image', 'twitter_stream', 'twitter_player_stream', 
				// youtube info
				'youtube_url', 'youtube_url', 'youtube_code', 
				//local info
				'slug'];
}