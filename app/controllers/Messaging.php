<?php
class Messaging extends Controller{
    public function index(\Base $f3, $params){
        parse_str($f3->get("QUERY"), $param); 
        // var_dump($param);exit;
        $page=array_key_exists('page', $param)?$param["page"] : 1;
        $limit=array_key_exists('limit', $param)?$param["limit"] : 20;
        $status=array_key_exists('status', $param)?$param["status"] : "";
        $key=strtoupper($params['id']);
        $sql="select messaging.* from messaging where type='$key' order by id desc";
        
        // echo $sql;exit;
        $f3->set('SESSION.query', ["sql"=>$sql, "exclude"=>["cand_id", "client_id", "id"]]);
        $messages=$this->db->DBQuery($sql)->paginates($page, $limit);
        
        $f3->set('messages',$messages);
        $f3->set('page',['title'=>ucfirst($params['id']), 'desc'=>'']);
        $f3->set('template','pages/message/manage.htm');
    }

    public function compose(\Base $f3){
        if ($f3->exists('POST.to') && $f3->exists('POST.subject') && $f3->exists('POST.content')) {
            // var_dump($f3->get('POST'));exit;
            sleep(3); // login should take a while to kick-ass brute force attacks
            $to=$f3->get('POST.to');
            $to=explode(",", $to);
            $recipients=[];
            foreach($to as $rec){
                $recipients[]=["email"=>$rec, "name"=>""];
            }
            
            // $cc=$f3->get('POST.cc');
            // $cc=explode(",", $cc);
            // $carbonCopy=[];
            // foreach($cc as $rec){
            //     $carbonCopy[]=["email"=>$rec, "name"=>""];
            // }
            $subject=$f3->get('POST.subject');
            $body=$f3->get('POST.content');

            $f3->set("data", array(
                "content"=>$body
            ));
            $content = Template::instance()->render( "email/open-content.htm" );
            $mail=SendMail::instance()->send("No-reply", $recipients, $subject, $content);
            \Flash::instance()->addMessage("Mail sent", 'success');
        }
        $f3->set('page',['title'=>'Mails', 'desc'=>'']);
        $f3->set('template','pages/message/compose.htm');
    }

}