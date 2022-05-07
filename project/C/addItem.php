<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Add Item 1.1</title>

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
			  <li><a class="active" href="addItem.php">add new item</a></li>
			  <li><a href="queryDates.php">Query on date</a></li>
			  <li><a href="queryOrder.php">Query order</a></li>
			  <li><a href="buyItem.php">buy item</a></li>
			  <li><a href="queryCustomers.php">customer info</a></li>
			  <li><a href="queryDelivery.php">delivery info</a></li>
			  <li style="float:right"><a href="C/createOrderPrivate.php">create order</a></li>
        <li style="float:right"><a href="Coupon.php">Coupon</a></li>
      </ul>
		<div id="form-wrap" >
			<form method = "post" action= "addItem.php">
				<div>
					<label for="upc">UPC:</label>
					<input class="form-input" type="number" name="upc" id="upc" min="100000000000" max="999999999999" step="1" placeholder="000000000000" required/>
				</div>
				<div>
					<label for="price">Price:</label>
					<input class="form-input" type="number" name="price" id="price" min="0" step="0.01" required/>
				</div>
				<div>
					<label for="interim_price">Interim Price:</label>
					<input class="form-input" type="number" name="interim_price" id="interim_price" min="0" step="0.01" required/>
				</div>
				<div>
					<label for="wholesale_price">Wholesale Price:</label>
					<input class="form-input" type="number" name="wholesale_price" id="wholesale_price" min="0" step="0.01" required/>
				</div>
				<div>
					<label for="restock_amount">Restock Amount:</label>
					<input class="form-input" type="number" name="restock_amount" id="restock_amount" min="0" step="1" required/>
				</div>
				<div>
					<label for="stock_amount">Stock Amount:</label>
					<input class="form-input" type="number" name="stock_amount" id="stock_amount" min="0" step="1" required/>
				</div>
				<div>
					<label for="department">Department:</label>
					<select class="form-input" id="department" name="department">
						<option value='Fashion'>Fashion</option><option value='Housing'>Housing</option><option value='Nutrition'>Nutrition</option>					</select>
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
          <th>Price</th>
          <th>Interim_Price</th>
      <th>Wholesale_Price</th>
      <th>Restock_Amount</th>
      <th>Stock_Amount</th>
      <th>Department_Name</th>
    </tr></thead>
    <tbody><tr><td>123456789012</td>
      <td>2</td><td>3</td><td>5</td><td>50000</td><td>9983</td>
      <td>Nutrition</td></tr>
      <tr><td>123456789013</td><td>0.5</td>
        <td>2</td><td>3</td><td>25000</td>
        <td>17399</td><td>Nutrition</td></tr>
        <tr><td>123456789014</td><td>10</td>
          <td>15</td><td>40</td><td>45000</td>
          <td>0</td><td>Fashion</td></tr><tr><td>123456789015</td>
            <td>500</td><td>450</td><td>700</td><td>500</td>
            <td>100</td><td>Housing</td></tr>
            <tr><td>123456789016</td><td>200</td>
              <td>150</td><td>250</td><td>10000</td>
              <td>2500</td><td>Housing</td></tr>
              <tr><td>123456789017</td><td>100</td><td>110</td>
                <td>120</td><td>7000</td><td>4969</td><td>Fashion</td></tr>
                <tr><td>123456789018</td><td>50</td><td>60</td><td>70</td>
                  <td>100000</td><td>3499</td><td>Nutrition</td></tr></tbody>
      </table>
  </body>
