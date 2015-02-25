<?php namespace Netshell\Sync\Star;

use Netshell\Sync\ModelContainer;

class Center extends ModelContainer {

	static function fromCollection($centers) {
		$result = array();
		foreach ($centers as $center) {
			$result[] = new Center($center);
		}
		return collect($result);
	}

}