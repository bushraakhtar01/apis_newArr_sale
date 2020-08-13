<?php
class Post{

private $conn;
private $table ='sapphiretable';


public $id;
public $name;
public $code;
public $brand;
public $color;
public $material;
public $price;
public $type;
public $size_id;
public $size_type;
public $category_id;
public $category_name;
public $image;
public $arrival;
public $sale;



public function __construct($db){
    $this->conn=$db;
}

public function read(){

    $query='SELECT
    c.category_name as category_name,
    s.size_type as size_type,
    p.id,
    p.name,
    p.code,
    p.brand,
    p.color,
    p.material,
    p.price,
    p.type,
    p.category_id,
    p.size_id,
    p.image,
    p.arrival,
    p.sale
    FROM
    ' . $this->table . ' p
    LEFT JOIN
    category c ON p.category_id=c.category_id
    LEFT JOIN
    size s ON p.size_id=s.size_id';

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;   
}

public function create(){
    $query = ' INSERT INTO ' . $this->table . '
    SET
      name = :name,
      code = :code,
      brand = :brand,
      color = :color,
      material = :material, 
      price = :price,
      type = :type,
      size_id = :size_id,
      category_id = :category_id,
     image = :image,
     arrival=:arrival,
     sale=:sale';

      $stmt = $this->conn->prepare($query);

      $this->name=htmlspecialchars(strip_tags($this->name));
      $this->code=htmlspecialchars(strip_tags($this->code));
      $this->brand=htmlspecialchars(strip_tags($this->brand));
      $this->color=htmlspecialchars(strip_tags($this->color));
      $this->material=htmlspecialchars(strip_tags($this->material));
      $this->price=htmlspecialchars(strip_tags($this->price));
      $this->type=htmlspecialchars(strip_tags($this->type));
      $this->size_id=htmlspecialchars(strip_tags($this->size_id));
      $this->category_id=htmlspecialchars(strip_tags($this->category_id));
      $this->image=htmlspecialchars(strip_tags($this->image));
      $this->arrival=htmlspecialchars(strip_tags($this->arrival));
      $this->sale=htmlspecialchars(strip_tags($this->sale));


    
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':code', $this->code);
      $stmt->bindParam(':brand', $this->brand);
      $stmt->bindParam(':color', $this->color);
      $stmt->bindParam(':material', $this->material);
      $stmt->bindParam(':price', $this->price);
      $stmt->bindParam(':type', $this->type);
      $stmt->bindParam(':size_id', $this->size_id);
      $stmt->bindParam(':category_id', $this->category_id);
      $stmt->bindParam(':image', $this->image);
      $stmt->bindParam(':arrival', $this->arrival);
      $stmt->bindParam(':sale', $this->sale);



      if($stmt->execute()){
          return true;
      }
          printf("Error: %s.\n", $stmt->error);
          return false;
      
}

public function update(){
    $query = 'UPDATE ' . $this->table . '
    SET
      name = :name,
      code = :code,
      brand = :brand,
      color = :color,
      material = :material, 
      price = :price,
      type = :type,
      size_id = :size_id,
      category_id = :category_id,
      image = :image,
      arrival=:arrival,
      sale=:sale
     WHERE
     id = :id';
     

      $stmt = $this->conn->prepare($query);

      $this->name=htmlspecialchars(strip_tags($this->name));
      $this->code=htmlspecialchars(strip_tags($this->code));
      $this->brand=htmlspecialchars(strip_tags($this->brand));
      $this->color=htmlspecialchars(strip_tags($this->color));
      $this->material=htmlspecialchars(strip_tags($this->material));
      $this->price=htmlspecialchars(strip_tags($this->price));
      $this->type=htmlspecialchars(strip_tags($this->type));
      $this->size_id=htmlspecialchars(strip_tags($this->size_id));
      $this->category_id=htmlspecialchars(strip_tags($this->category_id));
      $this->image=htmlspecialchars(strip_tags($this->image));
      $this->arrival=htmlspecialchars(strip_tags($this->arrival));
      $this->sale=htmlspecialchars(strip_tags($this->sale));
      $this->id=htmlspecialchars(strip_tags($this->id));
    
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':code', $this->code);
      $stmt->bindParam(':brand', $this->brand);
      $stmt->bindParam(':color', $this->color);
      $stmt->bindParam(':material', $this->material);
      $stmt->bindParam(':price', $this->price);
      $stmt->bindParam(':type', $this->type);
      $stmt->bindParam(':size_id', $this->size_id);
      $stmt->bindParam(':category_id', $this->category_id);
      $stmt->bindParam(':image', $this->image);
      $stmt->bindParam(':arrival', $this->arrival);
      $stmt->bindParam(':sale', $this->sale);


      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()){
          return true;
      }
          printf("Error: %s.\n", $stmt->error);
          return false;
      
}

public function delete(){
    $query = ' DELETE FROM ' . $this->table . ' WHERE id = :id';

    $stmt = $this->conn->prepare($query);

    $this->id = htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(':id' , $this->id);

    
    if($stmt->execute()){
        return true;
    }
        printf("Error: %s.\n", $stmt->error);
        return false;
    


}
}