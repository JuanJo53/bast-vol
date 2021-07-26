<?php
    include '../../model/Category.php';

    function updateCategoryData(){   
        $catId=$_POST['cat_idEdit'];
        $name=$_POST['cat_nameEdit'];
    
        $category = new Category;
        $response = $category->updateCategory($catId,$name);
        return $response;
    }
    echo updateCategoryData();
    
    header('Location: ../../view/categories.php');

?>