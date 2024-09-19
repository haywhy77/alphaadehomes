[routes]

GET /=Dashboard->index
GET /logout = Home->logout
GET /download/@extention=Export->index
POST /candidate/validate=Home->validate


GET|POST /account/@id=Dashboard->candidate
GET|POST /client/account/@id=Dashboard->client
GET|POST /admin/account/@id=Dashboard->admin


POST /@path/create=Candidates->create
GET /@path/add=Candidates->add

GET /executives/view=Candidates->getExecutives
GET /executives/@id/detail=Candidates->details
GET /executives/@id/update=Candidates->add


GET /candidates/view=Candidates->getExecutives
GET /candidates/@id/detail=Candidates->details
POST /candidates/@id/update=Candidates->update
POST /candidates/create=Candidates->create
GET /candidates/add=Candidates->add

GET /legislatives/view=Candidates->getExecutives
GET /legislatives/@id/detail=Candidates->details
POST /legislatives/@id/update=Candidates->update

GET /overview=Candidates->index


GET /staff=Staff->index
GET /staff/@id=Staff->detail
POST /staff/action/update=Staff->performActions
POST /staff/remove=Staff->removeStaff


GET /access/users=Users->index
GET /access/users/@id=Users->getUser
GET|POST /access/users/new=Users->create
POST /access/users/update=Users->update


GET /settings=Settings->index



GET /messaging/@id=Messaging->index
GET|POST /messaging/compose=Messaging->compose


GET|POST /settings/positions=Settings->positions
GET|POST /settings/parties=Settings->parties
GET|POST /settings/performance=Settings->performance

[maps]
