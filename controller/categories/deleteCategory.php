<?php
    include '../../model/Category.php';
    
    function removeCategory(){
        $categoryId=$_POST['cat_idD'];
        $category = new Category;
        $response = $category->deleteCategory($categoryId);
        return $response;
    }
    echo removeCategory();
    
    header('Location: ../../view/categories.php');

?>