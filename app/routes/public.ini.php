<?php die();
[routes]

// Public route
GET / = PublicDashboard->index
GET /about = PublicDashboard->about
GET /services = PublicDashboard->services
GET /contact = PublicDashboard->contact


GET /get-list = PublicDashboard->getPersons
GET /view-profile/@id = PublicDashboard->getDetail


POST /feedback=PublicDashboard->feedback
POST /contact=PublicDashboard->sendContact
POST /subscribe=PublicDashboard->sendSubscribtion

//  admin login
GET|POST /admin=Home->admin_login
GET|POST /admin/password-forget=Home->admin_reset

