<?php 
			$calendar = new Calendar();
			$results = $calendar->query("SELECT     cats.name AS cat_name,
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
					'popis' => $result->popis,
					'one' => $result->one,
					'mid' => $result->mid,
					'pro' => $result->pro
				];
			} 
			?>
			<?php
			foreach($storage as $cat_name => $cat_items) {
				$keys = array_keys($cat_items[0]);
				echo '<h1>'.$cat_name.'</h1>';
			?>
			<table>
				<thead>
					<tr class="<?php echo $keys[0]; ?>">
					<?php 
						foreach($keys as $key) {
						echo '<th>'.$key.'</th><th></th>';
						}
					?>
					</tr>
				</thead>
				<?php
						foreach($cat_items as $item) {
							echo '<tr>
							<td>'.$item['popis'].'</td>
							<td></td>
							<td>'.$item['one'].'</td>
							<td></td>
							<td>'.$item['mid'].'</td>
							<td></td>
							<td>'.$item['pro'].'</td>
							</tr>';
						}
				?>
			</table>
			<?php
			}

			?>


