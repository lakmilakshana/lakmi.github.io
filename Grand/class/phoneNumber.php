<?php


class PhoneNumber extends Model{
    protected static $table_name = "phone_number";
    protected static $columns = [
        'id', 'number', 'company_id'
    ];

    public $id;
    public $number;
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