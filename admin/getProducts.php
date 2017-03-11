<?php 
require_once 'core/init.php';
 $user = new User();
 if (!$user->isLoggedIn() ){
     Redirect::to('includes/errors/restricted.php');
 }
 else{
?>
<div class="get">
        <a href="?page=insertProduct.php" class="href_addButton"><div class="addButton" style="float:left">Pridať produkt</div></a>
        <a href="?page=insertCategory.php" class="href_addButton"><div class="addButton" style="float:left; margin-left:1%;">Pridať kategóriu</div></a>
        <div class="clear"></div>
<?php 
			$products = new Post();
			$results = $products->query("SELECT cats.name AS cat_name,
                                                p.id AS id,
												p.popis AS popis,
												p.one AS one,
												p.mid AS mid,
												p.pro AS pro
										FROM products AS p
										JOIN products_categories AS cats
										ON p.category_id=cats.id")->results();
			$storage = [];
			foreach($results as $result)
			{
				$cat_name = $result->cat_name;
				$storage[$cat_name][] = [
                    'id' => $result->id,
					'popis' => $result->popis,
					'one' => $result->one,
					'mid' => $result->mid,
					'pro' => $result->pro
				];
			} 

			foreach($storage as $cat_name => $cat_items) {
				$keys = array_keys($cat_items[0]);
                array_shift($keys);
				echo '<h1>'.$cat_name.'</h1>';
			?>
			<table class="products">
				<thead>
					<tr class="<?php echo $keys[0]; ?>">
					<?php 
						foreach($keys as $key) {
						echo '<th>'.$key.'</th>';
						}
					?>
					</tr>
				</thead>
				<?php
						foreach($cat_items as $item) {
                            ?>
							<tr onclick="document.location='?page=updateProducts.php&id=<?= $item['id'] ?>';" style="cursor:pointer">
                            <?php
							echo '
                            <td>'.$item['popis'].'</td>
							<td>'.$item['one'].'</td>
							<td>'.$item['mid'].'</td>
							<td>'.$item['pro'].'</td>
							</tr>';
						}
				?>
			</table>
			<?php
            }
			?>
</div>

 <?php } ?>