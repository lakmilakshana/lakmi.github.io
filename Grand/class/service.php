<?php
class Service extends Model{

    protected static $table_name = "services";
    protected static $columns= [
        "id", "title", "description", "metadata", "meta_description", "company_id"
    ];

    public $id;
    public $title;
    public $description;
    public $meta_descripion;
    public $metadata;
    public $company_id;


    public function __construct ($args = [])
    {
        foreach ($args as $key => $value){
            if (property_exists($this, $key)){
                $this->$key = $value;
            }
        }

    }

    public function companies(){
        return parent::r_inner_join('listings', 'id', 'services', 'company_id', 'Listing')    ?? false;
    }
}