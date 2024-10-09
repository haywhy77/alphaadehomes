<?php
class Dashboard extends Controller{
    public function index(\Base $f3){
        $account=$f3->get('SESSION.account');
        $id=$f3->get('SESSION.user_id');
        
        
        $user=$this->db->DBSelect("admin", array("id"=>$f3->get('SESSION.user_id')))->first();
        // var_dump($user);exit;
        $f3->set('SESSION.USER',$user);
        //update `candidates` set created_at=DATE_FORMAT(created_at,'2022-%m-%d %T') where id>15 and id<12;
        $datas=$this->db->DBQuery("SELECT YEAR(c.created_at)as year, COUNT(DISTINCT id) as nos FROM candidates AS c  GROUP BY YEAR(c.created_at);")->all();
        // var_dump($datas);exit;
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

        $f3->set('fetchImage',function($id){
            
            $dft=$this->db->DBQuery("select default_picture from properties where id='{$id}'")->first();
            
            if($dft && $dft->default_picture !=''){
                return $dft->default_picture;
            }else{
                
                $dir=$this->f3->get('PROPERTY').$id;
                
                if(is_dir($dir) && file_exists($dir)){
                    $files=$this->readFilesFromDirectory($dir);
                    $first=array_pop($files);
                    return "ui/properties/{$id}/{$first}";
                }else{
                    return "ui/images/No-image.svg";
                }
            }
            
        });

        $f3->set("fixTime", function($date){
            return $this->time_elapsed_string($date);
        });

        $f3->set("calculatePercentage", function($value){
            $props=$this->db->DBQuery("select count(id) as total from properties")->first();
            return ($value/$props->total) * 100;
        });

        //Get property reviews and visit
        $properties=$this->db->DBQuery("select id, title, ratings, views, updated_at from properties order by ratings desc, views desc, id desc limit 5")->all();
        $f3->set('properties', $properties);

        //Best ratings
        $properties=$this->db->DBQuery("select id, title, category, type, ratings, views, availability, price, updated_at from properties order by ratings desc, views desc, id desc limit 3")->all();
        $f3->set('views', $properties);


        //Group by state
        $states=$this->db->DBQuery("select state, count(id) as total from properties GROUP BY state")->all();
        $f3->set('states', $states);


        //statistics
        $properties=$this->db->DBQuery("select count(id) as total, sum(views) as views from properties")->first();
        $bookings=$this->db->DBQuery("select count(id) as total from bookings")->first();
        $proper=$this->db->DBQuery("select sum(price) as total from properties where availability='sold'")->first();
        $f3->set('statistics', [
            "property"=>$properties->total,
            "booking"=>$bookings->total,
            "revenue"=>$proper->total,
            "views"=>$properties->views,
        ]);

        $f3->set("extra", [
            "css"=>[
                "ui/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
            ],
            "js"=>[
                "ui/admin/libs/apexcharts/apexcharts.min.js",
                "ui/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js",
                "ui/admin/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js",
                "ui/admin/js/pages/dashboard.init.js"
            ]
        ]);
        $f3->set('page',["title"=>"Overview", "pagetitle"=>"", "subtitle"=>""]); 
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