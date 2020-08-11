<?php

namespace App\Http\Controllers;

use App\Http\AssetBankApi;
use Illuminate\Http\Request;

class DigitalSignageController extends Controller
{
    public $assetBank;

    public function __construct(AssetBankApi $assetBank)
    {
        $this->assetBank = $assetBank;
    }

    public function test()
    {
//        dd($this->assetBank->guzzle->get("assets/8124"));
        dd($this->assetBank->request("GET", "assets/8124"));
    }
}
