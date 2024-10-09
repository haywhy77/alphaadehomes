<?php
class Booking extends Controller{
    public function index(\Base $f3){
        parse_str($f3->get("QUERY"), $params); 
        // var_dump($params);exit;
        $page=array_key_exists('page', $params)?$params["page"] : 1;
        $limit=array_key_exists('limit', $params)?$params["limit"] : 20;
        $clients=$this->db->DBQuery("select bookings.*, properties.title from bookings, properties where properties.id=bookings.property_id order by id desc")->paginates($page, $limit);
        $f3->set('bookings',$clients);
        
        $f3->set('page',["title"=>"Bookings", "pagetitle"=>"", "subtitle"=>"List"]); 
        $f3->set('template','pages/booking/manage.htm');
    }

    public function getBooking(\Base $f3, $params){
        $id=$params["id"];
        //get applicant details from db
        $clients=$this->db->DBQuery("select bookings.* from bookings where id='{$id}'")->first();
        $f3->set('booking',$clients);

        $property=$this->db->DBQuery("select properties.* from bookings, properties where properties.id=bookings.property_id and bookings.id='{$id}'")->first();
        if($property){
            $dir=$f3->get('PROPERTY').$property->id;
            if(is_dir($dir) && file_exists($dir)){
                $files=$this->readFilesFromDirectory($dir);
                $property->pictures=$files;
            }
        }else{
            $property=(object)[];
        }
        $f3->set('property',$property);
        $f3->set('page',["title"=>"Bookings", "pagetitle"=>"", "subtitle"=>"List", "actionButton"=>["title"=>"View booking", "url"=>"console/bookings"]]); 
        $f3->set('template','pages/booking/detail.htm');
    }

    public function update(\Base $f3, $params){
        $id=$params["id"];
        $action=$params["action"];
       
        switch($action){
            case'suspend':
                $this->db->DBUpdate("bookings", array('status'=>'pending'), array('id'=>$id), array());
                \Flash::instance()->addMessage("Booking suspended successfully", 'success');
            break;
            case'delete':
                $this->db->DBDelete("bookings", array('id'=>$id));
                \Flash::instance()->addMessage("Booking deleted successfully", 'success');
                $f3->reroute('console/bookings');exit;
            break;
            case'close':
                $this->db->DBUpdate("bookings", array('status'=>'cancelled'), array('id'=>$id), array());
                \Flash::instance()->addMessage("Booking closed successfully", 'success');
            break;
            case'approve':
                $this->db->DBUpdate("bookings", array('status'=>'confirmed'), array('id'=>$id), array());
                \Flash::instance()->addMessage("Booking confirmed successfully", 'success');
            break;
        }
        // var_dump($params);exit;
        //get applicant details from db
        $f3->reroute("/console/bookings/{$id}");
    }
    
}