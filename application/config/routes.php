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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'control_login/login_main';

$route['admin'] = 'admin/control_admin/index';
$route['admin/login'] = 'admin/control_admin/login';

$route['admin/news'] = 'admin/control_admin_news';
$route['admin/news/add'] = 'admin/control_admin_news/add';

$route['admin/banner'] = 'admin/control_admin_banner';
$route['admin/banner/add'] = 'admin/control_admin_banner/add';

$route['admin/personnel'] = 'admin/control_admin_personnel';
$route['admin/personnel/add'] = 'admin/control_admin_personnel/add';

$route['admin/position'] = 'admin/control_admin_position';
$route['admin/position/add'] = 'admin/control_admin_position/add';

$route['admin/adminmenu'] = 'admin/control_admin_adminmenu';
$route['admin/adminmenu/add'] = 'admin/control_admin_adminmenu/add';

$route['admin/workother'] = 'admin/control_admin_workother';
$route['admin/workother/add'] = 'admin/control_admin_workother/add';

$route['admin/department'] = 'admin/control_admin_department';
$route['admin/department/add'] = 'admin/control_admin_department/add';

$route['admin/learning'] = 'admin/control_admin_learning';
$route['admin/learning/add'] = 'admin/control_admin_learning/add';

$route['admin/aboutschool'] = 'admin/control_admin_aboutschool';
$route['admin/aboutschool/add'] = 'admin/control_admin_aboutschool/add';

$route['admin/recruitstudent'] = 'admin/control_admin_recruitstudent';
$route['admin/recruitstudent/add'] = 'admin/control_admin_recruitstudent/add';

$route['admin/images'] = 'admin/control_admin_images';
$route['admin/images/add'] = 'admin/control_admin_images/add';

// User
$route['news/newsDetail/(:any)'] = 'control_news/news_detail/$1';

// เกี่ยวกับโรงเรียน
$route['AboutSchool/(:any)'] = 'control_aboutschool/aboutschool_detail/$1';

// รูปกิจกรรม
$route['Album'] = 'control_images/show_all_album';

// [[บุคลากร]]
$route['Personnel'] = 'control_personnel/show_per_all';
$route['Personnel/(:any)'] = 'control_personnel/show_per_type/$1';

// [[รับสมัครนักเรียน]]
$route['RegStudent'] = 'control_recruitstudent';
$route['RegStudent/welcome/(:any)'] = 'control_recruitstudent/welcome_student/$1';
$route['checkRegister'] = 'control_recruitstudent/check_student';
$route['RegStudent/(:any)'] = 'control_recruitstudent/reg_student/$1';
$route['checkRegister/dataStudent'] = 'control_recruitstudent/data_user';