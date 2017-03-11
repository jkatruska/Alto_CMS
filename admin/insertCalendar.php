<?php 
require_once 'core/init.php';
 $user = new User();
 if (!$user->isLoggedIn() ){
     Redirect::to('includes/errors/restricted.php');
 }
 else{
if(Input::exists()){
    if(Token::check(Input::get('token'))){
         $validate = new Validate();
         $validation = $validate->check($_POST, array(
             'name' => array(
                 'name' => 'Názov semináru',
                 'required' => true,
                 'max' => 150),
             'date'=>array(
                 'name' => 'Dátum',
                 'required' => true,
                 'max' => 15),
            'link'=>array(
                'name'=>'Link',
                'required' => true,
                'max' =>50),
            'text'=>array(
                'name' => 'Popis',
                'required' => true),
            'product'=>array(
                'name' => 'Produkt',
                'required' => true
            )
            ));
          if($validation->passed()){
              $post = new Post();
              try{
                 $post->create('calendar',array(
                      'name'=>Input::get('name'),
                      'date' =>Input::get('date'),
                      'link' =>Input::get('link'),
                      'content' =>Input::get('text'),
                      'product' => Input::get('product')
                  ));
                  Session::flash('status', 'Záznam úspešne pridaný');
                  
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
    <form action ="" method="POST">
        <input type="text" name="name" placeholder="Názov semináru" class="insert_input" autocomplete="off"><br>
        <input type="text" name="date" placeholder="Dátum semináru" class="insert_input" autocomplete="off"><br>
        <input type="text" name="link" placeholder="Link na seminár" class="insert_input" autocomplete="off"><br>
        <select name="product" class="insert_input">
            <option value="food">Food</option>
            <option value="hores">Hores</option>
        </select>
        <textarea name="text" id="text" placeholder="Popis"></textarea><br>
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