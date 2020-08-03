<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpSmug;
use stdClass;

class SmugMugController extends Controller
{
    //
//    public $api_key='lKDuCaYbAGRdkTgnhbbLcgCK7EddinlQ';
    public $api_key='Z7C8b59zBfhwfbDbVjNwKLxRzz5BLqdZ';
    public $options=['AppName' => 'Cranleigh AssetBankAPI/1.0 (https://assetbankapi.cranleigh.org)', '_shorturis' => false];
    public $username = 'cranleigh';

	private function smugmugSettings() {
		return [
			"cranleigh" => [],
			"cranprep" => [
				"api_key" => "Z7C8b59zBfhwfbDbVjNwKLxRzz5BLqdZ",
				"oauth_token" => "mGw3w9svH9dmGgnDvmm2Wc7zR9STZdf3",
				"oauth_verifier" => "793196"
			]
		];
	}
    public function __construct() {
	    $this->smug = new phpSmug\Client($this->api_key, $this->options);
	    $this->smug->oauth_token = 'jvNtTxvfHG8nkDS94z2dgMtsr8rQk95B';
	    $this->smug->oauth_token_secret = 'BkDLTSjH9pvWVJMfRNGTzPstr3dnMX2qnzbthfVKsDW3d73vrLLZfFgSZg5Xgq5M';
    }
    public function test() {
	    $this->smug = new phpSmug\Client($this->api_key, $this->options);
	    $repositories = $this->smug->get('user/cranleigh!albums');
	    $result = new stdClass;
	    $result->result = $repositories;
//	    var_dump($repositories);
		return response()->json($result);
    }
    
    public function base($username, $endpoint) {
	    $repositories = $this->smug->get('api/v2/user/'.$username.'!'.$endpoint);
		$result = new stdClass;
	    $result->result = $repositories;
	    $result->oauth = $this->smug->oauth_token_secret;

		return response()->json($result);
    }
}
