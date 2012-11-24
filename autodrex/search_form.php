<?php

$con = mysql_connect("localhost","ydesign_cartacs","ydesign_cartacs");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// some code

mysql_select_db("ydesign_cartacs", $con);

$locations = mysql_query("SELECT id,name FROM vows8_enmasse_location WHERE published = 1");
$categories = mysql_query("SELECT id,name FROM vows8_enmasse_category WHERE published = 1");

mysql_close($con);


?>
<style>
.module .search-deal div{float:left; margin-right:10px;padding-bottom:0px;}
.search-deal{ margin:0px;}

</style>
<div class="search-deal">
		
			<form action="./" method="get">
				<input type="hidden" name="option" id="option" value="com_enmasse"/>
				<input type="hidden" name="controller" id="controller" value="deal"/>
				<input type="hidden" name="task" id="task" value="display"/>
				
						
						<div style="margin-left:20px;"><input type="text" name="keyword" size="20" value="Search Deals..."></div>
						<div><select id="locationId" name="locationId">
                        		<option value="" selected="selected">Select Location</option>
                                <?php while($location = mysql_fetch_array($locations)){?>
                                <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div><select id="categoryId" name="categoryId">
                                <option value="">Select Category</option>
                                <?php while($category = mysql_fetch_array($categories)){?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php } ?>
                        	</select>
                        </div>
						<div>
							<select name="sortBy">
							<option value="">(Sort By)</option>
							<option value="name">Deal Name</option>
							<option value="end_at">End date</option>
							<option value="price">Price</option>
							</select>
						</div>
						<div><input type="submit" class="button" value="Search"></div>
					
			</form>
		
	</div>