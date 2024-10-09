<?php
class PublicDashboard extends Controller{
    public function index(\Base $f3){
        // $sql="select candidates.*, political_parties.name as party, political_positions.name as position  from candidates, political_positions, political_parties where candidates.position=political_positions.id and candidates.political_party=political_parties.id and candidates.use_on_homepage='1'";
        
        // $candidate=$this->db->DBQuery($sql)->all();
        // $f3->set('profiles',$candidate);
        $f3->set('page',["title"=>"Welcome", "pagetitle"=>"", "subtitle"=>"Detail"]); 
        echo Template::instance()->render('public/index.htm');die();
        
        $f3->set('template','public/index.htm');
    }

    public function about(\Base $f3){
        $f3->set('page',["title"=>"Welcome", "pagetitle"=>"", "subtitle"=>"Detail"]); 
        echo Template::instance()->render('public/about.htm');die();
    }

    public function services(\Base $f3){
        $f3->set('page',["title"=>"Welcome", "pagetitle"=>"", "subtitle"=>"Detail"]); 
        echo Template::instance()->render('public/services.htm');die();
    }

    public function contact(\Base $f3){
        // var_dump($f3->get('POST'));exit;
        if($f3->exists('POST') && $f3->exists('POST.name') && $f3->exists('POST.sender') && $f3->exists('POST.subject') && $f3->exists('POST.w3lMessage')){
            sleep(3);
            $record=[
                "name"=>$f3->get('POST.name'),
                "email"=>$f3->get('POST.sender'),
                "phone"=>$f3->get('POST.phone'),
                "subject"=>$f3->get('POST.subject'),
                "content"=>strip_tags(html_entity_decode($f3->get('POST.w3lMessage'))),
                "type"=>'CONTACT'
            ];
            // var_dump($record);exit;
            $row=$this->db->DBInsert("messaging", $record, array("name", "email", "subject", "content"));
            // var_dump($row);exit;
            if(!$row->resp){
                \Flash::instance()->addMessage($row->message, 'danger');
            }else{

                //send a mail to an agent.
                \Flash::instance()->addMessage("Thank you for contacting Alphaade Homes. One of our agent will reach out to you soon.", 'success');
            }
            
        }
        $f3->set('page',["title"=>"Welcome", "pagetitle"=>"", "subtitle"=>"Detail"]); 
        echo Template::instance()->render('public/contact.htm');die();
    }
}