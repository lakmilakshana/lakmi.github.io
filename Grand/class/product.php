<?php

    class Product extends Model{

        protected static $table_name = "products";
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
            $sql = "select * from listings inner join products on products.company_id = listings.id where listings.id = ". $this->company_id;
            return parent::r_inner_join_s($sql, 'Listing')    ?? false;
        }
    }