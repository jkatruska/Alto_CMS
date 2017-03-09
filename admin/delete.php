<?php 
    $post = new Post();
    $id = $_GET["id"];
    $table=$_GET["table"];
    $from = $_GET["from"];
    $image = $post->get($table, array('id','=',$id))->results();
    if($image[0]->image){
        $path = '../'.$image[0]->image;
        $post->deleteImage($path);
    }
    if($post->delete($table,array('id','=',$id))){
        echo 'success';
    }
    else 
        echo 'fail';
    Session::flash('admin_home', 'Záznam vymazaný');
    Redirect::to('?page='.$from);
    ?>