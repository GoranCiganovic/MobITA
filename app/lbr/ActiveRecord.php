<?php

 abstract class ActiveRecord {

    public static function GetAll($columns = "*", $condition = "") {
        $db = Database::GetInstance();
        $q = mysqli_query($db, "SELECT {$columns} FROM ".static::$table." " . $condition) or die(mysqli_error($db));
        $result = array();
        while ($rows = mysqli_fetch_object($q, get_called_class())) {
            $result[] = $rows;
        }
        return $result;
    }
	
    public static function GetOne($id) {
        $db = Database::GetInstance();
        if($id == "first"){
            $q = mysqli_query($db, "SELECT * FROM " . static::$table . " ORDER BY " . static::$key . " ASC LIMIT 1") or die(mysqli_error($db));
        }else if($id == "last"){
            $q = mysqli_query($db, "SELECT * FROM " . static::$table . " ORDER BY " . static::$key . " DESC LIMIT 1") or die(mysqli_error($db));
        }else{
            $q = mysqli_query($db, "SELECT * FROM " . static::$table . " WHERE " . static::$key . "=" . $id) or die(mysqli_error($db));
			}
        if(mysqli_num_rows($q) > 0){
            return mysqli_fetch_object($q, get_called_class());
        }else{
			die;
			}
    }
	
    public function Insert() {
        $db = Database::GetInstance();
        $recordFields = get_object_vars($this);
        $keys = array_keys($recordFields);
        $values = array_values($recordFields);
        $i = 0;
        foreach ($values as $value) {
            $values[$i] = mysqli_real_escape_string($db, $value);
            $values[$i] = strip_tags($values[$i]);
            $values[$i] = trim($values[$i]);
            ++$i;
        }
        $q = "INSERT INTO " . static::$table . " (";
        $q.=implode(",", $keys);
        $q.=") VALUES ('";
        $q.=implode("','", $values);
        $q.="')";
        mysqli_query($db, $q) or die(mysqli_error($db));
        $keyField = static::$key;
        $this->{$keyField} = mysqli_insert_id($db);
    }
	
    public function Update() {
        $db = Database::GetInstance();
        $q = "UPDATE " . static::$table . " SET ";
        foreach ($this as $k => $v) {
            if ($k == static::$key)
                continue;
            $v = mysqli_real_escape_string($db, $v);
            $v = strip_tags($v);
            $v = trim($v);
            $q.= $k . "='" . $v . "',";
        }
        $q = rtrim($q, ",");
        $keyField = static::$key;
        $q.=" WHERE " . static::$key . "=" . $this->$keyField;
        mysqli_query($db, $q) or die(mysqli_error($db));
    }
	
    public static function Delete($id) {
        $db = Database::GetInstance();
        $q = "DELETE FROM " . static::$table . " WHERE " . static::$key . "=" . $id;
        mysqli_query($db, $q) or die(mysqli_error($db));
    }
}
?>
