<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Query Order 1.0</title>

		<!-- Include index.css -->
		<link rel="stylesheet" href="style.css">
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
        <li><a href="addItem.php">add new item</a></li>
        <li><a href="queryDates.php">Query on date</a></li>
        <li><a href="queryOrder.php">Query order</a></li>
        <li><a href="buyItem.php">buy item</a></li>
        <li><a href="queryDelivery.php">delivery info</a></li>
        <li style="float:right"><a href="createOrderPrivate.php">create order</a></li>
        <li style="float:right"><a class="active" href="Query_Transaction.php">Transaction</a></li>
      </ul>

      <div id="form-wrap">
			<form method = "post" action= "Query_Transaction.php">
				<div>
					<label for="customer">Customer ID:</label>
					<select class="form-input" id="customer" name="customer">
						<option value='1234567890'>1234567890</option><option value='1234567891'>1234567891</option><option value='1234567892'>1234567892</option><option value='1234567893'>1234567893</option><option value='1234567894'>1234567894</option>					</select>
            <button onclick="myFunction()" style="border-radius: 20px;">Check trans</button>
          </div>
        <div>
					<label for="transaction">Transaction ID:</label>
					<input class="form-input" type="number" id="transaction" name="transaction">
				</div>
				<div>
					<input class="form-input" type="submit"/>
				</div>
			</form>
		</div>

    <script>
			function myFunction(){
				window.open("check_tran.php","transaction","width=900,height=400");
			}
	</script>
  
    <?php 
        $servername = mariadb;
        $username = "cs332u23";
        $password = "zg9TQiFr";
        $dbname = $username;
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $str = "SELECT Amount_Of_Item, Price_Paid
                FROM Item_Summary,
                WHERE Transaction_ID =" .$_POST["transaction"].
                "AND Customer_ID =". $_POST["customer"];

        $query_result = mysqli_query($conn, $str);
        $cost=0;
        while($row = mysqli_fetch_assoc($query_result))
           { 
           $cost = $cost + $row["Amount_Of_Item"] * $query_result["Item_Summary"];
           }
      ?>
  </body>

