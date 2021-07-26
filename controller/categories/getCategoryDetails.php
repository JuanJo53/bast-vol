<?php
    include '../../model/Category.php';
    
    function showCategoryDetails(){
        $catId=$_GET['cat_id'];
        $category = new Category;
        $categoryData = $category->getCategoryById($catId);
        $response=$categoryData->fetch_assoc();
        return json_encode($response);
    }
    echo showCategoryDetails();

?>