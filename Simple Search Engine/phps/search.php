<?php
class connect{
    private $server;
    private $root;
    private $pass;
    private $dbname;
    private $charset;
    private $dsn;
    private $runner;
    protected function conn(){
        $this->server = "localhost";
        $this->root = "root";
        $this->pass = "";
        $this->dbname = "test";
        $this->charset = "utf8mb4";
        try{
            $this->dsn = "mysql:host=".$this->server.";dbname=".$this->dbname.";=charset=".$this->charset;
            $this->runner = new PDO($this->dsn,$this->root,$this->pass);
            $this->runner->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $this->runner;
        }catch(PDOException $value){
            echo "Connection Failed: ".$value->getMessage();
        }
    }
}

class search extends connect{
    private $select;
    private $rows;
    protected function getContents(){
        $this->select = $this->conn()->query("SELECT * FROM search");
        while($this->rows = $this->select->fetch()){
            $data[] = $this->rows;
        }
        return $data;
    }
}

class results extends search{
    protected function getResults(){
        $datas = $this->getContents();
        if(isset($_POST['search'])){
            $search = $_POST['search'];
            echo '
            <style type="text/css">
            .results{
            display:block;
            }
            </style>
            ';
            if(!empty($search)){
                echo '
                <style type="text/css">
                .results{
                display:block;
                }
                </style>
                ';
                foreach($datas as $data){
                    $urls = $data['url'];
                    $contents = $data['contents'];
                    if(strpos($contents,$search) !== false){
                        echo '
                        <a href="'.$urls.'"><li>'.$contents.'</li></a>
                        ';
                    }
                }
            }else{
                echo '
                <style type="text/css">
                .results{
                display:none;
                }
                </style>
                ';
            }
        }
    }
    public function showResults(){
        return $this->getResults();
    }
}
$object = new results();
echo $object->showResults();
?>
