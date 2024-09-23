<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/AdDash', 'AdminController::AdDash', ['filter' => 'adminFilter']);
$routes->get('/ManageAgent', 'AdminController::ManageAgent', ['filter' => 'adminFilter']);
$routes->get('/AdProfile', 'AdminController::AdProfile', ['filter' => 'adminFilter']);
$routes->get('/AdSetting', 'AdminController::AdSetting', ['filter' => 'adminFilter']);

$routes->get('/add', 'ProfileController::add', ['filter' => 'adminFilter']);
$routes->get('/Forms', 'AdminController::Forms', ['filter' => 'adminFilter']);
$routes->get('confirm/(:any)', 'AdminController::confirm/$1', ['filter' => 'adminFilter']);
$routes->get('deny/(:any)', 'AdminController::deny/$1', ['filter' => 'adminFilter']);
$routes->get('/plans', 'PlanController::plans', ['filter' => 'adminFilter']);
$routes->post('/newplan', 'PlanController::newplan', ['filter' => 'adminFilter']);
$routes->post('/newplanUpdate/(:any)', 'PlanController::newplanUpdate/$1', ['filter' => 'adminFilter']);
$routes->match(['get', 'post'],'/confirmation', 'AdminController::confirmation', ['filter' => 'adminFilter']);
$routes->match(['get', 'post'], '/formsTable/(:any)', 'AdminController::formsTable/$1', ['filter' => 'adminFilter']);
$routes->match(['get', 'post'],'/usermanagement', 'UsersManageController::usermanagement', ['filter' => 'adminFilter']);
$routes->post('/newuser', 'UsersManageController::newuser', ['filter' => 'adminFilter']);
$routes->post('/upuser/(:any)', 'UsersManageController::upuser/$1', ['filter' => 'adminFilter']);
$routes->get('/ViewAppForm/(:any)', 'AdminController::ViewAppForm/$1', ['filter' => 'authGuard']);
$routes->get('/ViewAppForm2/(:any)', 'AdminController::ViewAppForm2/$1', ['filter' => 'authGuard']);
$routes->get('/ViewAppForm3/(:any)', 'AdminController::ViewAppForm3/$1', ['filter' => 'authGuard']);
$routes->get('/ViewAppForm4/(:any)', 'AdminController::ViewAppForm4/$1', ['filter' => 'authGuard']);
$routes->get('/ViewAppForm5/(:any)', 'AdminController::ViewAppForm5/$1', ['filter' => 'authGuard']);
$routes->get('/newAgent/(:any)', 'AdminController::newAgent/$1', ['filter' => 'adminFilter']);
$routes->match(['get', 'post'], '/promotion', 'AdminController::promotion', ['filter' => 'adminFilter']);
$routes->get('/ManageApplicant', 'AdminController::ManageApplicant', ['filter' => 'adminFilter']);
$routes->post('/userSearch', 'AdminController::userSearch', ['filter' => 'adminFilter']);
$routes->post('/agentSearch', 'AdminController::agentSearch', ['filter' => 'adminFilter']);
$routes->post('/svad', 'AdminController::svad', ['filter' => 'adminFilter']);
$routes->get('/RTC', 'AdminController::RTC', ['filter' => 'adminFilter']);
$routes->match(['get', 'post'], '/agentprofile/(:any)', 'ProfileController::agentprofile/$1', ['filter' => 'adminFilter']);
$routes->match(['get', 'post'], '/applicantprofile/(:any)', 'ProfileController::applicantprofile/$1', ['filter' => 'adminFilter']);
$routes->get('/map', 'MapController::map', ['filter' => 'adminFilter']);
$routes->get('/reports', 'ReportsController::reports', ['filter' => 'adminFilter']);


$routes->get('/AppDash', 'AppController::AppDash', ['filter' => 'applicantFilter']);
$routes->get('/AppProfile', 'AppController::AppProfile', ['filter' => 'applicantFilter']);
$routes->get('/AppSetting', 'AppController::AppSetting', ['filter' => 'applicantFilter']);
$routes->post('/svap', 'AppController::svap', ['filter' => 'applicantFilter']);
$routes->get('/AppForm1', 'AppController::AppForm1', ['filter' => 'applicantFilter']);
$routes->post('/form1sv', 'AppController::form1sv', ['filter' => 'authGuard']);
$routes->post('/form2sv', 'AppController::form2sv', ['filter' => 'authGuard']);
$routes->post('/form3sv', 'AppController::form3sv', ['filter' => 'authGuard']);
$routes->post('/form4sv', 'AppController::form4sv', ['filter' => 'authGuard']);
$routes->post('/form5sv', 'AppController::form5sv', ['filter' => 'authGuard']);
$routes->get('/AppForm2', 'AppController::AppForm2', ['filter' => 'applicantFilter']);
$routes->get('/AppForm3', 'AppController::AppForm3', ['filter' => 'applicantFilter']);
$routes->get('/AppForm4', 'AppController::AppForm4', ['filter' => 'applicantFilter']);
$routes->get('/AppForm5', 'AppController::AppForm5', ['filter' => 'applicantFilter']);
$routes->match(['get', 'post'], '/FA', 'AppController::FA', ['filter' => 'applicantFilter']);
$routes->get('/AppForms', 'AppController::AppForms', ['filter' => 'applicantFilter']);
$routes->get('/appfiles', 'FilesController::applicantfiles', ['filter' => 'applicantFilter']);
$routes->get('/signature', 'AppController::signature', ['filter' => 'applicantFilter']);
$routes->post('/signsave', 'AppController::signsave', ['filter' => 'authGuard']);
$routes->post('/fileuploads', 'FilesController::fileuploads', ['filter' => 'applicantFilter']);


$routes->get('/AgDash', 'AgentController::AgDash', ['filter' => 'agentFilter']);
$routes->get('/AgProfile', 'AgentController::AgProfile', ['filter' => 'agentFilter']);
$routes->get('/AgSetting', 'AgentController::AgSetting', ['filter' => 'agentFilter']);
$routes->post('/svag', 'AgentController::svag', ['filter' => 'agentFilter']);
$routes->get('/subagent', 'AgentController::subagent', ['filter' => 'agentFilter']);
$routes->post('/subagentSearch', 'AgentController::subagentSearch', ['filter' => 'agentFilter']);
$routes->get('/AgForms', 'AgentController::AgForms', ['filter' => 'agentFilter']);
$routes->get('/AgForm1', 'AgentController::AgForm1', ['filter' => 'agentFilter']);
$routes->get('/AgForm2', 'AgentController::AgForm2', ['filter' => 'agentFilter']);
$routes->get('/AgForm3', 'AgentController::AgForm3', ['filter' => 'agentFilter']);
$routes->get('/AgForm4', 'AgentController::AgForm4', ['filter' => 'agentFilter']);
$routes->get('/AgForm5', 'AgentController::AgForm5', ['filter' => 'agentFilter']);
$routes->get('/Agsignature', 'AgentController::Agsignature', ['filter' => 'agentFilter']);
$routes->match(['get', 'post'], '/subagentprofile/(:any)', 'ProfileController::subagentprofile/$1', ['filter' => 'agentFilter']);
$routes->match(['get', 'post'], '/clients', 'AgentController::client', ['filter' => 'agentFilter']);
$routes->match(['get', 'post'], '/myclientprofile/(:any)', 'ProfileController::myclientprofile/$1', ['filter' => 'agentFilter']);
$routes->post('/upstatusplan/(:any)', 'AgentController::upstatusplan/$1', ['filter' => 'agentFilter']);
$routes->get('/mycommi', 'AgentController::mycommi', ['filter' => 'agentFilter']);


$routes->get('/cliSched', 'AgentController::cliSched', ['filter' => 'agentFilter']);
$routes->get('/con/(:any)', 'AgentController::con/$1', ['filter' => 'agentFilter']);
$routes->get('/inprog', 'AgentController::inprog', ['filter' => 'agentFilter']);
$routes->get('/comp', 'AgentController::comp', ['filter' => 'agentFilter']);
$routes->post('/compost', 'AgentController::compost', ['filter' => 'agentFilter']);



$routes->get('/', 'HomepageController::home', ['filter' => 'online']);

$routes->get('/register/(:any)', 'HomepageController::register/$1', ['filter' => 'online']);
$routes->post('/Authreg/(:any)', 'HomepageController::Authreg/$1');

$routes->post('/Authreg', 'HomepageController::Authreg');
$routes->post('/updatePassword', 'HomepageController::updatePassword', ['filter' => 'authGuard']);
$routes->post('/updatePasswordlogin', 'HomepageController::updatePasswordlogin', ['filter' => 'authGuard']);

$routes->get('/login', 'HomepageController::login', ['filter' => 'online']);
$routes->post('/authlog', 'HomepageController::authlog');

//home
$routes->get('/logout', 'HomepageController::logout');
$routes->get('/forgot', 'HomepageController::forgot', ['filter' => 'online']);
$routes->post('send-reset-link', 'HomepageController::sendResetLink');
$routes->get('reset-password/(:segment)', 'HomepageController::resetPassword/$1', ['filter' => 'online']);
$routes->post('reset-password/(:segment)', 'HomepageController::processResetPassword/$1');
$routes->get('verify-email/(:segment)', 'HomepageController::verifyEmail/$1', ['filter' => 'authGuard']);

//charts
$routes->get('/monthlyAgentCount', 'ChartsController::monthlyAgentCount', ['filter' => 'authGuard']);
$routes->get('/getApplicantsCount', 'ChartsController::getApplicantsCount', ['filter' => 'authGuard']);
$routes->get('/getMonthlyCommissions', 'ChartsController::getMonthlyCommissions', ['filter' => 'authGuard']);
$routes->get('/getYearlyCommissions', 'ChartsController::getYearlyCommissions', ['filter' => 'authGuard']);

//RTC
// $routes->get('/homechat', 'RTCController::RTC');
// $routes->post('/chat', 'RTCController::chat');
// $routes->get('/send', 'RTCController::send');

//pdf
$routes->get('/generatePdf/(:num)', 'AdminController::generatePdf/$1', ['filter' => 'adminFilter']);
$routes->get('/generatePdf3/(:num)', 'AdminController::generatePdf3/$1', ['filter' => 'adminFilter']);

//Clientt
$routes->get('/ClientPage', 'ClientController::ClientPage',['filter' => 'clientFilter']);
$routes->get('/history', 'ClientController::paymenthistory',['filter' => 'clientFilter']);
$routes->get('/viewplans', 'ClientController::viewplans',['filter' => 'clientFilter']);
$routes->get('/clientprofile', 'ClientController::clientprofile',['filter' => 'clientFilter']);
$routes->post('/svclient', 'ClientController::svclient',['filter' => 'clientFilter']);
$routes->get('/agents', 'ClientController::agents',['filter' => 'clientFilter']);
$routes->get('/seeprofile/(:any)', 'ClientController::seeprofile/$1',['filter' => 'clientFilter']);
$routes->match(['get','post'],'/createSchedule', 'ClientController::createSchedule',['filter' => 'clientFilter']);
$routes->post('/sched', 'ClientController::sched',['filter' => 'clientFilter']);
$routes->get('/mysched', 'ClientController::mysched',['filter' => 'clientFilter']);
$routes->get('/delsched/(:any)', 'ClientController::delsched/$1',['filter' => 'clientFilter']);
$routes->post('/upsched', 'ClientController::upsched',['filter' => 'clientFilter']);


$routes->get('/ClientService', 'ClientController::ClientService', ['filter' => 'online']);
$routes->get('/ServiceDescription/(:any)', 'ClientController::ServiceDescription/$1');

$routes->get('/ClientAgent/(:any)', 'ClientController::ClientAgent/$1');
$routes->get('/ClientRegister', 'ClientController::register', ['filter' => 'online']);
$routes->post('/clientreg', 'ClientController::clientreg');

$routes->get('/contactus', 'HomepageController::contactus', ['filter' => 'online']);
$routes->get('/terms', 'HomepageController::terms', ['filter' => 'online']);
$routes->get('/policy', 'HomepageController::policy', ['filter' => 'online']);
$routes->get('/comingsoon', 'HomepageController::comingsoon', ['filter' => 'online']);
$routes->match(['get', 'post'], '/feedback/saveFeedback', 'FeedbackController::saveFeedback');


$routes->get('/sched', 'AdminController::sched', ['filter' => 'adminFilter']);
$routes->get('/calendar', 'AdminController::calendar', ['filter' => 'adminFilter']);
$routes->get('sched/create', 'AdminController::create', ['filter' => 'adminFilter']);
$routes->post('sched/schedsave', 'AdminController::schedsave', ['filter' => 'adminFilter']);
$routes->get('sched/edit/(:num)', 'AdminController::edit/$1', ['filter' => 'adminFilter']);
$routes->post('sched/update/(:num)', 'AdminController::update/$1', ['filter' => 'adminFilter']);
$routes->get('sched/delete/(:num)', 'AdminController::delete/$1', ['filter' => 'adminFilter']);
$routes->get('/agentsched', 'AgentController::sched', ['filter' => 'adminFilter']);

//notification
$routes->get('/clearnotif', 'NotifController::clearnotif', ['filter' => 'authGuard']);
$routes->get('/sms', 'NotifController::sms');





