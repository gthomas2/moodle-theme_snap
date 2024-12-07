<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Ally report hooks.
 * @author    Guy Thomas
 * @copyright Copyright (c) 2024 Anthology Inc. and its affiliates
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_snap\local;

class hook_callbacks {
    public static function before_footer_html_generation() {
        global $CFG, $PAGE;

        if (empty(get_config('theme_snap', 'personalmenuadvancedfeedsenable'))) {
            return;
        }

        $paths = [];
        $paths['theme_snap/snapce'] = [
            $CFG->wwwroot . '/pluginfile.php/' . $PAGE->context->id . '/theme_snap/vendorjs/snap-custom-elements/snap-ce'
        ];

        $PAGE->requires->js_call_amd('theme_snap/wcloader', 'init', [
            'componentPaths' => json_encode($paths)
        ]);
    }
}
