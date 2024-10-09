<?php
class Property extends Controller{
    public function index(\Base $f3){
        parse_str($f3->get("QUERY"), $params); 
        // var_dump($params);exit;
        $page=array_key_exists('page', $params)?$params["page"] : 1;
        $limit=array_key_exists('limit', $params)?$params["limit"] : 20;
        $clients=$this->db->DBQuery("select * from properties order by id desc")->paginates($page, $limit);
        $f3->set('properties',$clients);
        // var_dump($clients);exit;
        $f3->set('page',["title"=>"Properties", "pagetitle"=>"", "subtitle"=>"List", "actionButton"=>["title"=>"Add new property", "url"=>"console/properties/new"]]); 
        $f3->set('template','pages/property/manage.htm');
        $f3->set("extra", [
            "css"=>[
                "/ui/admin/css/extended.css"
            ]
        ]);
    }

    public function getUsers(\Base $f3, $params){
        $id=$params["id"];
        //get applicant details from db
        $f3->set('template','pages/applicant.htm');
    }

    public function create(\Base $f3){
        
        if ($f3->exists('POST') && $f3->exists('POST.title')) {
            
            // var_dump($f3->get('POST'));exit;
            sleep(3); // login should take a while to kick-ass brute force attacks
            $title=$f3->exists('POST.title')?stripslashes(strip_tags($this->f3->get('POST.title'))):'';
            $category=$f3->exists('POST.category')?stripslashes(strip_tags($this->f3->get('POST.category'))):'';
            $type=$f3->exists('POST.type')?stripslashes(strip_tags($this->f3->get('POST.type'))):'';
            $description=$f3->exists('POST.description')?stripslashes(strip_tags($this->f3->get('POST.description'))):'';
            $price=$f3->exists('POST.price')?stripslashes(strip_tags($this->f3->get('POST.price'))):'';
            $bedroom=$f3->exists('POST.bedroom')?stripslashes(strip_tags($this->f3->get('POST.bedroom'))):'';
            $bathroom=$f3->exists('POST.bathroom')?stripslashes(strip_tags($this->f3->get('POST.bathroom'))):'';
            $measurement=$f3->exists('POST.measurement')?stripslashes(strip_tags($this->f3->get('POST.measurement'))):'';

            $address=$f3->exists('POST.address')?stripslashes(strip_tags($this->f3->get('POST.address'))):'';
            $city=$f3->exists('POST.city')?stripslashes(strip_tags($this->f3->get('POST.city'))):'';
            $region=$f3->exists('POST.region')?stripslashes(strip_tags($this->f3->get('POST.region'))):'';
            $zipcode=$f3->exists('POST.zipcode')?stripslashes(strip_tags($this->f3->get('POST.zipcode'))):'';
            $longitude=$f3->exists('POST.longitutde')?stripslashes(strip_tags($this->f3->get('POST.longitutde'))):'';
            $latitude=$f3->exists('POST.latitude')?stripslashes(strip_tags($this->f3->get('POST.latitude'))):'';
            $pictures=$this->f3->get('POST.pictures');

            $record=[
                'category'=>$category, 
                'type'=>$type, 
                'title'=>$title, 
                'description'=>$description, 
                'price'=>$price, 
                'bedrooms'=>$bedroom, 
                'bathrooms'=>$bathroom, 
                'square_feet'=>$measurement, 
                'address'=>$address, 
                'city'=>$city,
                'state'=>$region,
                'zip_code'=>$zipcode,
                'latitude'=>$latitude,
                'longitude'=>$longitude
            ];
            $row=$this->db->DBInsert("properties", $record, array('category', 'type', 'title'));
                
            if(!$row->resp) {
                \Flash::instance()->addMessage($row->message, 'danger');
            }else{
                $dir=$f3->get('PROPERTY').$row->code;
                if(is_array($pictures) && count($pictures)>0){
                    foreach($pictures as $file){
                        // var_dump($file); echo "<br>";
                        if(empty($file) || $file ==='undefined'){
                            continue;
                        }
                        $filename=$dir.'/'.$this->createFileName().'.jpg';
                        $url =$this->createIMG($file, $filename);
                    }
                }
                
                \Flash::instance()->addMessage("Property added successfully.", 'success');
            }
        }
        $f3->set("extra", [
            "css"=>[
                "ui/plugins/micteditor/rte.css",
                "ui/admin/libs/select2/css/select2.min.css",
                "ui/admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css",
                "ui/admin/libs/spectrum-colorpicker2/spectrum.min.css",
                "ui/admin/libs/dropzone/min/dropzone.min.css",
                "ui/admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css",
               
            ],
            "js"=>[
                "ui/plugins/micteditor/rte.js",
                "ui/admin/libs/select2/js/select2.min.js",
                "ui/admin/libs/dropzone/min/dropzone.min.js",
                "ui/admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
                "ui/admin/libs/spectrum-colorpicker2/spectrum.min.js",
                "ui/admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js",
                "ui/admin/libs/bootstrap-maxlength/bootstrap-maxlength.min.js",
                "ui/admin/js/pages/form-advanced.init.js"
            ]
        ]);
        
        $f3->set('page',["title"=>"Add new property", "pagetitle"=>"", "subtitle"=>"List", "actionButton"=>["title"=>"View property lists", "url"=>"console/properties"]]); 
        $f3->set('template','forms/property.html');
    }
    public function detail(\Base $f3, $params){
        $id=$params["id"];
        $f3->set("id", $id);
        parse_str($f3->get("QUERY"), $queries); 

        if ($f3->exists('POST') && $f3->exists('POST.pictures')) {
            $pictures=$this->f3->get('POST.pictures');
            $dir=$f3->get('PROPERTY').$id;
            if(is_array($pictures) && count($pictures)>0){
                foreach($pictures as $file){
                    // var_dump($file); echo "<br>";
                    if(empty($file) || $file ==='undefined'){
                        continue;
                    }
                    $filename=$dir.'/'.$this->createFileName().'.jpg';
                    $url =$this->createIMG($file, $filename);
                }
            }
            
            \Flash::instance()->addMessage("Property added successfully.", 'success');
        }
        
        $property=$this->db->DBSelect("properties", array("id"=>$id))->first();
        if(!$property){
            \Flash::instance()->addMessage("Property no longer exists.", 'danger');
            $f3->reroute("/console/properties");exit;
        }else{
            $dir=$f3->get('PROPERTY').$property->id;
            if(is_dir($dir) && file_exists($dir)){
                $files=$this->readFilesFromDirectory($dir);
                $property->pictures=$files;
            }
            if($queries && !$queries["access_view"] && !$f3->exists('SESSION.user_id')){
                $count=$property->views + 1;
                $this->db->DBUpdate("properties", array("views"=>$count), array("id"=>$property->id), array());
            }
            
        }
        $f3->set("extra", [
            "css"=>[
                "ui/admin/libs/dropzone/min/dropzone.min.css",
                "ui/admin/libs/bootstrap-rating/bootstrap-rating.css",
                "ui/admin/libs/magnific-popup/magnific-popup.css",
            ],
            "js"=>[
                "ui/admin/libs/dropzone/min/dropzone.min.js",
                "ui/admin/libs/bootstrap-rating/bootstrap-rating.min.js",
                "ui/admin/libs/magnific-popup/jquery.magnific-popup.min.js",
                "ui/admin/js/pages/lightbox.init.js",
            ]
        ]);
        $f3->set("property", $property);
        $f3->set('page',["title"=>$property->title, "pagetitle"=>"", "subtitle"=>"Detail", "actionButton"=>["title"=>"View property lists", "url"=>"console/properties"]]); 
        $f3->set('template','pages/property/detail.htm');
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

    public function actions(\Base $f3, $params){
        $id=$params['id'];
        switch($params['action']){
            case'available':
                $row=$this->db->DBUpdate("properties", array('availability'=>'available'), array('id'=>$id), array());
                \Flash::instance()->addMessage("Property processed to be available.", 'success');
            break;
            case'sold':
                $row=$this->db->DBUpdate("properties", array('availability'=>'sold'), array('id'=>$id), array());
                \Flash::instance()->addMessage("Property marked as sold.", 'success');
            break;
            case'pending':
                $row=$this->db->DBUpdate("properties", array('status'=>'pending'), array('id'=>$id), array());
                \Flash::instance()->addMessage("Property marked as pending.", 'success');
            break;
            case'publish':
                $row=$this->db->DBUpdate("properties", array('status'=>'publish'), array('id'=>$id), array());
                \Flash::instance()->addMessage("Property has been publish.", 'success');
            break;
            case'trash':
                $row=$this->db->DBDelete("properties", array('id'=>$id));
                if($row->resp){
                    $dir="ui/properties/".$params['id'];
                    if(is_dir($dir)){
                        @rmdir($dir);
                    }
                }
                \Flash::instance()->addMessage("Property has been trashed.", 'success');
            break;
        }
        $f3->reroute("/console/properties/".$params['id']);
    }

    public function fileRemoval(\Base $f3, $params){
        $params=explode("/", $params['*']);
        $params[0]=str_replace("@",".",str_replace("__","/", $params[0]));
        $params[1]=str_replace("@",".",str_replace("__","/", $params[1]));
        // var_dump($params);exit;
        if(file_exists($params[0])){
            @unlink($params[0]);
            \Flash::instance()->addMessage("File removed from the system.", 'success');
        }else{
            \Flash::instance()->addMessage("File doesnt exist.", 'danger');
        }
        $f3->reroute($params[1]);exit;
    }

    public function getProperties(\Base $f3, $params){
        // var_dump($params);exit;
        $category=$params["category"];
        parse_str($f3->get("QUERY"), $params); 
        
        $page=array_key_exists('page', $params)?$params["page"] : 1;
        $limit=array_key_exists('limit', $params)?$params["limit"] : 20;
        $sql="select * from properties where status='publish'";
        if($category){
            $sql.=" and category='$category'";
        }
        $properties=$this->db->DBQuery("$sql order by id desc")->paginates($page, $limit);
        $f3->set('properties',$properties);

        $f3->set('getSize', function($filename){
            // var_dump(getimagesize($filename));exit;
            return getimagesize($filename)[1];
        });

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

        // var_dump($properties['data']);exit;
        
        $f3->set('page',["title"=>ucfirst($category), "pagetitle"=>"", "subtitle"=>"Property listing"]); 
        echo Template::instance()->render('public/property.htm');die();
    }

    public function viewProperties(\Base $f3, $params){
        $id=$params['id'];
        // var_dump($f3->get('POST'));exit;
        if ($f3->exists('POST') && $f3->exists('POST.name') && $f3->exists('POST.email') && $f3->exists('POST.message')) {
            sleep(3);
            $record=[
                "email"=>$f3->get('POST.email'),
                "name"=>$f3->get('POST.name'),
                "message"=>strip_tags(html_entity_decode($f3->get('POST.message'))),
                "property_id"=>$f3->get('POST.index')
            ];

            $row=$this->db->DBInsert("bookings", $record, array("email", "name", "message", "property_id"));
            // var_dump($row);exit;
            if(!$row->resp){
                \Flash::instance()->addMessage($row->message, 'danger');
            }else{
                //send a mail to an agent.
                \Flash::instance()->addMessage("Your booking is recieved. One of our agent will follow up with you shortly.", 'success');
            }
        }

        $property=$this->db->DBQuery("select * from properties where MD5(id)='{$id}'")->first();
        if($property){
            $dir=$this->f3->get('PROPERTY').$property->id;
            if(is_dir($dir) && file_exists($dir)){
                $files=$this->readFilesFromDirectory($dir);
                $property->pictures=array_values($files);
            }else{
                $property->pictures=[];
            }
            // var_dump($property->pictures);exit;
            if($property->default_picture ==''){
                if(count($property->pictures)>0){
                    $first=$property->pictures[0];
                    $property->default_picture="{$dir}/{$first}";
                }else{
                    $property->default_picture="ui/images/No-image.svg";
                }
            }
            $ratings=$property->ratings !=''?explode(":", $property->ratings):array(0, 0);
            $property->ratings=$ratings[0];

            $count=$this->db->DBQuery("select count(id) as total from bookings where MD5(property_id)='{$id}'")->first();
            $property->comment=$count->total;
        }
        // var_dump($property);exit;
        $f3->set('property',$property);

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

        $properties=$this->db->DBQuery("select * from properties where id !='{$property->id}' order by id desc limit 3")->all();
        $f3->set('properties',$properties);
        $f3->set('page',["title"=>ucfirst($property->title), "pagetitle"=>"", "subtitle"=>"Detail"]); 
        echo Template::instance()->render('public/detail.htm');die();
    }

    public function rateProperty(\Base $f3, $params){
        $id=$params["id"];
        
        if ($f3->exists('POST') && $f3->exists('POST.move_id') && $f3->exists('POST.user_rating')) {
            sleep(3);
            $property=$this->db->DBQuery("select * from properties where MD5(id)='{$id}'")->first();
            // var_dump($property);exit;
            if($property && $f3->get('POST.move_id')=='ratings'){
                $rate=((int)$f3->get('POST.user_rating')/5) * 100;
                $ratings=$property->ratings !=''?explode(":", $property->ratings):array(0, 0);
                
                $ratings[1]=(int)$ratings[1] + 1;
                $ratings[0]=($rate + (int)$ratings[0])/$ratings[1];
                $record=[
                    "ratings"=>implode(":", $ratings)
                ];
                $row=$this->db->DBUpdate("properties", $record, array("id"=>$property->id), array());
                
                if($row->resp){
                    echo $this->Response(200, [
                        "status"=>true,
                        "message"=>"Property has been rated accordingly."
                    ]);exit;
                }else{
                    echo $this->Response(200, [
                        "status"=>false,
                        "message"=>$row->message
                    ]);exit;
                }
            }
        }
    }
}