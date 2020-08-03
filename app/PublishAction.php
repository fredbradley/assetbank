<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublishAction extends Model
{
	protected $table = 'publishaction';
	public $fillable = ['ServerName'];
	public $primaryKey = "Id";
	public $timestamps = false;

	


	public function searchCriteria() {

		return $this->hasMany('App\SearchCriteria', 'Id', 'SearchCriteriaId');

	}
	
	public function getruntimeAttribute() {
		
		return date("Y-m-d H:i:s", $this->attributes['LastRunTime'] / 1000);

	}


}
