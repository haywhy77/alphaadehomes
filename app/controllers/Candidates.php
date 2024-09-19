<?php
class Candidates extends Controller{
    public function index(\Base $f3, $params){
        parse_str($f3->get("QUERY"), $param); 
        $page=array_key_exists('page', $param)?$param["page"] : 1;
        $limit=array_key_exists('limit', $param)?$param["limit"] : 20;
        $status=array_key_exists('status', $param)?$param["status"] : "";
        $duration=array_key_exists('duration', $param)?$param["duration"] : "";
        $sql="select * from candidates where 1=1";
        if(!empty($status)){
            $sql.=" and applications.status='$status'";
        }
        if(!empty($duration)){
            if($duration==1){
                $sql.=" and MONTH(applications.created_at)=MONTH(CURRENT_DATE())";
            }else if(2){
                $sql.=" and MOTH(applications.created_at)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
            }else{
                $sql.=" and MONTH(applications.created_at) < MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
            }
        }
        $param=explode("/", $params[0])[1];
        // echo $param;exit;
        $f3->set('param',$param);
        $f3->set('SESSION.query', ["sql"=>$sql, "exclude"=>["id", "about_me", "password"]]);
        $candidates=$this->db->DBQuery($sql)->paginates($page, $limit);
        $f3->set('candidates',$candidates);
        $f3->set('page',['title'=>'Candidates', 'desc'=>'']);
        $f3->set('template','pages/candidates/manage.htm');
    }
    public function getExecutives(\Base $f3, $params){

        $params=explode("/", $params[0])[1];
        $type='';
        if($params==="executives"){
            $type='executive';
        }elseif($params==="candidates"){
            $type='candidacy';
        }else{
            $type='legislative';
        }
        $type=strtoupper($type);
        parse_str($f3->get("QUERY"), $param); 
        $page=array_key_exists('page', $param)?$param["page"] : 1;
        $limit=array_key_exists('limit', $param)?$param["limit"] : 20;
        $status=array_key_exists('status', $param)?$param["status"] : "";
        $duration=array_key_exists('duration', $param)?$param["duration"] : "";
        $sql="select candidates.*, political_parties.name as party, political_positions.name as position  from candidates, political_positions, political_parties where candidates.position=political_positions.id and candidates.political_party=political_parties.id and type='$type'";
        if(!empty($status)){
            $sql.=" and status='$status'";
        }
        
        if(!empty($duration)){
            if($duration==1){
                $sql.=" and MONTH(created_at)=MONTH(CURRENT_DATE())";
            }else if(2){
                $sql.=" and MOTH(created_at)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
            }else{
                $sql.=" and MONTH(created_at) < MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
            }
        }
        
        $f3->set('SESSION.query', ["sql"=>$sql, "exclude"=>["id", "about_me", "password"]]);
        // echo $sql;exit;
        $candidates=$this->db->DBQuery($sql)->paginates($page, $limit);
        $f3->set('candidates',$candidates);
        
        // echo $param;exit;
        $f3->set('param',$params);
        $f3->set('SESSION.locations',$this->db->DBSelect("job_locations", array())->all());
        $f3->set('SESSION.roles',$this->db->DBSelect("job_fields", array())->all());
        $f3->set('maskString',function($str){
            return $this->stringToSecret($str);
        });
        $f3->set('page',['title'=>ucfirst($params), 'desc'=>'']);
        $f3->set('template','pages/candidates/manage.htm');
    }

    public function details(\Base $f3, $params) {
        $type=$param=explode("/", $params[0])[1];
        $f3->set('param',$type);
        $sql="select candidates.*, political_parties.name as party, political_positions.name as position  from candidates, political_positions, political_parties where candidates.position=political_positions.id and candidates.political_party=political_parties.id and candidates.id='{$params['id']}'";
        
        $candidate=$this->db->DBQuery($sql)->first();
        $f3->set('profile',$candidate);
        // get metrics
        
        $signals=$this->db->DBQuery("select id, name from signals order by id asc")->all();
        $f3->set('signals',$signals);

        $index=$this->db->DBQuery("select id, name from performance_index order by id asc")->all();
        
        
        if($index && count($index)>0){
            for($i=0; $i<count($index); $i++){
                
                $metrics=$this->db->DBQuery("select performance_metrics_details.* from performance_metrics, performance_metrics_details where performance_metrics_details.metric_id=performance_metrics.id and performance_metrics.index_id='{$index[$i]['id']}' and performance_metrics.cand_id='{$params['id']}'")->all();
                if($metrics){
                    $index[$i]['metrics']=$metrics;
                }else{
                    $index[$i]['metrics']=[];
                }
            }
        }

        $f3->set('renderPerformanceSignal',function($str){
            if($str==1) return "High Performance";
            if($str==2) return "Medium Performance";
            if($str==3) return "Low Performance";
            return "Others";
        });
        
        // var_dump($index);exit;
        $f3->set('kpis',$index);
        $param=explode("/", $params[0])[1];
        
        $f3->set('page',['title'=>ucfirst($param), 'desc'=>'']);
        $f3->set('template','pages/candidates/detail.htm');
    }

    public function create(\Base $f3,$params) {
        // var_dump($f3->get('POST'));exit;
        if ($f3->exists('POST') && $f3->exists('POST.step')) {
            $step=$f3->get('POST.step');
            $type=$f3->get('POST.type');
            $action=$f3->get('POST.action');
            $id=$f3->get('POST.id');
            switch($step){
                case 'biodata':
                    $name=$f3->get('POST.name');
                    $dob=$f3->get('POST.dob');
                    $dofjp=$f3->get('POST.dofjp');
                    $gender=$f3->get('POST.gender');
                    $state=$f3->get('POST.state');
                    $lga=$f3->get('POST.lga');
                    $town=$f3->get('POST.town');
                    $citizenship=$f3->get('POST.citizenship');
                    $religion=$f3->get('POST.religion');
                    $party=$f3->get('POST.party');
                    $position=$f3->get('POST.position');
                    $occupation=$f3->get('POST.occupation');
                    $previous_offices=$f3->get('POST.previous_offices');
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
                    $names=implode(", ", $files);
                    $record=[
                        'type'=>$type,
                        'name'=>$name,
                        'gender'=>$gender,
                        'dob'=>$dob,
                        'state'=>$state,
                        'lga'=>$lga,
                        'town'=>$town,
                        'citizenship'=>$citizenship,
                        'occupation'=>$occupation,
                        'religion'=>$religion,
                        'position'=>$position,
                        'political_party'=>$party,
                        'previous_offices'=>$previous_offices,
                        'date_join_politics'=>$dofjp
                    ];
                    
                    if($action=='insert'){
                        $rec=$this->db->DBInsert('candidates', $record, array());
                    }else{
                        $rec=$this->db->DBUpdate('candidates', $record, array('id'=>$id), array());
                    }
                    $id=$id?$id:$rec->code;
                    $dir=$f3->get('CAND_UPLOADS');
                    $dir=mb_substr($dir,0,-mb_strlen(strrchr($dir,"/")));
                    $uri=$dir.'/'.md5($id).'.png';
                    if(!file_exists($dir)) {
                        mkdir($dir,0777);
                    }
                    // echo $uri;exit;
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
                    
                    rename($files[0], $uri);
                    $this->db->DBUpdate("candidates", array("picture_path"=>$uri), array("id"=>$id), array());
                    if($rec->resp){
                        $f3->set('SESSION.cabdid', $rec->code);
                        $payload=[
                            "status"=>true,
                            "message"=>"Biodata saved successfully",
                            "payload"=>[
                                "id"=>$rec->code
                            ]
                        ];
                        $this->Response(200, $payload);exit;
                    }else{
                        $payload=[
                            "status"=>false,
                            "message"=>$rec->message,
                        ];
                        $this->Response(200, $payload);exit;
                    }
                break;

                case 'manifesto':
                    
                    $manifesto=$f3->get('POST.manifesto');
                    $ideology=$f3->get('POST.ideology');
                    $verdict=$f3->get('POST.verdict');
                    $record=[
                        'manifesto'=>$manifesto,
                        'ideology'=>$ideology,
                        'verdict'=>$verdict
                    ];
                    $rec=$this->db->DBUpdate('candidates', $record, array('id'=>$f3->get('SESSION.cabdid')), array());
                    if($rec->resp){
                        $payload=[
                            "status"=>true,
                            "message"=>"Record updated with the Manifesto successfully",
                            "payload"=>[
                                "id"=>$rec->code
                            ]
                        ];
                        $this->Response(200, $payload);exit;
                    }else{
                        $payload=[
                            "status"=>false,
                            "message"=>$rec->message,
                        ];
                        $this->Response(200, $payload);exit;
                    }
                break;

                case 'kpi':
                    // var_dump($f3->get('POST'));exit;
                    $kpi=$f3->get('POST.kpi');
                    $promise=$f3->get('POST.promise');
                    $doings=$f3->get('POST.doings');
                    $verdict=$f3->get('POST.verdict');

                    $isFound=$this->db->DBSelect('performance_metrics', array('cand_id'=>$f3->get('SESSION.cabdid'), 'index_id'=>$kpi))->first();
                    
                    $metric=false;
                    if($isFound){
                        $this->db->DBDelete("performance_metrics_details", array('metric_id'=>$isFound->id));
                        $metric=(Object)["code"=>$isFound->id, "resp"=>true, "status"=> "success", "message"=> "No row deleted"]; 
                    }else{
                        $metric=$this->db->DBInsert("performance_metrics", array('cand_id'=>$f3->get('SESSION.cabdid'), 'index_id'=>$kpi), array('cand_id','index_id'));
                    }
                    // var_dump($metric);exit;
                    $error=false;
                    if($metric->resp){
                        $promise=!empty($promise)?explode(",", $promise):[];
                        $doings=!empty($doings)?explode(",", $doings):[];
                        $counter=count($promise)>count($doings)?count($promise):count($doings);
                        for($i=0; $i<$counter; $i++){
                            $record=[
                                'metric_id'=>$metric->code,
                                'promise'=>array_key_exists($i, $promise)?$promise[$i]:'',
                                'actual_doings'=>array_key_exists($i, $doings)?$doings[$i]:'',
                                'p_signal'=>array_key_exists($i, $verdict)?$verdict[$i]:0
                            ];
                            $rec=$this->db->DBInsert('performance_metrics_details', $record, array());
                        }
                    }else{
                        $payload=[
                            "status"=>false,
                            "message"=>$metric->message,
                        ];
                        $this->Response(200, $payload);exit;
                    }
                    
                    $payload=[
                        "status"=>true,
                        "message"=>"Metrics updated successfully",
                    ];
                    $this->Response(200, $payload);exit;
                break;

                case'summary':
                    // var_dump($f3->get('POST'));exit;
                    $use_on_front_page=$f3->get('POST.use_on_front_page');
                    $publish=$f3->get('POST.publish');

                    $record=[
                        "use_on_homepage"=>$use_on_front_page?true:false,
                        "publish"=>$publish?true:false
                    ];
                    if($publish){
                        $record["publish_at"]=date("Y-m-d H:i:s");
                    }
                    // var_dump($record);exit;
                    // $this->Response(200, $record);exit;
                    $rec=$this->db->DBUpdate('candidates', $record, array('id'=>$f3->get('SESSION.cabdid')), array());
                    if($rec->resp){
                        $message= $publish?' and published':'';
                        $payload=[
                            "status"=>true,
                            "message"=>"Profile updated $message"
                        ];
                        $this->Response(200, $payload);exit;
                    }else{
                        $payload=[
                            "status"=>false,
                            "message"=>$rec->message,
                        ];
                        $this->Response(200, $payload);exit;
                    }
                break;
            }
        }
        $signals=$this->db->DBQuery("select id, name from signals order by id asc")->all();
        $f3->set('signals',$signals);
        $f3->set('form.action', '');
        $f3->set('page',['title'=>'Candidates', 'desc'=>'']);
        $f3->set('template','forms/client.html');
    }

    public function update(\Base $f3, $params) {
        $type=$param=explode("/", $params[0])[1];
        var_dump($params);exit;
    }
    public function add(\Base $f3, $params) {
        
        $states=array_keys((Array)$f3->get('STATES'));
        $f3->set('data',str_replace('\\u0022','\\\\u0022', json_encode($f3->get('STATES'),JSON_HEX_APOS|JSON_HEX_QUOT)));
        $f3->set('states', $states);
        $param=explode("/", $params[0])[1];
        $type='';
        if($param==="executives"){
            $type='executive';
        }elseif($param==="candidates"){
            $type='candidacy';
        }else{
            $type='legislative';
        }
        
        $f3->set('type', strtoupper($type));

        if(array_key_exists('id', $params)){
            $sql="select candidates.*, political_parties.name as party, political_positions.name as position_n  from candidates, political_positions, political_parties where candidates.position=political_positions.id and candidates.political_party=political_parties.id and candidates.id='{$params['id']}'";

            $f3->set('SESSION.cabdid', $params['id']);
        
            $candidate=$this->db->DBQuery($sql)->first();

            $f3->set('profile',$candidate);
            
            $states=(Array)$f3->get('STATES');
            // var_dump($states);exit;
            $lgas=$states[$candidate->state];
            $f3->set('lgas', $lgas);

            $f3->set('id', $params['id']);
        }

        // $f3->set('kpis',$this->db->DBSelect("performance_index", array())->all());
        $index=$this->db->DBQuery("select id, name from performance_index order by id asc")->all();
        
        if($index && count($index)>0 && array_key_exists('id', $params)){
            for($i=0; $i<count($index); $i++){
                
                $metrics=$this->db->DBQuery("select performance_metrics_details.* from performance_metrics, performance_metrics_details where performance_metrics_details.metric_id=performance_metrics.id and performance_metrics.index_id='{$index[$i]['id']}' and performance_metrics.cand_id='{$params['id']}'")->all();
                if($metrics){
                    $index[$i]['metrics']=$metrics;
                }else{
                    $index[$i]['metrics']=[];
                }
            }
        }
    
        // var_dump($index);exit;
        $f3->set('kpis',$index);

        $f3->set('parties',$this->db->DBSelect("political_parties", array())->all());
        
        if(array_key_exists('path', $params)){
            $f3->set('positions',$this->db->DBSelect("political_positions", array('path'=>$params['path']))->all());
        }else{
            $f3->set('positions',$this->db->DBSelect("political_positions", array())->all());
        }
        

        $signals=$this->db->DBQuery("select id, name from signals order by id asc")->all();
        $f3->set('signals',$signals);
        
        $f3->set('page',['title'=>ucfirst(explode("/", $params[0])[1]), 'desc'=>'']);
        $f3->set('step', 'biodata');
        $f3->set('template','forms/candidate.html');
    }
}