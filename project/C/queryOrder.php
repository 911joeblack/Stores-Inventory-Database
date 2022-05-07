<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Query Order 1.0</title>

		<!-- Include index.css -->
		<link rel="stylesheet" type="text/css" href="index.css"/>
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
    <?php require 'connect.php';?>
      <ul>
        <li><a href="../index.html">Welcome</a></li>
        <li><a href="addItem.php">add new item</a></li>
        <li><a href="queryDates.php">Query on date</a></li>
        <li><a class="active" href="queryOrder.php">Query order</a></li>
        <li><a href="buyItem.php">buy item</a></li>
        <li><a href="queryCustomers.php">customer info</a></li>
        <li><a href="queryDelivery.php">delivery info</a></li>
        <li style="float:right"><a href="createOrderPrivate.php">create order</a></li>
        <li style="float:right"><a href="Coupon.php">Coupon</a></li>
      </ul>

		<div id="form-wrap" style="position: relative; top:100px">
			<form method = "post" action= "queryOrder.php">
				<div>
					<label for="department">Department:</label>
					<select class="form-input" id="department" name="department">
                        <option value='Clothing'>Clothing</option><option value='Decor'>Decor</option>
                        <option value='Electronics'>Electronics</option><option value='Grocery'>Grocery</option>
        			</select>
				</div>
				<div>
					<input class="form-input" type="submit"/>
				</div>
			</form>
        <table>
        <thead>
        <tr>
          <th>UPC</th>
          <th>Restock_Amount</th>
          <th>Current_Stock</th>
            <th>Department_Name</th>
            <th>Purchase</th>
    </tr></thead>
        <tbody>
         <?php 
            if(!$conn)
            {
              //echo "connection failed";
            }
            else
            {
              //echo "connection success <br>";
            }
            $sql = "SELECT UPC, Current_Stock, Restock_Amount, Department_Name
                    FROM Item
                    WHERE Department_Name = '" . $_POST["department"] . "'";
            $result = mysqli_query($conn, $sql);
            
            if($result)
            {   
              //  echo "Query success <br>";
                while($row = mysqli_fetch_assoc($result))
                {
                    $full = $row["Restock_Amount"] - $row["Current_Stock"];
                    echo "<tr><td>"
                    . $row["UPC"] . " </td>"
                    . "<td>" . $row["Restock_Amount"] ." </td>"
                    . "<td>" . $row["Current_Stock"] ." </td>"
                    . "<td>" . $row["Department_Name"] ." </td>"
                    . "<td>" . $full ." </td>"
                    . "</tr>";
                }
            }
            else
            {
               echo "query failed: " . $sql;
            }
         ?>
        </tbody>
        </table>
		</div>

  </body>
