<?php


    class Category extends Model{
        protected static $table_name = "category";
        protected static $columns = [
            'id', 'category'
        ];

        public $id;
        public $category;

        public function __construct ($args = [])
        {
            foreach ($args as $key => $value){
                if (property_exists($this, $key)){
                    $this->$key = $value;
                }
            }

        }

        public function companies(){
            return parent::r_inner_join('listings', 'category_id', 'category', 'id', 'Listing');
        }


    }