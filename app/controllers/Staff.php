<?php
class Staff extends Controller{
    public function index(\Base $f3){
        parse_str($f3->get("QUERY"), $params); 
        // var_dump($params);exit;
        $page=array_key_exists('page', $params)?$params["page"] : 1;
        $limit=array_key_exists('limit', $params)?$params["limit"] : 20;
        $clients=$this->db->DBQuery("select admin.*, roles.name as role from admin, roles where admin.role_id=roles.id and admin.id <> {$f3->get('SESSION.user_id')}")->paginates($page, $limit);
        $f3->set('staff',$clients);
        // var_dump($clients);exit;
        $f3->set('page',["title"=>"Admin users", "pagetitle"=>"", "subtitle"=>"List", "actionButton"=>["title"=>"Add user", "url"=>"console/acess/users/new"]]); 
        $f3->set('template','pages/staff/manage.htm');
    }

    public function getUsers(\Base $f3, $params){
        $id=$params["id"];
        //get applicant details from db
        $f3->set('template','pages/applicant.htm');
    }

    public function create(\Base $f3){
        
        if ($f3->exists('POST.name') && $f3->exists('POST.email')) {
            sleep(3); // login should take a while to kick-ass brute force attacks
            $email=stripslashes(strip_tags($this->f3->get('POST.email')));
            $name=stripslashes(strip_tags($this->f3->get('POST.name')));
            $role=stripslashes(strip_tags($this->f3->get('POST.role')));
            $user = $this->db->DBSelect("admin", array('email'=>$email))->first();
            $otp=$this->code_generator(6);
            
           
            if (!$user) {
                // check hash engine
                $hash_engine = $f3->get('password_hash_engine');
                $password="";
                if($hash_engine == 'bcrypt') {
                    $password = \Bcrypt::instance()->hash($otp, $f3->get('password_md5_salt'));
                } elseif($hash_engine == 'md5') {
                    $password = md5($otp.$f3->get('password_md5_salt'));
                }
                $record=[
                    "names"=>$name,
                    "email"=>$email,
                    "password"=>$password,
                    "role_id"=>$role
                ];
                $row=$this->db->DBInsert("admin", $record, array("names", "email", "password", "role_id"));
                
                if(!$row->resp) {
                    \Flash::instance()->addMessage($row->message, 'danger');
                }else{
                    $link=$f3->get('PROTOCOL').$f3->get('HOST').$f3->get('BASE').'/invitation/'.md5($row->code);
                    $f3->set("data", array(
                        "name"=>$name,
                        "link"=>$link
                    ));
                    
                    // send email notification to the user account for verification
                    $content = Template::instance()->render( "email/invitation.htm" );
                
                    $mail=SendMail::instance()->send("", ["email"=>$email, "name"=>$name], "Welcome on board to ".$this->f3->get("business"),$content);
                    
                    
                    \Flash::instance()->addMessage("Invitation sent successfully", 'success');
                }
            }else{
                
                \Flash::instance()->addMessage('', 'danger');

            }
        }
        
        $f3->set("roles", $this->db->DBSelect("roles", array())->all());
        
        $f3->set('page',["title"=>"Admin users", "pagetitle"=>"", "subtitle"=>"List", "actionButton"=>["title"=>"View user lists", "url"=>"console/access/users"]]); 
        $f3->set('template','forms/invite.html');
    }
    public function profile(\Base $f3, $params){
        $id=$params["id"];
        $f3->set("id", $id);
        $table='';
        $url="";
        switch($f3->get('SESSION.account')){
            case'ADMIN':
                $table='users';
                $url="";
            break;
            case'CLIENT':
                $table='client';
            break;
            default:
                $table='candidates';
        }
        $user=$this->db->DBSelect($table, array("id"=>$id))->first();
        if(!$user){
            \Flash::instance()->addMessage("Invalid invitation link.", 'danger');
        }else{
            if ($f3->exists('POST.password')) {
                sleep(3); // login should take a while to kick-ass brute force attacks
                $email=stripslashes(strip_tags($user->email));
                $password=stripslashes(strip_tags($this->f3->get('POST.password')));
                
                $hash_engine = $f3->get('password_hash_engine');
                    
                if($hash_engine == 'bcrypt') {
                    $password = \Bcrypt::instance()->hash($password, $f3->get('password_md5_salt'));
                } elseif($hash_engine == 'md5') {
                    $password = md5($f3->get('POST.password').$f3->get('password_md5_salt'));
                }
                $record=[
                    "password"=>$password,
                    "isVerify"=>true
                ];
                $row=$this->db->DBUpdate("users", $record, array("id"=>$user->id), array("password"));
                
                if(!$row->resp) {
                    \Flash::instance()->addMessage($row->message, 'danger');
                }
                \Flash::instance()->addMessage("Signup completed successfully", 'success');
                $f3->reroute("/admin");
            }
        }
        $user=$this->db->DBSelect($table, array("id"=>$id))->first();
        $f3->set("profile", $user);
        $f3->set('template','forms/user.html');
    }

    public function update(\Base $f3){
        $row=[];
        if($f3->get('POST.client_action')=='DELETED'){
            $row=$this->db->DBDelete("users", array("id"=>$f3->get('POST.client_user_id')));
        }else{
            $row=$this->db->DBUpdate("users", array("status"=>$f3->get('POST.client_action')), array("id"=>$f3->get('POST.client_user_id')), array());
        }
        
        if($row->resp){
            $payload=[
                "status"=>true,
                "message"=>"Record updates successfully"
            ];
            $this->Response(200, $payload);exit;
        }else{
            $payload=[
                "status"=>false,
                "message"=>$row->message
            ];
            $this->Response(200, $payload);exit;
        }
    }

}