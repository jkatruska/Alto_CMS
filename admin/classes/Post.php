<?php 
    class Post{
        private $_db,$_data;
        public function __construct(){
            $this->_db = DB::getInstance();
        }
        public function create($table,$fields){
            foreach($fields as $key =>$value){
                if($value!=NULL){
                $new_value = strip_tags($value,"<strong><em><s><p><ul><li><br>");
                $fields[$key] = $new_value;
                }
            }
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
                $ext = pathinfo($image["name"])['extension'];
                $name = self::randomString(5);
                $name .= '.'.$ext;
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
              return self::addImage($image);
          }
        }
        public function delete($table,$where){
            if($this->_db->delete($table,$where))
                return true;
            else
                return false;
        }
        public function deleteImage($path){
            unlink($path);
        }

        private function randomString($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    }

?>
