<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$product_id = $this->uri->segment(2);

$route['isValid'] = "Authentication/validate";
$route['registraion'] = "Registartion/registraion";
$route['save_registraion'] = "Registartion/Save_registration";
$route['Home'] = "Authentication/HomePage";
$route['logout'] = "Authentication/logout";

$route['recurring_reminders'] = "Cron/Repeat_reminders/show";
$route['send_noti_cron'] = "Cron/Send_notification/get_all_reminders";

//Dashboard

$route['dashboard'] = "Dashboard/dashboard_list";
$route['show_categories'] = "Dashboard/show_categories";
$route['add_category'] = "Dashboard/add_category";
$route['store_category'] = "Dashboard/store_category";
$route['delete_category/(:num)'] = "Dashboard/delete_category/$product_id";
$route['update_category'] = "Dashboard/update_category";

$route['showMaintenanceReminder'] = "Dashboard/show_maintenance_reminder";
$route['showHRreminder'] = "Dashboard/show_hr_reminder";
$route['showMarketingReminder'] = "Dashboard/show_marketing_reminder";
$route['showSalesReminder'] = "Dashboard/show_sales_reminder";
$route['showAdminReminder'] = "Dashboard/show_admin_reminder";

$route['showAllUpcoming'] = "Dashboard/show_all_upcoming_reminder";
$route['showAllUpcoming/(:num)'] = "Dashboard/show_all_upcoming_reminder/$product_id";
$route['showUpcomingCategoryReminder/(:num)'] = "Dashboard/showUpcomingCategoryReminder/$product_id";

$route['showTodaysCategoryReminder/(:num)'] = "Dashboard/showTodaysCategoryReminder/$product_id";
$route['showAllTodayReminder'] = "Dashboard/show_all_todays_reminder";
$route['showAllTodayReminder/(:num)'] = "Dashboard/show_all_todays_reminder/$product_id";
$route['showCompletedCategoryReminder/(:num)'] = "Dashboard/showCompletedCategoryReminder/$product_id";
$route['showAllCompleted'] = "Dashboard/show_all_completed_reminder";
$route['showAllCompleted/(:num)'] = "Dashboard/show_all_completed_reminder/$product_id";
$route['showExpiredCategoryReminder/(:num)'] = "Dashboard/showExpiredCategoryReminder/$product_id";
$route['showAllExpiredUnresolved'] = "Dashboard/show_all_expired_reminder";
$route['showAllExpiredUnresolved/(:num)'] = "Dashboard/show_all_expired_reminder/$product_id";

//team member

$route['team_member_master'] = "Team_member/show_team_member";
$route['add_team_member'] = "Team_member/add_team_member";
$route['store_team_member'] = "Team_member/store_team_member";
$route['edit_team_member/(:num)'] = "Team_member/edit_team_member/$product_id";
$route['update_team_member'] = "Team_member/update_team_member";
$route['delete_team_member/(:num)'] = "Team_member/delete_team_member/$product_id";

//admin master
$route['adminMaster'] = "Team_member/show_admin";
$route['add_admin'] = "Team_member/add_admin";
$route['store_admin'] = "Team_member/store_admin";
$route['edit_admin/(:num)'] = "Team_member/edit_admin/$product_id";
$route['update_admin'] = "Team_member/update_admin/$product_id";
$route['changePassword'] = "Team_member/change_password";
$route['update_password'] = "Team_member/update_password";

//reminder

$route['reminder'] = "Reminder/show_reminder";
$route['reminder/(:num)'] = "Reminder/show_reminder/$product_id";
$route['add_reminder'] = "Reminder/add_reminder";
$route['store_reminder'] = "Reminder/store_reminder";
$route['edit_reminder/(:num)'] = "Reminder/edit_reminder/$product_id";
$route['update_reminder'] = "Reminder/update_reminder"; 
$route['delete_reminder/(:num)'] = "Reminder/delete_reminder/$product_id";
$route['add_repeat_reminder'] = "Reminder/add_repeat_reminder";
$route['show_repeat_reminders'] = "Reminder/show_repeat_reminders";
$route['show_repeat_reminders/(:num)'] = "Reminder/show_repeat_reminders/$product_id";

//send notification

$route['send_notification'] = "Notification/show_notification";
$route['submit_notification'] = "Notification/submit_notification";

//log

$route['Log'] = "Notification/show_log";
$route['Log/(:num)'] = "Notification/show_log/$product_id";


