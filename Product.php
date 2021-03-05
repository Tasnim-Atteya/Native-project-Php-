<?php

include_once "database.php";
include_once "operations.php";

class Product extends database implements operations{
  
    private $id;
    private $name;
    private $photo;
    private $price;
    private $details;
    private $supplier_id;
    private $sub_category_id;
    private $brand_id;


    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function getDetails()
    {
        return $this->details;
    }
    public function getSubCategoryId()
    {
        return $this->sub_category_id;
    }
    public function getPrice()
    {
        return $this->price;
    } 
    public function getSupplierId()
    {
        return $this->supplier_id;
    }
    public function getBrandId()
    {
        return $this->brand_id;
    }

  
    
    // setters
    public function setId($id)
    {
       $this->id = $id;
    }
    public function setName($name)
    {
       $this->name = $name;
    }
    
    public function setSubCategoryId($sub_category_id)
    {
       $this->sub_category_id = $sub_category_id;
    }
    public function setDetails($details)
    {
       $this->details = $details;
    }
    public function setPhoto($photo)
    {
       $this->photo = $photo;
    }

    public function setBrandId($brand_id)
    {
       $this->brand_id = $brand_id;
    }
    public function setSupplierId($supplier_id)
    {
       $this->supplier_id = $supplier_id;
    }
    
    public function setPrice($price)
    {
       $this->price = $price;
    }


    

    // abstract methods to implement
    public function insertData(){

   }
    public function selectData(){
       $query = "SELECT `products`.* FROM `products` LIMIT 10";
       return $this->runDQL($query);

    }
    
    public function updateData(){

    }
    public function deleteData(){

    }

    public function getProductsBySub()
    {
       $query = "SELECT `products`.* FROM `products` WHERE `products`.`sub_category_id` = $this->sub_category_id";
       return $this->runDQL($query);
    }
   public function getReviewsByProduct()
      {
         $query = "SELECT `users_reviews`.* FROM `users_reviews` WHERE `users_reviews`.`product_id` = $this->id ";
         return $this->runDQL($query);
      }
      
    public function getSingleProduct()
    {
      $query = "SELECT `product_rating`.* FROM `product_rating` WHERE `product_rating`.`id` = $this->id";
      return $this->runDQL($query);
      

    }

    
    public function getorderByProduct()
    {
      $query = "SELECT `products`.*,`rproductsorder`.* ,
      COUNT(`rproductsorder`.`product_id`) AS `product_count`
      FROM 
      `rproductsorder` 
      JOIN `products` ON `rproductsorder`.`product_id`=`products`.`id`
      GROUP BY
      `rproductsorder`.`product_id`
      ORDER BY
      `product_count` DESC LIMIT 4 ";
      return $this->runDQL($query);
    }
    
    public function getmostRatedProduct()
    {
      $query = "SELECT
      `products`.*,
      `ratings`.`product_id`,
      COUNT(`ratings`.`product_id`) AS `rating_count`
      FROM
            `ratings`
      JOIN `products` ON `ratings`.`product_id` = `products`.`id`
      GROUP BY
            `ratings`.`product_id`
      ORDER BY
            `rating_count`
      DESC
      LIMIT 4";
      return $this->runDQL($query);
    }
    public function getNewestProduct()
    {
     $query="SELECT `products`.* 
     FROM `products`
     GROUP BY
      `products`.`id`
     order by `created_at` ASC LIMIT 4 ";
    return $this->runDQL($query);

    }
}

?>