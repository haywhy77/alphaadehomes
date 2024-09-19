<?php
class Staff extends Controller{
    public function index(\Base $f3){
        parse_str($f3->get("QUERY"), $params); 
        // var_dump($params);exit;
        $page=array_key_exists('page', $params)?$params["page"] : 1;
        $limit=array_key_exists('limit', $params)?$params["limit"] : 20;
        $clients=$this->db->DBQuery("select staff.*, (select clients.names from clients where clients.id=staff.current_client) as client from staff;")->paginates($page, $limit);
        $f3->set('staff',$clients);
        $f3->set('page',['title'=>'Staff', 'desc'=>'']);
        $f3->set('template','pages/staff/manage.htm');
    }

    public function detail(\Base $f3, $params){
        $id=$params['id'];
        $clients=$this->db->DBQuery("select clients.* from clients;")->all();
        // var_dump($clients);exit;
        $f3->set('clients',$clients);
        $staff=$this->db->DBQuery("select staff.*, (select clients.names from clients where clients.id=staff.current_client) as client from staff where id='$id';")->first();
        $f3->set('staff',$staff);
        
        $companies=$this->db->DBQuery("select clients.*, clients_user.status as c_status from clients, clients_user where clients.id=clients_user.client_id and clients_user.user_id='$id' order by clients_user.id desc")->all();
        // var_dump($companies);exit;
        $f3->set("companies", $companies);
        $f3->set("roles", $this->db->DBQuery("select * from job_fields;")->all());

        $f3->set('page',['title'=>'Staff', 'desc'=>'']);
        $f3->set('template','pages/staff/detail.htm');
    }

    public function performActions(\Base $f3){
        // var_dump($f3->get('POST'));exit;

        $client_user_id=stripslashes(strip_tags($this->f3->get('POST.client_user_id')));
        $todo=stripslashes(strip_tags($this->f3->get('POST.client_action')));
        $row=$this->db->DBUpdate("staff", array("status"=>$todo), array("id"=>$client_user_id), array());
        // var_dump($row);exit;
        $f3->reroute("/staff/{$client_user_id}");
    }

}