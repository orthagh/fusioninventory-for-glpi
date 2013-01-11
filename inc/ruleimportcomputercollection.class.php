<?php
/*
 * @version $Id$
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2012 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

/** @file
* @brief
*/
if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access directly to this file");
}

/// OCS Rules collection class
class RuleImportComputerCollection extends RuleCollection {

   // From RuleCollection
   public $stop_on_first_match = true;
   static public $right        = 'rule_ocs';
   public $menu_option         = 'linkcomputer';

   // Specific ones
   ///Store the id of the ocs server
   var $ocsservers_id;

   function canList() {
      global $PLUGIN_HOOKS;

      if (isset($PLUGIN_HOOKS['import_item']) && count($PLUGIN_HOOKS['import_item'])) {
         return static::canView();
      }
      return false;
   }
   
   function getTitle() {
      return __('Rules for import and link computers');
   }

   /**
    * @see RuleCollection::preProcessPreviewResults()
   **/
   function preProcessPreviewResults($output) {
      return OcsServer::previewRuleImportProcess($output);
   }

}
?>