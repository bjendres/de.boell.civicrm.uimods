/*-------------------------------------------------------+
| HBS UI Modififications                                 |
| Copyright (C) 2017 SYSTOPIA                            |
| Author: B. Endres (endres@systopia.de)                 |
| Author: P. Batroff (batroff@systopia.de)               |
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


// hide some tabs
cj("#tab_location").hide();
cj("#tab_fee").hide();
cj("#tab_registration").hide();
cj("#tab_friend").hide();
cj("#tab_pcp").hide();
cj("#tab_repeat").hide();

// make some fields read-only
cj("#title").prop("readonly", true);
cj("[id^=start_date_display]").prop('disabled', true);
cj("#start_date_time").prop("readonly", true);
cj("[id^=end_date_display]").prop('disabled', true);
cj("#end_date_time").prop("readonly", true);
cj(".crm-clear-link").each(function(){
    cj(this).hide()
});

// hide fields
cj(".crm-event-manage-eventinfo-form-block-summary").hide();
cj(".crm-event-manage-eventinfo-form-block-description").hide();
cj(".crm-event-manage-eventinfo-form-block-max_participants").hide();
cj(".crm-event-manage-eventinfo-form-block-is_map").hide();
cj(".crm-event-manage-eventinfo-form-block-is_public").hide();
cj(".crm-event-manage-eventinfo-form-block-is_share").hide();
cj(".crm-event-manage-eventinfo-form-block-is_active").hide();
cj("td.description").hide();
