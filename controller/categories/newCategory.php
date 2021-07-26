<?php
    include '../../model/Category.php';

    $name=$_POST['cat_name'];

    $category = new Category;
    $result = $category->newCategory($name);
    echo $result;
    header('Location: ../../view/categories.php');

?>