<?php

class Keyphrase {
	public function getKeyphrase($sentence, $output, $callback) {
		$ini = parse_ini_file(dirname(__FILE__).'/config.ini');
		$appid = $ini['keyphraseappid'];
		$url = $ini['keyphraseurl'];
		$data = array();
		if($output=="json" && $callback!="") {
			$data = array(
				'sentence' => $sentence
				,'output' => $output
				,'callback' => $callback
			);
		} else {
			$data = array(
				'sentence' => $sentence
				,'output' => $output
			);
		}
		$options = array('http' => array(
			'method' => 'POST'
			,'header' => 'User-Agent: Yahoo AppID: '.$appid
			,'content' => http_build_query($data)
		));
		return file_get_contents($url, false, stream_context_create($options));
	}
}

?>