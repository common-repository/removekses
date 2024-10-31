=== Remove Kses ===
Contributors: auswebhosting, drewsymorris
Tags: unfiltered_html, kses, WPMU
Requires at least: 3.0.1
Tested up to: 3.8.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Disables KSES for the WordPress Editor Role. Compatible with MU.

== Description ==

This plugin will disable WordPress KSES filtering for the WordPress editor role. It is fully compatible with MU.

You can customise this plugin to disable KSES for any WordPress role. Please refer to the plugin [FAQ](http://wordpress.org/plugins/removekses/faq/) for more information.

**Note:** Disabling KSES for the *editor* role is unnecessary in regular WordPress and is only intended for MU installations (where it is enabled).

[Company Website](http://ausweb.com.au/)

== Installation ==

RemoveKses is trivial to install:

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How do I add more roles? =

This plugin can be easily customised to remove KSES for more than just the `editor` role.
Simply open the `removekses.php` file and uncomment the relevant lines:

    $editor       = new RemoveKses(get_role("editor")); // Remove KSES for Editor roles
    $author       = new RemoveKses(get_role("author")); // Remove KSES for Author roles
    $contributor  = new RemoveKses(get_role("contributor")); // Remove KSES for contributor roles
    $subscriber   = new RemoveKses(get_role("subscriber")); // Remove KSES for subscriber roles

= How does it work? =

* Fetches the role to be modified via the constructor `$myrole = new RemoveKses(get_role("editor"));`.
* Adds the `unfiltered_html` capability to the role, if it doesn't already have it.
* Hooks `content_filtered_save_pre` and runs `kses_remove_filters()` before content is sent to the database.

== Changelog ==

= 1.0 =
* Initial Commit