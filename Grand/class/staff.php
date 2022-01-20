<?php
class Staff extends Model{
    protected static $table_name = "staff";
    protected static $columns = [
        'id', 'user_id', 'company_id'
    ];

    public $id;
    public $user_id;
    public $company_id;


    public function __construct ($args = [])
    {
        foreach ($args as $key => $value){
            if (property_exists($this, $key)){
                $this->$key = $value;
            }
        }

    }


    public function company(){
        $sql = "select * from listings inner join phone_number on listings.id = phone_number.company_id where phone_number.id = ". $this->id;
        $listing = parent::r_inner_join_s($sql, 'Listing');
        return array_shift($listing) ?? false;
    }
}