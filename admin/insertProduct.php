<?php require_once 'core/init.php';
 $user = new User();
 if (!$user->isLoggedIn() ){
     Redirect::to('includes/errors/restricted.php');
 }
 else{
$table = 'products';
$post = new Post();
$categories = $post->get('products_categories')->results();

if(Input::exists()){
    if(Token::check(Input::get('token'))){
         $validate = new Validate();
         $validation = $validate->check($_POST, array(
             'popis' => array(
                 'name' => 'Popis',
                 'required' => true),
             'one' =>array(
                 'name' => 'One',
                 'required' => true),
             'mid' =>array(
                 'name' => 'Mid',
                 'required' => true),
             'pro' =>array(
                 'name' => 'Pro',
                 'required' => true),
                 ));
          if($validation->passed()){
              try{
                  $post->create($table,array(
                      'popis'=>Input::get('popis'),
                      'one' =>Input::get('one'),
                      'mid' =>Input::get('mid'),
                      'pro' => Input::get('pro'),
                      'category_id' => Input::get('category')
                  ));
                  Session::flash('status', 'Záznam úspešne pridaný');
                  //Redirect::to('?page=insertProduct.php');
              }
              catch(Exception $e){
                  die($e->getMessage());
              }
          }
                  else{
            foreach($validate->getErrors() as $error);
            echo '<p class="status">' . $error .'</p>';
          }
    }
}
?>

 <div class="insert">
    <form action ="" method="POST" enctype="multipart/form-data">
        <input type="text" name="popis" placeholder="Popis" class="insert_input" autocomplete="off"><br>
        <input type="text" name="one" placeholder="One" class="insert_input" autocomplete="off" ><br>
        <input type="text" name="mid" placeholder="Mid" class="insert_input" autocomplete="off"><br>
        <input type="text" name="pro" placeholder="Pro" class="insert_input" autocomplete="off" ><br>
        <select name="category" class="insert_input">
            <?php 
                foreach($categories as $category){
                    echo '<option value='.$category->id.'>'.$category->name.'</option>';
                }
            ?>
        </select>
        <input type="hidden" name="token" value="<?php echo Token::generate() ?>">
        <input type="submit" value="Pridať" class="confirm_button">
    </form>
    <?php 
        if(Session::exists('status')){
            echo '<p class="status">' . Session::flash('status')  . '</p>';
        }
    ?>
</div>
 <?php } ?>