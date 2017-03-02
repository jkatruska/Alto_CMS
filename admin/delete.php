<?php 
    $post = new Post();
    $table=$_GET["table"];
    $id = $_GET["id"];
    $post->delete($table,array('id','=',$id));
    Session::flash('admin_home', 'Záznam vymazaný');
    Redirect::to('index.php');
    ?>