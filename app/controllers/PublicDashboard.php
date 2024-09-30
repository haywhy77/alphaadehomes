<?php
class PublicDashboard extends Controller{
    public function index(\Base $f3){
        // $sql="select candidates.*, political_parties.name as party, political_positions.name as position  from candidates, political_positions, political_parties where candidates.position=political_positions.id and candidates.political_party=political_parties.id and candidates.use_on_homepage='1'";
        
        // $candidate=$this->db->DBQuery($sql)->all();
        // $f3->set('profiles',$candidate);
        echo Template::instance()->render('public/index.htm');die();
    }
    public function about(\Base $f3){
        echo Template::instance()->render('public/about.htm');die();
    }

    public function services(\Base $f3){
        echo Template::instance()->render('public/services.htm');die();
    }

    public function contact(\Base $f3){
        echo Template::instance()->render('public/contact.htm');die();
    }

    public function getPersons(\Base $f3, $params){
        // var_dump($_SERVER['QUERY_STRING']);exit;
        // $params=explode("&", $_SERVER['QUERY_STRING']);
        parse_str($_SERVER['QUERY_STRING'], $params);
        // var_dump($params);exit;
        $sql="select candidates.*, positions.name as position, political_parties.name as party from candidates, political_positions as positions, political_parties where candidates.political_party=political_parties.id and candidates.position=positions.id and candidates.type='{$params['type']}' and positions.abbr REGEXP '{$params['category']}'";
        // echo $sql;exit;
        $result=$this->db->DBQuery($sql)->all();
        // var_dump($result);exit;
        $f3->set("candidates", $result);
        echo Template::instance()->render('public/candidates.htm');die();
    }

    public function getDetail(\Base $f3, $params){
        $id=$params['id'];
        $profile=$this->db->DBQuery("select * from candidates where MD5(id)='$id'")->first();
        $f3->set('profile', $profile);

        //get mettrics:
        $index=$this->db->DBQuery("select id, name from performance_index order by id asc")->all();
        
        if($index && count($index)>0){
            for($i=0; $i<count($index); $i++){
                $metrics=$this->db->DBQuery("select performance_metrics_details.*, signals.name, signals.value from performance_metrics, performance_metrics_details, signals where signals.id=performance_metrics_details.p_signal and performance_metrics_details.metric_id=performance_metrics.id and performance_metrics.index_id='{$index[$i]['id']}' and MD5(performance_metrics.cand_id)='{$params['id']}'")->all();
                
                if($metrics){
                    $value=0;

                    foreach($metrics as $k=>$v){
                        $value +=$v['value'];
                    }
                    if($value>0) $index[$i]['kp']=$value /count($metrics);
                    $index[$i]['class']='low';
                    
                    if($index[$i]['kp']>39 && $index[$i]['kp']<70){
                        $index[$i]['class']='medium';
                    }

                    if($index[$i]['kp']>69 && $index[$i]['kp']<90){
                        $index[$i]['class']='high';
                    }

                    if($index[$i]['kp']>89){
                        $index[$i]['class']='perfect';
                    }
                    
                    $index[$i]['metrics']=$metrics;
                }else{
                    $index[$i]['class']='low';
                    $index[$i]['kp']=0;
                    $index[$i]['metrics']=[];
                }
            }
        }
        // var_dump($index);exit;
        $f3->set('kpis',$index);
        // var_dump($profile);exit;
        echo Template::instance()->render('public/detail.htm');die();
    }
}