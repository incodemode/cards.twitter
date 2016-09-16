<?php
	
	namespace App\Http\Controllers;

	use Request;
	use App\Models\Card;
	use Illuminate\Routing\Controller as BaseController;

	class CardController extends BaseController
	{

		public function index(){
			return view ('card.index');
		}
		public function show($id){

			return view ('welcome');


		}

		public function store(){
			\Log::info('llega a store');
			$parameters = Request::only(
				// twitter basic
				'twitter_card', 'twitter_site', 'twitter_creator', 'twitter_title', 'twitter_description', 
				// twitter media
				'twitter_image', 'twitter_stream', 'twitter_player_stream', 
				// youtube info
				'youtube_url', 'youtube_url', 'youtube_code', 
				//local info
				'slug');
			$card = Card::create($parameters);
			$card->save();
			return view ('welcome');


		}

		public function getYoutubeParameters(){

			$url = 'https://www.youtube.com/watch?v=kOkQ4T5WO9E';
			$youtube_image_url = 'http://img.youtube.com/vi/«youtube_code»/0.jpg';
			$youtube_code = preg_replace('#^(.*)v=([0-9A-Za-z-_]*)(.*)$#','$2',$url);
			$youtube_image = str_replace('«youtube_code»', $youtube_code, $youtube_image_url);
			$youtube_info = $this->get_from_api($youtube_code);
			
			$youtube_title = $youtube_info->title;
			$youtube_description = $youtube_info->description;

			//\Log::info($youtube_page);
			\Log::info($youtube_title);
			\Log::info($youtube_description);
			\Log::info($youtube_image);
			\Log::info($youtube_code);
		}
		public function get_from_api($youtube_code){
			$youtube_api_url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet%20&id=«youtube_code»&key=AIzaSyBbQb7NtqlRjKplAgcK0eduyuHJ5Er61ww';
			$get_url = str_replace('«youtube_code»',$youtube_code,$youtube_api_url);
			$json_youtube_snippet = file_get_contents($get_url);
			$snippets = json_decode($json_youtube_snippet);
			if(!$snippets || !isset($snippets->items) || !array_key_exists(0,$snippets->items) || !isset($snippets->items[0]->snippet)){
				return null;
			}
			$snippet = $snippets->items[0]->snippet;
			
			return $snippet;
			
		}
		

	}
	
?>