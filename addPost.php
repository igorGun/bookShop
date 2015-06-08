<?php
require_once('src/autoload.php');
    //echo('<PRE>');
    //var_dump($_SESSION['user']->id);
    

    //die;
    //$post = new Post(null,);

    $postValidate = new ValidatePost( 
        $_POST['title'],
        $_POST['body'],
        $_SESSION['user']->id);

    //print_r($_POST);
    try{
        if($postValidate->validate()) {

            $postProv = new PostDataProviderDb();
            $postProv->save($postValidate);
            header("Location: listPost.php");
        }
    } catch (Exception $e) {
        $error =  $e->getMessage();
    }



require_once('templates/header.php');
require_once('templates/addPostForm.php');
echo $error;
require_once('templates/footer.php');