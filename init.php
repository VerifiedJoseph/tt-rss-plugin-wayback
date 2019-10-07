<?php
class Wayback extends Plugin {
	private $host;

	function about() {
		return array(1.0,
			"Save articles to the Internet Archive's Wayback Machine",
			"VerifiedJoseph");
	}

	/* @var PluginHost $host */
	function init($host) {
		$this->host = $host;

		$host->add_hook($host::HOOK_ARTICLE_BUTTON, $this);
	}

	function hook_article_button($line) {
		return "<i id='SHARE-IMG-".$line['int_id']."' class='material-icons'
			style='cursor : pointer'
			title='".__('Save article to the Wayback Machine')."' onclick=\"window.open('https://web.archive.org/save/". urlencode($line['link')] ."', '_blank')\">save</i>";
	}

	function api_version() {
		return 2;
	}

}
