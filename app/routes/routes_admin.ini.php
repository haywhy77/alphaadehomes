[routes]
;to comment out a route, just preced it with a semi-colon(;)
;;General menu
{verbs:GET, url:/console=Dashboard->index, required: true, title: Dashboard}
{verbs:GET, url:/console/logout = Home->logout, required: true, title: Logout}
{verbs:GET, url:/console/download/@extention=Export->index, required: false, title: Export} 
{verbs:POST, url:/console/candidate/validate=Home->validate, required: false, title: Validate}


;;Account menu
{verbs:GET|POST, url:/console/account/@id=Dashboard->candidate, required: false, title: dashboard}
{verbs:GET|POST, url:/console/client/account/@id=Dashboard->client, required: false, title: Update User account}
{verbs:GET|POST, url:/console/admin/account/@id=Dashboard->admin, required: false, title: Update admin account}

;;Booking menu
{verbs:GET, url:/console/bookings=Booking->index, required: false, title: Booking overview}
{verbs:GET, url:/console/bookings/@id=Booking->getBooking, required: false, title: View booking detail}
{verbs:GET, url:/console/bookings/@id/track/@action=Booking->update, required: false, title: Update booking detail}

;;Properties menu
{verbs:GET, url:/console/properties=Property->index, required: false, title: Property overview}
{verbs:GET|POST, url:/console/properties/@id=Property->detail, required: false, title: View single property detail}
{verbs:GET|POST, url:/console/properties/new=Property->create, required: false, title: Create property}
{verbs:POST, url:/console/properties/action/update=Property->performActions, required: false, title: Perform actions on properties}
{verbs:POST, url:/console/properties/remove=Property->removeProperty, required: false, title: Trash properties}
{verbs:GET, url:/console/properties/@id/actions/@action=Property->actions, required: false, title: Trash properties}
{verbs:GET, url:/console/properties/file-delete/*=Property->fileRemoval, required: true, title: System file removal}

;;Users menu
{verbs:GET, url:/console/users=Users->index, required: false, title: View registered user lists}
{verbs:GET, url:/console/users/@id=Users->getUser, required: false, title: View user profile}
{verbs:GET|POST, url:/console/users/new=Users->create, required: false, title: Create user from admin}
{verbs:POST, url:/console/users/update=Users->update, required: false, title: Update user profile from admin}

;;Admin users menus
{verbs:GET, url:/console/access/users=Staff->index, required: false, title: View list of admin users}
{verbs:GET, url:/console/access/users/@id=Staff->detail, required: false, title: View admin user profile}
{verbs:GET|POST, url:/console/acess/users/new=Staff->create, required: false, title: Create/invite admin user}
{verbs:POST, url:/console/access/users/action/update=Staff->performActions, required: false, title: Update admin user profile}
{verbs:POST, url:/console/access/users/remove=Staff->removeStaff, required: false, title: Trash admin user profile}

;;Roles menu
{verbs:GET, url:/console/access/roles=Roles->index, required: false, title: Manage access roles}
{verbs:GET, url:/console/access/roles/@id=Roles->detail, required: false, title: View role details}
{verbs:GET|POST, url:/console/acess/roles/new=Roles->create, required: false, title: Create access role}
{verbs:GET, url:/console/access/roles/@id/edit=Roles->edit, required: false, title: Edit role}


;;Settings menus
{verbs:GET, url:/console/settings=Settings->index, required: false, title: Manage application settings}



{verbs:GET, url:/console/messaging/@id=Messaging->index, required: false, title: Manage message center}
{verbs:GET|POST, url:/console/messaging/compose=Messaging->compose, required: false, title: Allow group to send out mails}


