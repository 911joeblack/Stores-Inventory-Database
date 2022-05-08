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
        <li><a href="queryCustomers.php">customer info</a></li>
        <li><a href="queryDelivery.php">delivery info</a></li>
        <li style="float:right"><a href="createOrderPrivate.php">create order</a></li>
        <li style="float:right"><a class="active" href="Coupon.php">Coupon</a></li>
      </ul>

      <div style="position: relative; top:100px">
		<div id="form-wrap">
			<form method = "post" action= "Coupon.php">
				<div>
					<label for="Item_Purchase">Item_Purchase:</label>
					<input class="form-input" type="text" name="upc" id="upc" placeholder="" required/>
				</div>
				<div>
					<input class="form-input" type="submit"/>
				</div>
			</form>
		</div>

    <table>
      <thead>
        <tr>
          <th>UPC</th>
          <th>Coupon ID</th>
          <th>Amount_off</th>
      <th>Required_purchase</th>

    </tr></thead>
    <tbody>
      <tr><td>123456789012</td><td>2</td><td>3</td><td>5</td></tr>
      <tr><td>123456789013</td><td>0.5</td><td>2</td><td>3</td></tr>
      <tr><td>123456789014</td><td>10</td><td>15</td><td>40</td></tr>
      <tr><td>123456789015</td><td>500</td><td>450</td><td>700</td></tr>
      <tr><td>123456789016</td><td>200</td><td>150</td><td>250</td></tr>
      <tr><td>123456789017</td><td>100</td><td>110</td><td>120</td></tr>
      <tr><td>123456789018</td><td>50</td><td>60</td><td>70</td></tr>
    </tbody>
      </table>
  </div>


  </body>
