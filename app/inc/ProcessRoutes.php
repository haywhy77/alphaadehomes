<?php
class ProcessRoutes extends \Prefab{
    protected $f3;
	protected $menus;
    public function __construct() {
        $this->f3=\Base::instance();
    }

    public function preporcess($trimmed){
        $chars=array(' ','=','->');
		$after_split=array();
		
		if(!empty($trimmed) && !is_null($trimmed) && is_array($trimmed)){
			$counter=0;
			foreach($trimmed as $key=>$value){
				// echo substr($value,-1,1);exit;
				if($value=='[routes]'){
					continue;
				}
				if(substr($value,0,2)==';;'){
					++$counter;
					$after_split[$counter]=array('title'=>str_replace(';;','',$value),'content'=>array());
					continue;
				}
				
                if(substr($value,0,1)==';'){
					continue;
				}
				$entries=explode(", ", str_replace("{", "", str_replace("}", "", $value)));
				$value=array_map(function($k){
					$v=explode(":", $k);
					return [$v[0]=>$v[1]];
				}, $entries);
				// var_dump($value);exit;
				$new_value=[];
				foreach($value as $k=>$v){
					$keys=array_keys($v);
					$new_value[$keys[0]]=$v[$keys[0]];
				}
				$value=$new_value;
				// var_dump($value);exit;
                
                
				$after_split[$counter]['content'][]=$value;
			}

		}
		// var_dump($after_split);exit;
		$this->menus=$after_split;
        return $after_split;
    }
	public function virtual($menus){
		if($menus && is_array($menus) && count($menus)>0){
			// var_dump($menus);exit;
			$trimmed=[];
			$counter=0;
			foreach($this->menus as $item){
				// var_dump($item);echo "<br><br>";continue;
				$trimmed[$counter]=["title"=>$item['title'], 'content'=>[]];
				
				foreach($menus as $menu){
					$menu_split=explode(" ", $menu);
					$isfound=(array_filter($item['content'], function($m) use ($menu_split){
						return $menu_split[0]==$m['verbs'] && $menu_split[1] == $m['url'];
					}));

					if($isfound){
						// echo "{$item['title']}: ";var_dump(array_values($isfound)[0]); echo "<br><br>";
						$trimmed[$counter]['content'][]=array_values($isfound)[0];
					}
				}
				if(empty($trimmed[$counter]['content'])){
					unset($trimmed[$counter]);
				}
				++$counter;
			}
			// exit;
			// var_dump($trimmed);exit;
			$this->menus=$trimmed;
        	return $trimmed;
			
		}
		return false;
	}
    public function config(){

		$menus=implode("\n", array_map(function($menu){
			$content=$menu["content"];
			$urls="";
			foreach($content as $k=>$v){
				// var_dump($v);
				$urls .=trim(ltrim($v['verbs'])." {$v['url']}")."\n\n";
			}
			return trim($urls);
		}, $this->menus));
		
		// var_dump($menus);exit;
		$menus="<?php die();\n[routes]\n$menus";
		$menus.="\n\nGET /console/logout=Home->logout";
		$menus.="$menus";
		$uri=$this->f3->get('MENU')."user_".$this->f3->get('SESSION.user_id').".ini.php";
		$this->f3->write($uri, $menus);
		// echo $uri;exit;
        $this->f3->config($uri);
		// var_dump($this->f3->get('ROUTES'));exit;
    }
}

?>