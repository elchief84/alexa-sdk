<?php

require_once dirname( dirname( __FILE__ ) ) . '/src/alexa-sdk.php';

use Alexa\Media\Podcast_Skill;

class CT_Uplink_Podcast extends Podcast_Skill {

	public function __construct( $application_id ) {
		$this->text_launch         = 'Willkommen bei CT Uplink! Welche Folge willst Du hören?';
		$this->text_end            = 'Ach mensch hier iss doch so jemütlich! Naja, dann geh doch!';
		$this->text_failed         = 'Man man man, Du muss schon deutlicher sprechen';
		$this->text_start          = '%s';
		$this->text_item_not_found = 'Ich kann die Folge nicht finden. Suche Dir ne Folge zwischen %d und %d aus!';

		$this->podcast_url = 'https://www.heise.de/ct/uplink/ctuplink.rss';

		parent::__construct( $application_id );
	}
}

$podcast = new CT_Uplink_Podcast( 'amzn1.ask.skill.83b2acd2-da0f-468c-ad4e-22c24e86759c' );

try {
	$podcast->run();
} catch ( Exception $exception ) {
	$podcast->log( $exception->getMessage() );
	echo $exception->getMessage();
}