<?php require_once 'core/init.php';
$id = $_GET["id"];
$table = 'calendar';
$post = new Post();
$single = $post->get($table, array('id','=',$id))->results();

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
              try{
                  $post->update($table,$id, array(
                      'name'=>Input::get('name'),
                      'date' =>Input::get('date'),
                      'link' =>Input::get('link'),
                      'content' =>Input::get('text'),
                      'product' => Input::get('product')
                  ));
                  Session::flash('status', 'Záznam úspešne upravený');
                  Redirect::to('?page=updateCalendar.php&id='.$id);
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
        <input type="text" name="name" placeholder="Názov semináru" class="insert_input" autocomplete="off" value="<?php  echo escape($single[0]->name) ?>"><br>
        <input type="text" name="date" placeholder="Dátum semináru" class="insert_input" autocomplete="off" value="<?php  echo escape($single[0]->date) ?>"><br>
        <input type="text" name="link" placeholder="Link na seminár" class="insert_input" autocomplete="off" value="<?php  echo escape($single[0]->link) ?>"><br>
        <?php if($single[0]->product === 'food'){ ?>
            <select name="product" class="insert_input">
                <option value="food" selected="selected">Food</option>
                <option value="hores">Hores</option>
            </select>
        <?php } else{ ?>
            <select name="product" class="insert_input">
                <option value="food">Food</option>
                <option value="hores" selected="selected">Hores</option>
            </select>
        <?php } ?>
        <textarea name="text" id="text" placeholder="Popis"> <?php  echo escape($single[0]->content) ?> </textarea><br>
        <input type="hidden" name="token" value="<?php echo Token::generate() ?>">
        <input type="submit" value="Zmeniť" class="confirm_button">
        <?php 
            echo '<a href="?page=delete.php&table='.$table.'&id='. $id. '">'
        ?>
            <div class="delete_button">Vymazať</div>
            </a>
    </form>
    <?php 
        if(Session::exists('status')){
            echo '<p class="status">' . Session::flash('status')  . '</p>';
        }
    ?>
</div>