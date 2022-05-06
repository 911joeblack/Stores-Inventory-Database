<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Delivery</title>

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

      <ul>
        <li><a href="../index.html">Welcome</a></li>
        <li><a href="addItem.php">add new item</a></li>
        <li><a href="queryDates.php">Query on date</a></li>
        <li><a href="queryOrder.php">Query order</a></li>
        <li><a href="buyItem.php">buy item</a></li>
        <li><a href="queryCustomers.php">customer info</a></li>
        <li><a class="active" href="queryDelivery.php">delivery info</a></li>
        <li style="float:right"><a href="createOrderPrivate.php">create order</a></li>
      </ul>
		<div id="form-wrap">
			<form method = "post" action= "/~cs332u14/queryDelivery.php">
				<div>
					<label for="Delivery_ID">Delivery ID:</label>
					<input class="form-input" type="text" name="upc" id="upc" placeholder="" required/>
				</div>
				<div>
					<input class="form-input" type="submit"/>
				</div>
			</form>
		</div>

		<table><thead><tr><th>Delivery_ID</th><th>Item_UPC</th><th>Amount</th><th>Date</th></tr></thead><tbody><tr><td>fdb7daa3-d35b-4803-82f2-cba3afea3d96</td><td>123456789012</td><td>10</td><td>2021-05-13</td></tr><tr><td>134fb927-97ee-4e25-bb34-ec79c9f09389</td><td>123456789015</td><td>2</td><td>2021-06-28</td></tr></tbody></table>
  </body>
