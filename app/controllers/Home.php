<?php
class Home extends Controller{
    static public function isLoggedIn() {
        /** @var Base $f3 */
        $f3 = \Base::instance();
        $self = new self();
        $JwtController = new Jwt($f3->get("SECRET_KEY"), $f3->get("JWT_TTL"));
                    
        $token=$f3->get('SESSION.token');
        
        if($token){
            $signature =$JwtController->decode($token);
            // echo $signature;exit;
            if(!$signature){
                $uri=$f3->get('MENU')."user_".$f3->get('SESSION.user_id').".ini.php";
                @unlink($uri);
                @$f3->clear('SESSION.token');
                @$f3->clear('SESSION.user_id');
                @$f3->clear('SESSION.USER');
                return false;
            }
            $JwtController->setTTL($f3->get("JWT_TTL"));
            // var_dump($f3->get('SESSION.account'));exit;
            if ($f3->exists('SESSION.user_id') && $f3->get('SESSION.account')=='ADMIN') {
                $user = $self->db->DBSelect("admin", array('id'=>$f3->get('SESSION.user_id')))->first();
                if($user) {
                    $f3->set('USER',$user);
                    $token =$JwtController->encode($signature);
                    $f3->set('SESSION.token', $token);
                    $root = file('app/routes/routes_admin.ini.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    
                    $preprocess=ProcessRoutes::instance();
                    $root=$preprocess->preporcess($root);
                    // var_dump($root);exit;
                    if($user->role_id==0){
                        $preprocess->config();
                    }else{
                        //get menus
                        $menus=$self->db->DBSelect("menus", array("role_id"=>$user->role_id))->all();
                        // var_dump($menus);exit;
                        if($menus && is_array($menus) && count($menus)>0){
                            $menu=array_map(function($m){
                                return $m['url'];
                            }, $menus);
                            
                            $preprocess->virtual($menu);
                            $preprocess->config();
                        }else{
                            return false;
                        }
                    }
                    
                    return true;
                }
            }
            if ($f3->exists('SESSION.user_id') && $f3->get('SESSION.account')=='USER') {
                $user = $self->db->DBSelect("users", array('id'=>$f3->get('SESSION.user_id')))->first();
                if($user) {
                    $f3->set('USER',$user);
                    $token =$JwtController->encode($signature);
                    $f3->set('SESSION.token', $token);
                    return true;
                }
            }
        }
        $uri=$f3->get('MENU')."user_".$f3->get('SESSION.user_id').".ini.php";
        @unlink($uri);
        return false;
    }

    public function validate(\Base $f3, $params){
        if ($f3->exists('POST.id')) {
            sleep(3);
            if(!$f3->exists('SESSION') || !$f3->exists('SESSION.USER')){

                $payload=[
                    "status"=>false,
                    "message"=>"User already logged out."
                ];
                $this->Response(200, $payload);exit;
            }else{
                $user=$f3->get('SESSION.USER');
                if($user["id"] != $f3->get('POST.id')){
                    $payload=[
                        "status"=>false,
                        "message"=>"User already logged out."
                    ];
                    $this->Response(200, $payload);exit;
                }

                if($user["isDefault"] == 'YES'){
                    $payload=[
                        "status"=>false,
                        "message"=>"Kindly change your password."
                    ];
                    $this->Response(200, $payload);exit;
                }
                $payload=[
                    "status"=>true,
                    "message"=>"User still login."
                ];
                $this->Response(200, $payload);exit;
            }
        }
    }

    public function admin_login($f3,$params) {
        // var_dump($params);exit;
        if ($f3->exists('POST.email') && $f3->exists('POST.password')) {
            sleep(3); // login should take a while to kick-ass brute force attacks
            $user = $this->db->DBSelect("admin", array('email'=>$f3->get('POST.email')))->first();
            // var_dump($user);exit;
            if ($user) {
                // check hash engine
                $hash_engine = $f3->get('password_hash_engine');
                $valid = false;
                if($hash_engine == 'bcrypt') {
                    $valid = \Bcrypt::instance()->verify($f3->get('POST.password'), $user->password);
                } elseif($hash_engine == 'md5') {
                    $valid = (md5($f3->get('POST.password').$f3->get('password_md5_salt')) == $user->password);
                }

                if(!$valid){
                    \Flash::instance()->addMessage('Invalid password', 'danger');
                }else if($user->role_id>0 && $user->isVerify==0){
                    \Flash::instance()->addMessage('Kindly verify your account from your mail.', 'danger');
                }else if($user->role_id>0 && $user->status!=='ACTIVE'){
                    \Flash::instance()->addMessage('Ypur account has been deactivated. Kindly contact admin for assistance.', 'danger');
                }else{
                    @$f3->clear('SESSION');
                    $f3->set('SESSION.user_id',$user->id);
                    if($user->isDefault=='YES'){
                        $f3->reroute("/admin/change-password");
                    }
                    //recreate session id
                    $JwtController = new Jwt($f3->get("SECRET_KEY"), $f3->get("JWT_TTL"));
                    
                    $payload = [
                        "id" => $user->id,
                        "name" => $user->names,
                        "type" => 'ADMIN'
                    ];
                    $token =$JwtController->encode($payload);
                    $f3->set('SESSION.token', $token);
                    $f3->set('SESSION.account', 'ADMIN');
                    if($f3->get('CONFIG.ssl_backend'))
                        $f3->reroute($f3->get('PROTOCOL').$f3->get('HOST').$f3->get('BASE').'/');
                    else $f3->reroute('/console');
                }
            }else{
                \Flash::instance()->addMessage('Invalid email address', 'danger');
            }
        }
        $f3->set('page', ["title"=>"Login"]);
        $f3->set('form.action', 'admin');
        echo Template::instance()->render('auth/login.html');die();
        // $this->f3->set('template','auth/login.html');
    }

    public function admin_invitation(\Base $f3, $params){
        $id=$params["id"];
        $f3->set("id", $id);
        $user=$this->db->DBQuery("select * from users where MD5(id)='$id'")->first();
        if(!$user){
            \Flash::instance()->addMessage("Invalid invitation link.", 'danger');
        }else{
            if($user->isVerify==1){
                \Flash::instance()->addMessage("Account already activated.", 'warning');
                $f3->reroute("/admin");
            }
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
                    "isVerify"=>true,
                    'status'=>'ACTIVE'
                ];
                $row=$this->db->DBUpdate("users", $record, array("id"=>$user->id), array("password"));
                
                if(!$row->resp) {
                    \Flash::instance()->addMessage($row->message, 'danger');
                }
                \Flash::instance()->addMessage("Signup completed successful", 'success');
                $f3->reroute("/admin");
            }
        }
        
        echo Template::instance()->render('auth/invitation.html');die();
    }

    public function admin_reset($f3, $params) {
        
        if ($f3->exists('POST.email')) {
            sleep(3); // login should take a while to kick-ass brute force attacks
            $user = $this->db->DBSelect("users", array('email'=>$f3->get('POST.email')))->first();
            // var_dump($user);exit;
            if ($user) {
                // check hash engine
                $pwd=$this->code_generator('','',8);
                $password='';
                $hash_engine = $f3->get('password_hash_engine');
                if($hash_engine == 'bcrypt') {
                    $password = \Bcrypt::instance()->hash($pwd, $f3->get('password_md5_salt'));
                } elseif($hash_engine == 'md5') {
                    $password = md5($pwd.$f3->get('password_md5_salt'));
                }
                $row=$this->db->DBUpdate("users", array("password"=>$password, 'isDefault'=>'YES'), array("id"=>$user->id), array("password"));

                
                $f3->set("data", array(
                    "name"=>$user->names,
                    "password"=>$pwd
                ));
                // send email notification to the user account for verification
                $content = Template::instance()->render( "email/reset.htm" );
            
                $mail=SendMail::instance()->send("", ["email"=>$user->email, "name"=>$user->names], "Password Reset",$content);
                \Flash::instance()->addMessage('New password sent to your email.', 'success');
            }else{
                \Flash::instance()->addMessage('User account doesnt exist.', 'danger');
            }
            
        }
        $f3->set('form.action', 'admin');
        echo Template::instance()->render('auth/reset.html');die();
        // $this->f3->set('template','auth/login.html');
    }

    public function admin_change($f3, $params) {
        // var_dump($f3->get('SESSION.user_id'));exit;
        if ($f3->exists('POST.password') && $f3->exists('POST.cpassword')) {
            sleep(3); // login should take a while to kick-ass brute force attacks
            if($f3->get("POST.password") != $f3->get("POST.cpassword")){
                \Flash::instance()->addMessage('Passwords do match.', 'danger');
            }else{
                $id=$f3->get('SESSION.user_id');
                $user = $this->db->DBSelect("users", array('id'=>$id))->first();
                // var_dump($user);exit;
                if ($user) {
                    // check hash engine
                    
                    $password='';
                    $hash_engine = $f3->get('password_hash_engine');
                    if($hash_engine == 'bcrypt') {
                        $password = \Bcrypt::instance()->hash($f3->get('POST.password'), $f3->get('password_md5_salt'));
                    } elseif($hash_engine == 'md5') {
                        $password = md5($f3->get('POST.password').$f3->get('password_md5_salt'));
                    }
                    $row=$this->db->DBUpdate("users", array("password"=>$password, 'isDefault'=>'NO'), array("id"=>$user->id), array("password"));
                    // var_dump($row);exit;
                    
                    $f3->set("data", array(
                        "name"=>$user->names,
                        "password"=>$f3->get('POST.password')
                    ));
                    
                    // send email notification to the user account for verification
                    $content = Template::instance()->render( "email/reset.htm" );
                
                    $mail=SendMail::instance()->send("", ["email"=>$user->email, "name"=>$user->names], "Password Reset",$content);
                    $f3->clear('SESSION');
                    \Flash::instance()->addMessage('Password changed. Kindly login with the new password..', 'success');
                }else{
                    \Flash::instance()->addMessage('User account doesnt exist.', 'danger');
                }
            }
        }
        $f3->set('form.action', 'admin');
        echo Template::instance()->render('auth/change.html');die();
        // $this->f3->set('template','auth/login.html');
    }
        
    public function logout($f3,$params) {
        $uri=$f3->get('MENU')."user_".$this->f3->get('SESSION.user_id').".ini.php";
        @unlink($uri);
        $user=$f3->get('SESSION.account');
        $f3->clear('SESSION');
        
        if($user=='USER'){
            $f3->reroute($f3->get('HOME')); //$f3->get('PROTOCOL').$f3->get('HOST')
        }else{
            $f3->reroute($f3->get('PROTOCOL').$f3->get('HOST').$f3->get('BASE').'/'.strtolower($user));
        }
        
    }
}