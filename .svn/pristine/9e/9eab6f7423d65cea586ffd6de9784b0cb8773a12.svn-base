function getUrl(route = null) {
	var $url = location.protocol + '//' + location.host;
	return route !== null ? $url + route : $url;
}

function addOrSubstractQty($value, $string) {
	if ($string.indexOf('prod-plus') >= 0) {
		$value += 1;
	} else if($string.indexOf('prod-minus') >= 0) {
		if ($value > 1) {
			$value -= 1;
		}
	}
	return $value;
}

function getSecondPart(str) {
    return str.split('.').pop();
}

function getFirstPart(str) {
    return str.split('.')[0];
}