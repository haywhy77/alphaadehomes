<?php die();
[routes]

// Public route
GET / = PublicDashboard->index
GET /about = PublicDashboard->about
GET /services = PublicDashboard->services
GET|POST /contact = PublicDashboard->contact

POST /properties/ratings/@id=Property->rateProperty


//Properties menus
GET /properties/@category =  Property->getProperties
GET|POST /properties/@category/@id =  Property->viewProperties

POST /feedback=PublicDashboard->feedback
POST /subscribe=PublicDashboard->sendSubscribtion

//  admin login
GET|POST /admin=Home->admin_login
GET|POST /admin/password-forget=Home->admin_reset

