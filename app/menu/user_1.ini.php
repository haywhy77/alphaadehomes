<?php die();
[routes]
GET /console=Dashboard->index

GET /console/logout = Home->logout

GET /console/download/@extention=Export->index

POST /console/candidate/validate=Home->validate
GET|POST /console/account/@id=Dashboard->candidate

GET|POST /console/client/account/@id=Dashboard->client

GET|POST /console/admin/account/@id=Dashboard->admin
GET /console/bookings=Booking->index

GET /console/bookings/@id=Booking->getBooking

GET /console/bookings/@id/track/@action=Booking->update
GET /console/properties=Property->index

GET|POST /console/properties/@id=Property->detail

GET|POST /console/properties/new=Property->create

POST /console/properties/action/update=Property->performActions

POST /console/properties/remove=Property->removeProperty

GET /console/properties/@id/actions/@action=Property->actions

GET /console/properties/file-delete/*=Property->fileRemoval
GET /console/users=Users->index

GET /console/users/@id=Users->getUser

GET|POST /console/users/new=Users->create

POST /console/users/update=Users->update
GET /console/access/users=Staff->index

GET /console/access/users/@id=Staff->detail

GET|POST /console/acess/users/new=Staff->create

POST /console/access/users/action/update=Staff->performActions

POST /console/access/users/remove=Staff->removeStaff
GET /console/access/roles=Roles->index

GET /console/access/roles/@id=Roles->detail

GET|POST /console/acess/roles/new=Roles->create

GET /console/access/roles/@id/edit=Roles->edit
GET /console/settings=Settings->index

GET /console/messaging/@id=Messaging->index

GET|POST /console/messaging/compose=Messaging->compose

GET /console/logout=Home->logout<?php die();
[routes]
GET /console=Dashboard->index

GET /console/logout = Home->logout

GET /console/download/@extention=Export->index

POST /console/candidate/validate=Home->validate
GET|POST /console/account/@id=Dashboard->candidate

GET|POST /console/client/account/@id=Dashboard->client

GET|POST /console/admin/account/@id=Dashboard->admin
GET /console/bookings=Booking->index

GET /console/bookings/@id=Booking->getBooking

GET /console/bookings/@id/track/@action=Booking->update
GET /console/properties=Property->index

GET|POST /console/properties/@id=Property->detail

GET|POST /console/properties/new=Property->create

POST /console/properties/action/update=Property->performActions

POST /console/properties/remove=Property->removeProperty

GET /console/properties/@id/actions/@action=Property->actions

GET /console/properties/file-delete/*=Property->fileRemoval
GET /console/users=Users->index

GET /console/users/@id=Users->getUser

GET|POST /console/users/new=Users->create

POST /console/users/update=Users->update
GET /console/access/users=Staff->index

GET /console/access/users/@id=Staff->detail

GET|POST /console/acess/users/new=Staff->create

POST /console/access/users/action/update=Staff->performActions

POST /console/access/users/remove=Staff->removeStaff
GET /console/access/roles=Roles->index

GET /console/access/roles/@id=Roles->detail

GET|POST /console/acess/roles/new=Roles->create

GET /console/access/roles/@id/edit=Roles->edit
GET /console/settings=Settings->index

GET /console/messaging/@id=Messaging->index

GET|POST /console/messaging/compose=Messaging->compose

GET /console/logout=Home->logout