<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Functions
 *
 */

function checkPhpWrapper($fieldname, $fielddata, $newfieldvalue, $allnewfieldvalues)
{
	global $settings, $theme;

	$returnvalue = array(FORMFIELDS_PLAUSIBILITY_CHECK_OK);

    $checkValues = array(
        'system_mod_suphp_enabled' => array(
            'settings' => &$settings['system']['mod_suphp'],
            'error' => 'suphpstillenabled',
        ),
        'system_mod_fcgid_enabled' => array(
            'settings' => &$settings['system']['mod_fcgid'],
            'error' => 'fcgidstillenabled',
        ),
        'system_phpfpm_enabled' => array(
            'settings' => &$settings['phpfpm']['enabled'],
            'error' => 'phpfpmstillenabled',
        ),
    );

    if (array_key_exists($fieldname, $checkValues)
        && (int)$newfieldvalue == 1) {
        foreach($checkValues as $checkFieldname => $checkData) {
            if ($checkFieldname != $fieldname
                && ((int)$checkData['settings'] == 1
                    || (int)$allnewfieldvalues[$checkFieldname] == 1)) {
                $returnvalue = array(FORMFIELDS_PLAUSIBILITY_CHECK_ERROR, $checkData['error']);
                break;
            }
        }
    }

	return $returnvalue;
}
