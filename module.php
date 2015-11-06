<?php
// Classes and libraries for module system
//
// webtrees: Web based Family History software
// Copyright (C) 2015 £ukasz Wileñski.
//
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
//
namespace Fisharebest\Webtrees;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleReportInterface;

class WoocSourceReportModule extends AbstractModule implements ModuleReportInterface {

	public function __construct() {
		parent::__construct('wooc_source_report');
	}

	// Extend class Module
	public function getTitle() {
		return I18N::translate('Wooc Source Data Report');
	}

	public function getReportTitle() {
		// This text also appears in the .XML file - update both together
		return /* I18N: Name of a report */ I18N::translate('Source data');
	}

	// Extend class Module
	public function getDescription() {
		// This text also appears in the .XML file - update both together
		return /* I18N: Description of a report */ I18N::translate('A report of individuals which are supported by a given source.');
	}

	// Extend class Module
	public function defaultAccessLevel() {
		return WT_PRIV_USER;
	}

	// Implement Module_Report - a module can provide many reports
	public function getReportMenu() {
		global $WT_TREE;

		return new Menu(
			$this->getReportTitle(),
			'reportengine.php?ged='.$WT_TREE->getNameUrl().'&amp;action=setup&amp;report='.WT_MODULES_DIR.$this->getName().'/report.xml',
			'menu-report-' . $this->getName(),
			array('rel' => 'nofollow')
		);
	}
}

return new WoocSourceReportModule;