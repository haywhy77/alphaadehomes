<?php
class Roles extends Controller{
    public function index(\Base $f3){
        parse_str($f3->get("QUERY"), $params); 
        // var_dump($params);exit;
        $page=array_key_exists('page', $params)?$params["page"] : 1;
        $limit=array_key_exists('limit', $params)?$params["limit"] : 20;
        $clients=$this->db->DBQuery("select * from roles")->paginates($page, $limit);
        // var_dump($clients);exit;
        $f3->set('roles',$clients);
        
        $f3->set('page',["title"=>"Access roles", "pagetitle"=>"", "subtitle"=>"List", "actionButton"=>["title"=>"Add new role", "url"=>"console/acess/roles/new"]]); 
        $f3->set('template','pages/staff/roles.htm');
    }

    public function getUsers(\Base $f3, $params){
        $id=$params["id"];
        //get applicant details from db
        $f3->set('template','pages/applicant.htm');
    }

    public function create(\Base $f3){
        // var_dump($f3->get('POST'));exit;
        if ($f3->exists('POST.name')) {
            // var_dump($this->f3->get('POST'));exit;
            sleep(3); // login should take a while to kick-ass brute force attacks
            $menus=$this->f3->get('POST.menus');
            $name=stripslashes(strip_tags($this->f3->get('POST.name')));
            $privileges=$this->f3->get('POST.privilege');
            $action=$this->f3->get('POST.action');
            $id=$this->f3->get('POST.id');
            // echo $action;exit;
            $record=[
                "name"=>$name,
                "privileges"=>json_encode($privileges)
            ];
            $row=[];
            if($action=='edit'){
                $row=$this->db->DBUpdate("roles", $record, array("id"=>$id), array("name"));
                $row->code=$id;
            }else{
                $row=$this->db->DBInsert("roles", $record, array("name"));
            }
            // var_dump($row);exit;
            
            if(!$row->resp) {
                \Flash::instance()->addMessage($row->message, 'danger');
            }else{
                $this->db->DBDelete("menus", array("role_id"=>$row->code));
                if(is_array($menus) && count($menus)>0){
                    foreach($menus as $k=>$menu){
                        // var_dump($menu);exit;
                        $this->db->DBInsert("menus", array("role_id"=>$row->code, "url"=>$menu), array("role_id", "url"));
                    }
                }
                \Flash::instance()->addMessage("Invitation sent successfully", 'success');
            }
            if($action=='edit'){
                $f3->reroute("/console/access/roles/{$id}/edit");
            }
        }
        $trimmed = file('./app/routes/routes_admin.ini.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		// var_dump($trimmed);exit;
		$after_split=ProcessRoutes::instance()->preporcess($trimmed);
        foreach($after_split as $key=>$value){
            $new_array=array();
            foreach($value['content'] as $k=>$val){
                $new_array[]=array_merge($val, ['selected'=>'']);//array('menu'=>$val,);
            }
            // var_dump($new_array);exit;
            $rResult[$key]=array('title'=>$value['title'],'groupmenu'=>$new_array);
            //var_dump($rResult);exit;
        }
        $this->f3->set('module',$rResult);
        $f3->set("extra", [
            "css"=>[
                "ui/plugins/duallistbox/src/bootstrap-duallistbox.css"
            ],
            "js"=>[
                "ui/plugins/duallistbox/src/jquery.bootstrap-duallistbox.js"
            ]
        ]);
        $f3->set('action','create');
        $f3->set('page',["title"=>"New access role", "pagetitle"=>"", "subtitle"=>"List", "actionButton"=>["title"=>"View access roles", "url"=>"console/access/roles"]]); 
        $f3->set('template','forms/roles.html');
    }

    public function edit(\Base $f3, $params){

        
        $trimmed = file('./app/routes/routes_admin.ini.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		// var_dump($trimmed);exit;
		$after_split=ProcessRoutes::instance()->preporcess($trimmed);
        
        // // var_dump($after_split);exit;
        $roles=$this->db->DBQuery("select * from roles where id='{$params['id']}'")->first();
        $result=$this->db->DBQuery("select id,url from menus where role_id='{$params['id']}'")->all();
        // var_dump($result);exit;
		$rResult=array();
		if($result && !is_null($result) && is_array($result)){
			foreach($after_split as $key=>$value){
				// var_dump($value["content"]);exit;
				$new_array=array();
				foreach($value['content'] as $k=>$val){
					$found=false;
                    $url="{$val['verbs']} {$val['url']}";
                    
					for($i=0;$i<count($result);$i++){
						if($url==$result[$i]['url']){
							$found=true;
							break;
						}
					}
					$selected='';
					if($found){
						$selected="selected='selected'";
					}else{
						$selected="";
					}
					$new_array[]=array_merge($val,['selected'=>$selected]);
				}
				$rResult[$key]=array('title'=>$value['title'],'groupmenu'=>$new_array);
			}
			//$rResult=array_unique($rResult);
		}else{
			foreach($after_split as $key=>$value){
				$new_array=array();
				foreach($value['content'] as $k=>$val){
					$new_array[]=array_merge($val, ['selected'=>'']);//array('menu'=>$val,);
				}
				// var_dump($new_array);exit;
				$rResult[$key]=array('title'=>$value['title'],'groupmenu'=>$new_array);
				//var_dump($rResult);exit;
			}
			//$rResult=array_unique($rResult);
		}
        // var_dump($rResult);exit;
        if($roles && $roles->privileges){
            $privileges=(array)json_decode($roles->privileges);
            $privileges['select']=isset($privileges['select'])?"checked='checked'":'';
            $privileges['insert']=isset($privileges['insert'])?"checked='checked'":'';
            $privileges['update']=isset($privileges['update'])?"checked='checked'":'';
            $privileges['delete']=isset($privileges['delete'])?"checked='checked'":'';
            $privileges['download']=isset($privileges['download'])?"checked='checked'":'';
            $privileges['print']=isset($privileges['print'])?"checked='checked'":'';
            $roles->privileges=$privileges;
        } 
        // var_dump($roles->privileges);exit;
        $this->f3->set('roles',$roles);
        $this->f3->set('module',$rResult);
        $f3->set("extra", [
            "css"=>[
                "ui/plugins/duallistbox/src/bootstrap-duallistbox.css"
            ],
            "js"=>[
                "ui/plugins/duallistbox/src/jquery.bootstrap-duallistbox.js"
            ]
        ]);
        $f3->set('action','edit');
        $f3->set('page',["title"=>"New access role", "pagetitle"=>"", "subtitle"=>"List", "actionButton"=>["title"=>"View access roles", "url"=>"console/access/roles"]]); 
        $f3->set('template','forms/roles.html');
    }
}