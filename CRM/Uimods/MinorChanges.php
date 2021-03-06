<?php
/*-------------------------------------------------------+
| HBS UI Modififications                                 |
| Copyright (C) 2017 SYSTOPIA                            |
| Author: B. Endres (endres@systopia.de)                 |
| http://www.systopia.de/                                |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/

/**
 * Minor Changes to the UI:
 *  - hide default greetings (email/postal)
 *  - hide preferred_mail_format, communication_style_id, sic_code
 */
class CRM_Uimods_MinorChanges {

  /**
   * executes the page run hook
   * injects JS to hide fields in the summary view
   * @param $page
   */
  public static function pageRunHook(&$page) {
    // add general UI mods
    CRM_Core_Resources::singleton()->addVars('de.boell.civicrm.uimods', array(
      'employer_html' => CRM_Uimods_EmployerRelationship::getCurrentEmployerHTML($page->get('cid'))
    ));
    $script2 = file_get_contents(__DIR__ . '/../../js/summary_view_mods.js');
    $custom_group_id = self::getCustomGroupID();
    $script2 = str_replace('__CUSTOM-GROUP-ID__', $custom_group_id, $script2);
    CRM_Core_Region::instance('page-footer')->add(array(
      'script' => $script2,
      ));
  }

  /**
   * executes form hook
   * @param $formName
   * @param $form
   */
  public static function buildFormHook($formName, &$form) {
    $form_hook_script = file_get_contents(__DIR__ . '/../../js/minor_changes_form.js');
    CRM_Core_Region::instance('page-footer')->add(array(
      'script' => $form_hook_script,
    ));
  }

  /**
   * form hook for inline edit on contacts
   * @param $formName
   * @param $form
   */
  public static function buildFormHook_InlineEdit() {
    $form_hook_inline_script = file_get_contents(__DIR__ . '/../../js/minor_changes_inline_form.js');
    CRM_Core_Region::instance('page-footer')->add(array(
      'script' => $form_hook_inline_script,
    ));
  }

  /**
   * removes Print to PDF entry form the action menu
   *
   * Print Report (Bericht drucken) shall be used instead (#11511)
   */
  public static function buildFormHook_reportMenu() {
    $form_hook_inline_script = file_get_contents(__DIR__ . '/../../js/report_pdf_generation.js');
    CRM_Core_Region::instance('page-footer')->add(array(
      'script' => $form_hook_inline_script,
    ));
  }

  /**
   * edits the tokens in the JS-select2 field and hides elements
   *
   * elements are specified directly in the js array defined in the remove_tokens.js
   */
  public static function editTokens() {

    $script = file_get_contents(__DIR__ . '/../../js/remove_tokens.js');

    CRM_Core_Region::instance('page-footer')->add(array(
      'script' => $script,
    ));
  }

  public static function build_search_form_hook() {
    $script = file_get_contents(__DIR__ . '/../../js/minor_changes_ammend_search_form.js');

    CRM_Core_Region::instance('page-footer')->add(array(
      'script' => $script,
    ));
  }

  /**
   * get CustomGroup ID of the orgnisation_names
   */
  public static function getCustomGroupID() {
      $group = civicrm_api3('CustomGroup', 'get', array(
        'sequential' => 1,
        'name'       => "consent",
      ));
    return $group['id'];
  }
}