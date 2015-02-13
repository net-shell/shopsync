<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract {

	use Authenticatable;
	protected $guarded = ['remember_token'];

	public function products()
	{
		return $this->hasMany('Netshell\ShopSync\Models\Product');
	}

	function getAvatarAttribute()
	{
		$apiUrl = $this->attributes['avatar'];
		if(strlen($apiUrl)) {
			$cacheId = 'avatar_'. $this->attributes['id'];
			return app()->make('cache')->remember($cacheId, 60, function() use ($apiUrl) {
				$client = new HttpClient();
				$response = $client->get($apiUrl)->send();
				$imageData = (string)$response->getBody();
				$imageData = base64_encode($imageData);
				$imageType = (string)$response->getHeader('Content-Type');
				return "data:$imageType;base64,$imageData";
			});
		}
		return null;
	}

}