<?php
class Settings extends Controller{
    public function index(\Base $f3){
        $f3->set('template','pages/home.htm');
    }

    public function positions(\Base $f3, $params){
        if($f3->exists('POST.name')){
            
            $name = $f3->get('POST.name');
            $abbr = $f3->get('POST.abbr');
            $path = $f3->get('POST.path');
            // var_dump($name);exit;
            $row=$this->db->DBInsert("political_positions", array('name'=>$name, 'abbr'=>$abbr, 'path'=>$path), array('name', 'abbr'));
            if($row->resp){
                $payload=[
                    "status"=>true,
                    "message"=>"Skills added successfully."
                ];
                $this->Response(200, $payload);exit;
            }
            
            $payload=[
                "status"=>false,
                "message"=>$row->message
            ];
            $this->Response(200, $payload);exit;
            
        }
        
        parse_str($f3->get("QUERY"), $params); 
        $page=array_key_exists('page', $params)?$params["page"] : 1;
        $limit=array_key_exists('limit', $params)?$params["limit"] : 20;
        $locations=$this->db->DBSelect("political_positions", array())->paginates($page, $limit);
        // var_dump($locations);exit;
        $f3->set("settings.positions", $locations);
        // $f3->set("extra", [
        //     "js"=>[
        //         "js/vendors/select2/select2.min.js"
        //     ]
        // ]);
        $f3->set('page',['title'=>'Political positions', 'desc'=>'']);
        $f3->set('template','pages/position.htm');
    }

    public function parties(\Base $f3, $params){
        if($f3->exists('POST.name')){
            
            $name = $f3->get('POST.name');
            $color = $f3->get('POST.color');
            // var_dump($name);exit;
            $row=$this->db->DBInsert("political_parties", array('name'=>$name, 'party_color'=>$color), array('name'));
            
            if($row->resp){
                $payload=[
                    "status"=>true,
                    "message"=>"Political party added successfully."
                ];
                $this->Response(200, $payload);exit;
            }
            
            $payload=[
                "status"=>false,
                "message"=>$row->message
            ];
            $this->Response(200, $payload);exit;
        }
        
        parse_str($f3->get("QUERY"), $params); 
        $page=array_key_exists('page', $params)?$params["page"] : 1;
        $limit=array_key_exists('limit', $params)?$params["limit"] : 20;
        $locations=$this->db->DBSelect("political_parties", array())->paginates($page, $limit);
        // var_dump($locations);exit;
        $f3->set("settings.parties", $locations);
        // $f3->set("extra", [
        //     "js"=>[
        //         "js/vendors/select2/select2.min.js"
        //     ]
        // ]);
        $f3->set('page',['title'=>'Politcal parties', 'desc'=>'']);
        $f3->set('template','pages/parties.htm');
    }

    public function performance(\Base $f3, $params){
        if($f3->exists('POST.name')){
            
            $name = $f3->get('POST.name');
            // var_dump($name);exit;
            $row=$this->db->DBInsert("performance_index", array('name'=>$name), array('name'));
            if($row->resp){
                $payload=[
                    "status"=>true,
                    "message"=>"Performance index added successfully."
                ];
                $this->Response(200, $payload);exit;
            }
            
            $payload=[
                "status"=>false,
                "message"=>$row->message
            ];
            $this->Response(200, $payload);exit;
        }
        
        parse_str($f3->get("QUERY"), $params); 
        $page=array_key_exists('page', $params)?$params["page"] : 1;
        $limit=array_key_exists('limit', $params)?$params["limit"] : 20;
        $locations=$this->db->DBSelect("performance_index", array())->paginates($page, $limit);
        // var_dump($locations);exit;
        $f3->set("settings.performance", $locations);
        $f3->set('page',['title'=>'Performance index', 'desc'=>'']);
        $f3->set('template','pages/performance.htm');
    }
}