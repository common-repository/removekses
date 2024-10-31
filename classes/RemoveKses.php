<?php

namespace AUSWEB\Plugins\RemoveKses;

if (!defined('ABSPATH')) die(header('HTTP/1.0 403 Forbidden'));

/**
 * RemoveKses class.
 *
 * @since 1.0
 * @package RemoveKses
 */

class RemoveKses {

	/**
	 * Instance of WP_Role.
	 * @var WP_Role $role
	 */

	private $role;

	/**
	 * Send in a role to be modified.
	 *
	 * @since 1.0
	 * @access public
	 * @param $role Instance of WP_Role.
	 */

	public function __construct(\WP_Role $role) {

		$this->role = $role;
		$this->addCapability("unfiltered_html");
		$this->removeKses();

	}

	/**
	 * Checks if a role has a specific capability.
	 *
	 * @since 1.0
	 * @access private
	 * @param $capability Capability to check.
	 */

	private function hasCapability($capability) {

		if($this->role->has_cap($capability)) {
			return true;
		} else {
			return false;
		}

	}

	/**
	 * Adds a capability to a role, if it doesn't already have it.
	 *
	 * @since 1.0
	 * @access private
	 * @param $capability Capability to add.
	 */

	private function addCapability($capability) {

		if(!$this->hasCapability($capability))
			$this->role->add_cap($capability);

	}

	/**
	 * Removes "kses" filtering for a specific role. Only executed prior to content save.
	 *
	 * @since 1.0
	 * @access public
	 */

	private function removeKses() {

		if($this->hasCapability("unfiltered_html")) {

			add_action('content_filtered_save_pre', function() {

				if(function_exists("kses_remove_filters"))
					kses_remove_filters();

			});

		}

	}

}