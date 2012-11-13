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
 * @package    Settings
 *
 */

return array(
	'groups' => array(
		'suphp' => array(
			'title' => $lng['admin']['suphp_settings'],
			'websrv_avail' => array('apache2'),
			'fields' => array(
				'system_mod_suphp_enabled' => array(
					'label' => $lng['serversettings']['mod_suphp'],
					'settinggroup' => 'system',
					'varname' => 'mod_suphp',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					'plausibility_check_method' => 'checkPhpWrapper',
					'overview_option' => true
                ),
				'system_mod_suphp_configpath' => array(
					'label' => $lng['serversettings']['mod_suphp']['configpath'],
					'settinggroup' => 'system',
					'varname' => 'mod_suphp_configpath',
					'type' => 'string',
					'string_type' => 'dir',
					'default' => '/var/www/suphp/',
					'plausibility_check_method' => 'checkPathConflicts',
					'save_method' => 'storeSettingField',
                ),
            ),
        ),
    ),
);

?>
