<?php 
    class Post{
        private $_db,$_data;
        public function __construct(){
            $this->_db = DB::getInstance();
        }
        public function create($table,$fields){
            return $this->_db->insert($table,$fields);
        }
        public function update($table,$id, $fields = array()){
            if(!$this->_db->update($table,$id,$fields)){
                throw new Exception ('Vyskytol sa problém pri úprave');
            }
        }
        public function get($table,$where = null){
           return $this->_db->get($table,$where);

        }
        public function query($sql){
            return $this->_db->query($sql);
        }  
        public function addImage($image){
            if(($image['name'] == "")){
                    return $dest = NULL;
                }
            else{
                $tmp_name = $image["tmp_name"];
                $filepath = "img/upload/";
                $name = basename($image["name"]); 
                $name = removechar($name); 
                $dest = $filepath.$name;
                if(move_uploaded_file($tmp_name, $dest)){
                   return $dest = "admin/".$dest;
                }
              }

        }
        public function updateImage($image, $actual_path){
          if(($image['name'] == "")){
              return $actual_path;
          }
          else{
              $tmp_name = $image["tmp_name"];
              $filepath = "img/upload/";
              $name = basename($image["name"]); 
              $name = removechar($name); 
              $dest = $filepath.$name;
              if(move_uploaded_file($tmp_name, $dest)){
                return $dest = "admin/".$dest;
              }
          }
        }
        public function delete($table,$where){
            if($this->_db->delete($table,$where))
                return true;
            else
                return false;
        }
    }

?>
