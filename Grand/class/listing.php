<?php

//include_once "model.php";
    class Listing extends Model{
        protected static $table_name = "listings";
        protected static $columns = [
            'id',
            'company_name',
            'owner_name',
            'company_logo',
            'company_category',
            'company_description',
            'phone_number',
            'cellphone',
            'fax',
            'po_box',
            'email',
            'website',
            'country',
            'city',
            'subcity',
            'address_line_1',
            'address_line_2',
            'service_title',
            'service_description',
            'service_metadata',
            'service_metadescription',
            'product_title',
            'product_description',
            'product_metadata',
            'product_metadescription',
            'video_url',
            'facebook',
            'youtube',
            'twitter',
            'linkedin',
            'map',
            'staff'
        ];


    public $id;
    public $company_name;
    public $owner_name;
    public $company_logo;
    public $company_category;
    public $company_description;
    public $phone_number;
    public $cellphone;
    public $fax;
    public $po_box;
    public $email;
    public $website;
    public $country;
    public $city;
    public $subcity;
    public $address_line_1;
    public $address_line_2;
    public $service_title;
    public $service_description;
    public $service_metadata;
    public $service_metadescription;
    public $product_title;
    public $product_description;
    public $product_metadata;
    public $product_metadescription;
    public $video_url;
    public $facebook;
    public $youtube;
    public $twitter;
    public $linkedin;
    public $map;
    public $staff;


        public function __construct ($args = [])
        {
            foreach ($args as $key => $value){
                if (property_exists($this, $key)){
                    $this->$key = $value;
                }
            }

        }

        public static function sort($queries){

            $search = [];
            foreach ($queries as $key => $value){
                $search[] = " $key LIKE '$value%' ";
            }
            $sql = "select * from ". static::$table_name. " where " . implode(" OR ", $search) .";";
            $result = static::find_by_sql($sql);

            if (!empty($result)){
                return $result;
            }else{
                return false;
            }

        }

        public function category(){
            $sql = "select * from category inner join listings on listings.category_id = category.id where listings.id = ". $this->id;
            $category = parent::r_inner_join_s($sql, 'Category');
            return array_shift($category) ?? false;
        }

        public function owner(){
            $sql = "select * from user inner join listings on listings.owner_id = user.id where listings.id = ". $this->id;
            $owner = parent::r_inner_join_s($sql, 'Category');
            return array_shift($owner) ?? false;
        }

        public function products(){
            return parent::r_inner_join("products", "company_id", "listings", "id", 'Product')    ?? false;
        }

        public function phoneNumbers(){
            return parent::r_inner_join('phone_number', 'company_id', 'listings', 'id', 'PhoneNumber') ?? false;
        }

        public function services(){
            return parent::r_inner_join('services', 'company_id', 'listings', 'id', 'Service') ?? false;
        }

        public function staffs(){
            return parent::r_inner_join('staff', 'company_id', 'listings', 'id', 'Staff') ?? false;
        }


    }