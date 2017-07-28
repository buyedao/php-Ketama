<?php
class Ketama{
	private $nodes = [];
	private $servers = [];
	public function addNode($name,$weight){
		$this->nodes[$name] = $weight;
	}
	public function create(){
		foreach ($this->nodes as $name => $weight) {
			for($i=1;$i<=$weight;$i++){
				$tmpTitle = "{$name}:{$i}";
				$tmpLevel = $this->getLevel($tmpTitle);
				$tmpNode = ["node"=>$name,"hash"=>$tmpLevel];
				$sort[] = $tmpLevel;
				$tables[] = $tmpNode;
			}
		}
		array_multisort($sort,SORT_ASC,$tables);
		$this->servers = $tables;
	}
	public function getNode($key){
		$level = $this->getLevel($key);
		foreach ($this->servers as $value) {
			if($value['hash']>=$level){
				return $value["node"];
			}
		}
		return false;
	}
	public function getLevel($key){
		$tmp = str_split(sha1($key),2);
		foreach ($tmp as $key => $value) {
			$tmp[$key] = base_convert($value, 16, 10);
		}
		return $tmp[19] | $tmp[18]<<8 | $tmp[17]<<16 | $tmp[16]<<24;
	}
}

// $ketama = new Ketama();
// $ketama->addNode("table_name_01",666);
// $ketama->addNode("table_name_02",666);
// $ketama->create();