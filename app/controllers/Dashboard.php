<?php
class Dashboard extends Controller{
    public function index(\Base $f3){
        $account=$f3->get('SESSION.account');
        $id=$f3->get('SESSION.user_id');
        
        
        $user=$this->db->DBSelect("users", array("id"=>$f3->get('SESSION.user_id')))->first();
        $f3->set('USER',$user);
        //update `candidates` set created_at=DATE_FORMAT(created_at,'2022-%m-%d %T') where id>15 and id<12;
        $datas=$this->db->DBQuery("SELECT YEAR(c.created_at)as year, COUNT(DISTINCT id) as nos FROM candidates AS c  GROUP BY YEAR(c.created_at);")->all();
        $barchart=[];
        $total=0;
        if($datas){
            foreach($datas as $data){
                $barchart[$data['year']]=$data['nos'];
                $total +=$data['nos'];
            };    
        }
        
        // var_dump($barchart);exit;
        $f3->set('barchartYear',rtrim(implode(",", array_keys($barchart)), ","));
        $f3->set('barchartValue', rtrim(implode(",", array_values($barchart)), ","));
        $f3->set('barchart', $barchart);
        $f3->set("extra", [
            "js"=>[
                "js/vendors/chartjs/Chart.bundle.min.js",
                "js/vendors/chartjs/utils.js"
            ]
        ]);
        $f3->set('template','pages/dashboard/admin.htm'); 
    }

    public function candidate(\Base $f3, $params){
        $id=$params["id"];
        
        $user=$this->db->DBSelect("candidates", array("id"=>$id))->first();
        if(!$user){
            \Flash::instance()->addMessage("User Account Not Found.", 'danger');
        }else{
            
            if ($f3->exists('POST.name') || $f3->exists('POST.gender') || $f3->exists('POST.phone') || $f3->exists('POST.location') || $f3->exists('POST.about_me') || $f3->exists('POST.linkedin') || $f3->exists('POST.portfolio') && $f3->exists('POST.skills')) {
                sleep(3); // login should take a while to kick-ass brute force attacks
                // var_dump($f3->get('POST'));exit;
                
                $name=stripslashes(strip_tags($f3->get('POST.name')));
                $gender=stripslashes(strip_tags($f3->get('POST.gender')));
                $phone=stripslashes(strip_tags($f3->get('POST.phone')));
                $location=stripslashes(strip_tags($f3->get('POST.location')));
                $about_me=stripslashes(strip_tags($f3->get('POST.about_me')));
                $linkedin=stripslashes(strip_tags($f3->get('POST.linkedin')));
                $portfolio=stripslashes(strip_tags($this->f3->get('POST.portfolio')));
                $skills=$f3->get('POST.skills');
                
                
                //upload passport
                $overwrite = true; // set to true, to overwrite an existing file; Default: false
                $slug = true; // rename file to filesystem-friendly version
                $web = \Web::instance();
                $pfiles = $web->receive(function($file,$formFieldName){
                        // $file['name'] already contains the slugged name now

                        // maybe you want to check the file size
                        if($file['size'] > (2 * 1024 * 1024)) // if bigger than 2 MB
                            return false; // this file is not valid, return false will skip moving it

                        // everything went fine, hurray!
                        return true; // allows the file to be moved from php tmp dir to your defined upload dir
                    },
                    $overwrite,
                    $slug
                );
                // var_dump($pfiles);exit;
                $files=array_keys($pfiles);
                $record=[
                    'passport'=>$pfiles[$files[0]]? $files[0]:"",
                    "name"=>$name,
                    "gender"=>$gender,
                    'phone'=>$phone,
                    "location"=>$location,
                    "about_me"=>$about_me,
                    'linkedin_url'=>$linkedin,
                    "portfolio_url"=>$portfolio,
                    "skills"=>is_array($skills) && count($skills)>0?implode(",", $skills):"",
                    "isVerify"=>'VERIFIED',
                    "status"=>'ACTIVE',
                    'default_resume'=>$pfiles[$files[1]]? $files[1]:"",
                ];
                // var_dump($record);exit;
                $row=$this->db->DBUpdate("candidates", $record, array("id"=>$user->id), array());
                
                if(!$row->resp) {
                    \Flash::instance()->addMessage($row->message, 'danger');
                }else{
                    \Flash::instance()->addMessage("Profile updated successfully...you can now continue to Overview", 'success');
                }
                // $f3->clear('POST');
            }
        }
        $skills=$this->db->DBSelect("skills", array())->all();
        $f3->set('skills',$skills);
        $profile=$this->db->DBSelect("candidates", array('id'=>$id))->first();
        $f3->set('profile',$profile);
        $f3->set("extra", [
            "js"=>[
                "js/vendors/select2/select2.min.js"
            ]
        ]);
        $f3->set('template','forms/candidate.html');
    }
}