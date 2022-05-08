<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Add Item 1.1</title>

		<!-- Include index.css -->
		<!-- <link rel="stylesheet" type="text/css" href="index.css"/> -->
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script>
			$(function() {
				$("#datepicker").datepicker({
					dateFormat: "yy-mm-dd"
				});
			});
		</script>
    <style>
      body {
      	background: linear-gradient(90deg, #C7C5F4, #776BCC);
      }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: #111;
    }

    .active {
      background-color: #04AA6D;
    }
    </style>
    </head>
    <body>

			<ul>
			  <li><a href="../index.html">Welcome</a></li>
			  <li><a class="active" href="addItem.php">add new item</a></li>
			  <li><a href="queryDates.php">Query on date</a></li>
			  <li><a href="queryOrder.php">Query order</a></li>
			  <li><a href="buyItem.php">buy item</a></li>
			  <li><a href="queryDelivery.php">delivery info</a></li>
			  <li style="float:right"><a href="createOrderPrivate.php">create order</a></li>
        <li style="float:right"><a href="Query_Transaction.php">Transaction</a></li>
      </ul>
		<div id="form-wrap" >
			<form method = "post" action= "addItem.php">
				<div>
					<label for="upc">UPC:</label>
					<input class="form-input" style="width:200px"type="number" name="upc" id="upc" min="100000000000" max="999999999999" step="1" placeholder="000000000000" required/>
				</div>
				<div>
					<label for="price">Price:</label>
					<input class="form-input" style="width:200px"type="number" name="price" id="price" min="0" step="0.01" required/>
				</div>
				<div>
					<label for="interim_price">Interim Price:</label>
					<input class="form-input" style="width:200px"type="number" name="interim_price" id="interim_price" min="0" step="0.01" required/>
				</div>
				<div>
					<label for="wholesale_price">Wholesale Price:</label>
					<input class="form-input" style="width:200px"type="number" name="wholesale_price" id="wholesale_price" min="0" step="0.01" required/>
				</div>
				<div>
					<label for="restock_amount">Restock Amount:</label>
					<input class="form-input" style="width:200px"type="number" name="restock_amount" id="restock_amount" min="0" step="1" required/>
				</div>
				<div>
					<label for="stock_amount">Stock Amount:</label>
					<input class="form-input" style="width:200px"type="number" name="stock_amount" id="stock_amount" min="0" step="1" required/>
				</div>
        <div>
					<label for="datepicker">expiration date:</label>
					<input class="form-input" style="width:200px" id="datepicker" type="text" name="date"/>
				</div>
				<div>
					<label for="department">Department:</label>
					<select class="form-input" style="width:200px" id="department" name="department" required>
						<option value='Grocery'>Grocery</option><option value='Decor'>Decor</option><option value='Electronics'>Electronics</option>
            <option value='Clothing'>Clothing </option>				
          </select>
				</div>
				<div>
					<input class="form-input" type="submit" onclick="window.location.reload(true)"/>
				</div>
			</form>
		</div>

		<table>
      <thead>
        <tr>
          <th>UPC</th>
          <th>Price</th>
          <th>Interim_Price</th>
      <th>Wholesale_Price</th>
      <th>Restock_Amount</th>
      <th>Stock_Amount</th>
      <th>Department_Name</th>
    </tr></thead>
    <tbody>
      <?php 
        $servername = mariadb;
        $username = "cs332u23";
        $password = "zg9TQiFr";
        $dbname = $username;
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        $sql = "INSERT INTO `Item`(`UPC`, `Restock_Amount`, `Price`,
          `Interim_Price`, `Current_Stock`, `Department_Name`, `Wholesale`) VALUES ('"
          . $_POST["upc"] . "'," . $_POST["restock_amount"] . "," . $_POST["price"]
          . "," . $_POST["interim_price"] . "," . $_POST["stock_amount"]
          . ",'" . $_POST["department"] . "'," . $_POST["wholesale_price"] . ")";
         echo "<br> Query ran" . $sql;
          mysqli_query($conn, $sql);

        $sql = "SELECT * FROM Item";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            echo "<tr><td>"
            . $row["UPC"] . "</td>"
            . "<td>" . $row["Price"] ."</td>"
            . "<td>" . $row["Interim_Price"] ."</td>"
            . "<td>" . $row["Restock_Amount"] ."</td>"
            . "<td>" . $row["Wholesale_Price"] ."</td>"
            . "<td>" . $row["Current_Stock"] ."</td>"
            . "<td>" . $row["Department_Name"] ."</td>"
            . "</tr>";
          }
        }
      ?>
          </tbody>
      </table>

  </body>
