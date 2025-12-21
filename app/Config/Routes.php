<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('Modules\Users\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->group('admin', ['namespace' => '\Modules\Admin\Controllers'], function ($routes) {
    //General
    $routes->get('/', 'AdminAuth::login');
    $routes->get('login', 'AdminAuth::login');
    $routes->post('sign-in', 'AdminAuth::signin');
    $routes->get('logout', 'AdminAuth::logout');

    $routes->group('dashboard', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Home::index');
    });

    $routes->group('organization', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Organization::index');
        $routes->post('save-organize', 'Organization::saveOrganize');
    });

    $routes->group('member', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Member::index');
        $routes->get('manage', 'Member::manage');
        $routes->get('manage/(:any)', 'Member::manage/$1');
        $routes->post('save-member', 'Member::saveMember');
        $routes->post('ajax-table-members', 'Member::ajax_getMembers');
        $routes->post('delete-member', 'Member::deleteMember');
    });

    $routes->group('news', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'News::index');
        $routes->get('manage', 'News::manage');
        $routes->get('manage/(:any)', 'News::manage/$1');
        $routes->post('save-news', 'News::saveNews');
        $routes->post('ajax-table-news', 'News::ajax_getNews');
        $routes->post('delete-news', 'News::deleteNews');
        $routes->post('delete-file', 'News::deleteFile');
    });

    $routes->group('reward', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Reward::index');
        $routes->get('manage', 'Reward::manage');
        $routes->get('manage/(:any)', 'Reward::manage/$1');
        $routes->post('save-reward', 'Reward::saveReward');
        $routes->post('ajax-table-reward', 'Reward::ajax_getReward');
        $routes->post('delete-reward', 'Reward::deleteReward');
    });

    $routes->group('slide', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Slide::index');
        $routes->get('manage', 'Slide::manage');
        $routes->get('manage/(:any)', 'Slide::manage/$1');
        $routes->post('save-slide', 'Slide::saveSlide');
        $routes->post('delete-slide', 'Slide::deleteSlide');
    });

    $routes->group('course', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Course::index');
        $routes->post('save-course', 'Course::saveCourse');
        $routes->post('manage_course_content', 'Course::manage_course_content');
        $routes->get('content/(:any)', 'Course::course_content/$1');
        $routes->post('deleteCourse', 'Course::deleteCourse');
        $routes->post('deleteCourseType', 'Course::deleteCourseType');
        $routes->post('manageCourseType', 'Course::manageCourseType');
    });

    $routes->group('information', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Information::index');
        $routes->post('save-information', 'Information::saveInformation');
        $routes->get('information_about_personel', 'Information::information_about_personel');
        $routes->get('information_about_personel_form', 'Information::information_about_personel_form');
        $routes->post('saveInformationPersonel', 'Information::saveInformationPersonel');
        $routes->post('ajaxDeleteinformation_about_personel', 'Information::ajaxDeleteinformation_about_personel');



        $routes->get('information_about_money', 'Information::information_about_money');
        $routes->get('information_about_money_form', 'Information::information_about_money_form');
        $routes->post('saveInformationMoney', 'Information::saveInformationMoney');
        $routes->post('ajaxDeleteinformation_about_money', 'Information::ajaxDeleteinformation_about_money');
    });

    $routes->group('law', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Law::index');
        $routes->post('ajax-table-laws', 'Law::ajax_getLaw');
        $routes->post('save-law', 'Law::saveLaw');
        $routes->get('manage', 'Law::manage');
        $routes->get('manage/(:any)', 'Law::manage/$1');
        $routes->post('delete-law', 'Law::deleteLaw');
        $routes->post('delete-file', 'Law::deleteFile');
    });

    $routes->group('student', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('student-states-forms', 'Student::state_yearly');
        $routes->post('save-state-yearly', 'Student::save_state_yearly');
    });

    $routes->group('Document', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Document::index');
        $routes->get('manage', 'Document::documentForm');
        $routes->get('manage/(:any)', 'Document::documentForm/$1');
        $routes->post('manageDocument', 'Document::manageDocument');
        $routes->get('listFile/(:any)', 'Document::documentListFile/$1');
        $routes->get('manageFile/(:any)', 'Document::documentFormFile/$1');
        $routes->get('manageFile/(:any)/(:any)', 'Document::documentFormFile/$1/$2');
        $routes->post('manageDocumentFile', 'Document::manageDocumentFile');
        $routes->post('deleteDocumentFile', 'Document::deleteDocumentFile');
        $routes->post('deleteDocument', 'Document::deleteDocument');
        $routes->post('ShowContentDocument', 'Document::ShowContentDocument');
    });
    $routes->group('Alert', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Alert::index');
        $routes->get('manage', 'Alert::manage');
        $routes->get('manage/(:any)', 'Alert::manage/$1');
        $routes->post('saveAlert', 'Alert::saveAlert');
        $routes->post('deleteAlert', 'Alert::manageDeleteAlert');
    });

    $routes->group('configs', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('website', 'Config::website_content');
        $routes->post('save-content', 'Config::saveContent');
    });
    $routes->group('Users', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Users::index');
        $routes->get('permissions', 'Users::managePermissions');
        $routes->get('manageUser', 'Users::manageUser');
        $routes->post('savePermissions', 'Users::savePermissions');
        $routes->post('saveUser', 'Users::saveUser');
        $routes->post('deleteUser', 'Users::deleteUser');
    });
    $routes->group('Link', ['namespace' => '\Modules\Admin\Controllers', 'filter' => 'adminGuard'], function ($routes) {
        $routes->get('/', 'Link::index');
        $routes->get('manage', 'Link::manage');
        $routes->post('saveLink', 'Link::saveLink');
        $routes->post('deleteLink', 'Link::deleteLink');
    });
});
$routes->group('/', ['namespace' => '\Modules\Users\Controllers'], function ($routes) {
    $routes->get('/', 'Users::index');

    $routes->group('About', ['namespace' => '\Modules\Users\Controllers'], function ($routes) {
        $routes->get('/information_educational', 'About::information_educational');
        $routes->get('/information_student', 'About::information_educational');
        $routes->get('/information_giftPolicy', 'About::information_giftPolicy');
        $routes->get('/information_law', 'About::information_law');
        $routes->get('/information_about_manage', 'About::information_about_manage');
        $routes->get('/information_about_personel', 'About::information_about_personel');
        $routes->get('/information_about_money', 'About::information_about_money');
    });
    $routes->group('Organization', ['namespace' => '\Modules\Users\Controllers'], function ($routes) {
        $routes->get('organization_personal/(:any)', 'Organization::organization_personal/$1');
        $routes->get('(:any)', 'Organization::organization/$1');
    });
    $routes->group('policy', ['namespace' => '\Modules\Users\Controllers'], function ($routes) {
        $routes->get('/', 'Policy::policy');
        $routes->get('/securityPolicy', 'Policy::securityPolicy');
        $routes->get('/privacyPolicy', 'Policy::privacyPolicy');
    });
    $routes->group('contact', ['namespace' => '\Modules\Users\Controllers'], function ($routes) {
        $routes->get('/', 'Contact::contact');
    });
    $routes->group('document', ['namespace' => '\Modules\Users\Controllers'], function ($routes) {
        $routes->get('/', 'Document::index');
    });
    $routes->group('News', ['namespace' => '\Modules\Users\Controllers'], function ($routes) {
        $routes->get('/', 'News::index');
        $routes->get('detail/(:any)', 'News::new_detail/$1');
    });
    $routes->group('Course', ['namespace' => '\Modules\Users\Controllers'], function ($routes) {
        $routes->get('detail/(:any)', 'Course::index/$1');
    });
    $routes->group('Reward', ['namespace' => '\Modules\Users\Controllers'], function ($routes) {
        $routes->get('detail/(:any)', 'Reward::reward_detail/$1');
    });
});

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Dashborad

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
