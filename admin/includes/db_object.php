<?php 

class Db_object {

    public static function find_by_query($sql){

        global $database;

        $result_set = $database->query($sql);

        $object_array = array();

        while($row = mysqli_fetch_array($result_set)){

            $object_array[] = static::instantiation($row);

        }

        return $object_array;

    }


    public static function find_by_id($id){

        return static::find_by_query("SELECT * FROM ".static::$db_table." WHERE id = {$id} LIMIT 1");

    }


    public static function find_all(){

        return static::find_by_query("SELECT * FROM ".static::$db_table." ");

    }


    



    public static function instantiation($the_record){

        $calling_class = get_called_class();

        $the_object = new $calling_class;

        foreach($the_record as $the_attribute => $value){

            if($the_object->has_the_attribute($the_attribute)){

                $the_object->$the_attribute = $value;

            }

        }

        return $the_object;

    }

    private function has_the_attribute($the_attribute){

        $object_propetys = get_object_vars($this);

        return array_key_exists($the_attribute,$object_propetys);

    }

    protected function properties(){
        
        $properties = array();

        
        // * array of fileds in database we are getting values such as $id and assinging it to new array as id = id  
        foreach(static::$db_table_fields as $db_field){

            if(property_exists($this,$db_field)){

                $properties[$db_field] = $this->$db_field;

            }
        }

        return $properties;

    }


    public function clean_properis(){

        global $database;

        $cleaned_properties = array();

        // * same thing but cleaning it with escape string method 
        foreach($this->properties() as $key => $value){

            $cleaned_properties[$key] = $database->espace_string($value);
            
        }

        return $cleaned_properties;
    }


    public function create(){

        global $database;

        $properties = $this->clean_properis();

        $sql = "INSERT INTO ".static::$db_table." (". implode("," ,array_keys($properties))  .") VALUES (
            '". implode("','", array_values($properties))."')" ;

        
        if($database->query($sql)){

            return true;

        }else{

            return false;

        }

    }


    public function update(){

        global $database;

        $properties = $this->clean_properis();

        $properties_pair = array();

        foreach ($properties as $key => $value) {
            
            $properties_pair[] =  "{$key}='{$value}'";

        }

        $sql = "UPDATE ".static::$db_table." SET ". implode(",", array_values($properties_pair))." WHERE id = ".$database->espace_string($this->id)." ";


        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function delete(){

        global $database;

        $sql = "DELETE FROM ".static::$db_table." WHERE id = '".$database->espace_string($this->id)."' LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }


    public function count_all_by_id($id){

        global $database;

        $sql = "SELECT COUNT(*) FROM ".static::$db_table." WHERE id_category ='{$id}'  ";

        $result_set = $database->query($sql);

        $row = mysqli_fetch_array($result_set);

        return array_shift($row);

    }



}// end of class