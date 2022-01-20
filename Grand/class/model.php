<?php


class Model
{
    protected static $table_name = "";
    protected static $columns= [];
    public $errors = [];
    protected static $database;

    public static function set_database($database){
        self::$database = $database;
    }

    public static function find_by_sql($sql){
        $result = self::$database->query($sql);
        if (!$result){
            exit("Database query failed." . "[". $sql ."]");
        }

        $object_array = [];
        while ($record = $result->fetch_assoc()){
            $object_array[] = static::instantiate($record);
        }

        $result->free();

        return $object_array;
    }

    public static function search($queries){

        $search = [];
        foreach ($queries as $key => $value){
            $search[] = " $key LIKE '%$value%' ";
        }
        $sql = "select * from ". static::$table_name. " where " . implode(" OR ", $search) .";";

        echo "<br><br><br><br><br><br><br><br><br><br>".$sql."<br><br><br><br><br><br><br><br>";
        $result = static::find_by_sql($sql);

        if (!empty($result)){
            return $result;
        }else{
            return false;
        }

    }

    public static function find_all(){
        return static::find_by_sql("select * from ". static::$table_name);
    }
    public static function find_by_id($id){
        $clean_id = self::$database->escape_string($id);
        $array =  static::find_by_sql("select * from ".static::$table_name." where id = '${clean_id}'");

        if (!empty($array)){
            return array_shift($array);
        }else{
            return false;
        }

    }

    protected static function instantiate($record){
        $object = new static();
        foreach ($record as $key => $value) {
            if (property_exists($object, $key )){
                $object->$key = $value;
            }
        }
        return $object;
    }

    protected function validate() {
        $this->errors = [];

        return $this->errors;
    }


    protected function create(){
        $this->validate();
        if (!empty($this->errors)) return false;
        $attributes = $this->sanitized_attributes();
        $sql = "insert into ".static::$table_name." (". join(', ',array_keys($attributes)).") values ('".join("', '", array_values($attributes)). "')";
        $result = self::$database->query($sql);

        echo "<br><br><br><br><br><br>" . $sql . "<br><br><br><br><br><br>";
        if ($result){
            $this->id = self::$database->insert_id;
        }
        return $result;
    }

    public function merge_attributes($args =[]){
        foreach ($args as $key => $value){
            if (property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }

    protected function update(){
        $this->validate();
        if (!empty($this->errors)) return false;

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach ($attributes as $key => $value){
            $attribute_pairs[] = "${key}='${value}'";
        }
        $sql = "update ".static::$table_name." set ". join(',' , $attribute_pairs). "where id = '". self::$database->escape_string($this->id).  "' limit 1";
        $result = self::$database->query($sql);
        return $result;
    }

    public function patch_update($args){
        $columns = [];
        foreach ($args as $key => $value){
            $columns[] = " ${key} = '${value}'";
        }
        $sql = "update " . static::$table_name . " set " . join(',', $columns) . " where id = '". self::$database->escape_string($this->id) . "' limit 1";
        return self::$database->query($sql);
    }

    public function save(){
        if (!isset($this->id)){
            return $this->create();
        }else{
            return $this->update();
        }
    }

    public function delete(){
        $sql = "delete from ". static::$table_name . " where id = '" . self::$database->escape_string($this->id). "' limit 1";
        return self::$database->query($sql);
    }

    protected function attributes(){
        $attributes= [];
        foreach (static::$columns as $columns){
            if ($columns == 'id') continue;
            $attributes[$columns] = $this->$columns;
        }
        return $attributes;
    }

    protected function sanitized_attributes(){
        $sanitized = [];
        foreach ($this->attributes() as $key => $value){
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }




    /*performs inner join select queries
     * @Params $left = left table
     *          $right = right table
     *          $leftMatch= column of left table to be used after the on keyword
     *          $rightMatch= column of right table to be used after the on keyword
     *          $returnedOb = classname of the object to be returned , will be called statically
     */
    public function r_inner_join($left,$left_match,  $right, $right_match, $returnedOb){
        $sql = "select * from ${left} inner join ${right} on ${left}.${left_match} = ${right}.${right_match} where ${right}.${right_match} = ". $this->id;
        $result = self::$database->query($sql);
        $services = [];
        while ($rr = $result->fetch_assoc()){
            $services[] = $returnedOb::instantiate($rr);
        }

        return $services ?? false;
    }

    public function r_inner_join_s( $sql , $returnedOb){
        $result = self::$database->query($sql);
        $services = [];
        while ($rr = $result->fetch_assoc()){
            $services[] = $returnedOb::instantiate($rr);
        }

        return $services ?? false;
    }


}