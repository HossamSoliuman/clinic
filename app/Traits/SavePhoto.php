<?php
namespace App\Traits ;
trait SavePhoto{
  public function  SavePhoto($photo,$folder){
        $name=time().'.'.$photo->extension();        
        $photo->move($folder,$name);
        return $name;        
    }
}
?>