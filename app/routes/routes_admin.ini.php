[routes]

GET /console=Dashboard->index
GET /console/logout = Home->logout
GET /console/download/@extention=Export->index
POST /console/candidate/validate=Home->validate


GET|POST /console/account/@id=Dashboard->candidate
GET|POST /console/client/account/@id=Dashboard->client
GET|POST /console/admin/account/@id=Dashboard->admin


POST /console/@path/create=Candidates->create
GET /console/@path/add=Candidates->add

GET /console/executives/view=Candidates->getExecutives
GET /console/executives/@id/detail=Candidates->details
GET /console/executives/@id/update=Candidates->add


GET /console/candidates/view=Candidates->getExecutives
GET /console/candidates/@id/detail=Candidates->details
POST /console/candidates/@id/update=Candidates->update
POST /console/candidates/create=Candidates->create
GET /console/candidates/add=Candidates->add

GET /console/legislatives/view=Candidates->getExecutives
GET /console/legislatives/@id/detail=Candidates->details
POST /console/legislatives/@id/update=Candidates->update

GET /console/overview=Candidates->index


GET /console/staff=Staff->index
GET /console/staff/@id=Staff->detail
POST /console/staff/action/update=Staff->performActions
POST /console/staff/remove=Staff->removeStaff


GET /console/access/users=Users->index
GET /console/access/users/@id=Users->getUser
GET|POST /console/access/users/new=Users->create
POST /console/access/users/update=Users->update


GET /console/settings=Settings->index



GET /console/messaging/@id=Messaging->index
GET|POST /console/messaging/compose=Messaging->compose


GET|POST /console/settings/positions=Settings->positions
GET|POST /console/settings/parties=Settings->parties
GET|POST /console/settings/performance=Settings->performance