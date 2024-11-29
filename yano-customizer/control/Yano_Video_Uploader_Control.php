<?php
namespace Control;

use Inc\Attachment\Yano_Attachment_Inc;

defined( 'ABSPATH' ) || exit;

/**
 * Yano Video Uploader Control.
 *
 * @since   1.0.0
 * @version 1.0.0
 */
final class Yano_Video_Uploader_Control extends \WP_Customize_Control {


	/**
	 * List of valid extensions [ ''mp4', 'm4v',  'mov', 'wmv', 
	 * 'avi', 'mpg', 'ogv', '3gp', '3g2', 'mpg ].
	 *
	 * @since 1.0.0
	 * 
	 * @var array
	 */
	public $extensions;


	/**
	 * Holds the placeholder.
	 *
	 * @since 1.0.0
	 * 
	 * @var string
	 */
	public $placeholder;


	/**
	 * Instantiating Yano_Attachment_Inc and return object attachment.
	 *
	 * @since 1.0.0
	 * 
	 * @return object
	 */
	private function attachment() {
		$attachment = new Yano_Attachment_Inc( [
			'type'			=> 'video',
			'id'			=> $this->id,
			'label'			=> $this->label,
			'description'	=> $this->description,
			'placeholder'	=> $this->placeholder,
			'extensions'	=> $this->extensions,
			'value'			=> $this->value()
		]);
		return $attachment;
	}


	/**
	 * Render the video controller and display in frontend.
	 *
	 * @since 1.0.0
	 * 
	 * @return html
	 */
	public function render_content() {
		$this->attachment()->create();
	}
}