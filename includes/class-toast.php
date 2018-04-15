<?php
namespace Haosf_Social_Proof_Toaster;
class Toast{
	private $html;

	public function __construct() {
		$this->populate();
	}

	protected function populate() {
		$image_source = $this->get_image();
		$close_image  = $this->get_close_image();
		$heading     = $this->get_heading();
		$this->html  = <<<HTML
<div class="haosf_toast_container_side_image">
    <img class="" src="$image_source">
</div>
<div class="haosf_toast_wrapper_heading">
    <div class="haosf_toast_container_heading">
        $heading
    </div>
</div>
<div class="haosf_toast_button_close_wrapper">
    $close_image
</div>
HTML;
	}

	protected function get_image() {
		$set          = [ '', 'set2', 'set3', 'set4' ][ rand( 1, 4 ) ];
		$randomSlug   = rand( 1, 100 );
		$imageSource  = "https://robohash.org/$randomSlug.png?size=100x100&set=$set";

		return $imageSource;
	}

	/**
	 * @return mixed
	 */
	public function get_html() {
		return $this->html;
	}

	public function __toString() {
		return $this->get_html();
	}

	private function get_close_image() {
		return <<<HTML
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"></path>
    </svg>
HTML;
	}

	protected function get_heading() {
		return <<<HTML
		<div class="haosf_toast_person"><span class="haosf_toast_person_name">Arun</span> from <span
                class="haosf_toast_person_address">New Delhi, DL</span></div>
        <div class="haosf_toast_message">Recently signed up for Proof</div>
        <div class="haosf_toast_time_diff">2 hours ago</div>
HTML;
	}

}
