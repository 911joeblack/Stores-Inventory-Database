<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Add Item 1.1</title>

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
		  <li style="float:right"><a class="active" href="createOrderPrivate.php">create order</a></li>
		  <li style="float:right"><a href="Query_Transaction.php">Transaction</a></li>
    </ul>

    <div id="form-wrap">
			<form method = "post" action= "createOrderPrivate.php">
				<div>
					<label for="employee">Employee ID:</label>
					<select class="form-input" id="employee" name="employee" placeholder="00000000-0000-0000-0000-000000000000">
						<option value='5cc67768-8e7c-4724-a88f-03755c870694'>5cc67768-8e7c-4724-a88f-03755c870694</option><option value='e8a2fe2d-c30a-4bd2-8fae-9619b61fa282'>e8a2fe2d-c30a-4bd2-8fae-9619b61fa282</option><option value='486e4bf9-c568-41b1-9c29-33c45dfbc241'>486e4bf9-c568-41b1-9c29-33c45dfbc241</option><option value='5cbb6a70-b6d4-4494-a92d-edf4d0fc48ad'>5cbb6a70-b6d4-4494-a92d-edf4d0fc48ad</option><option value='d3287de6-fd53-40e2-9043-e4ebfea60029'>d3287de6-fd53-40e2-9043-e4ebfea60029</option><option value='e2ce892d-0a34-4f31-9ec0-0e0160f7a94f'>e2ce892d-0a34-4f31-9ec0-0e0160f7a94f</option>					</select>
				</div>
				<div>
					<label for="upc">Item UPC:</label>
					<!-- <input class="form-input" type="number" name="upc" id="upc" min="100000000000" max="999999999999" step="1" placeholder="000000000000" required/> -->
					<select class="form-input" id="upc" name="upc" placeholder="000000000000">
						<option value='100000000000'>100000000000</option><option value='123456789012'>123456789012</option><option value='123456789013'>123456789013</option><option value='123456789014'>123456789014</option><option value='123456789015'>123456789015</option><option value='123456789016'>123456789016</option><option value='123456789017'>123456789017</option><option value='123456789018'>123456789018</option><option value='123456789019'>123456789019</option><option value='154643212720'>154643212720</option>					</select>
				</div>
				<div>
					<label for="amount">Amount:</label>
					<input class="form-input" type="number" name="amount" id="amount" min="1" step="1" placeholder="1" value="1" required/>
				</div>
				<div>
					<input class="form-input" type="submit"/>
				</div>
			</form>
		</div>

		<table><thead><tr><th>Delivery_ID</th><th>Item_UPC</th><th>Amount</th><th>Date</th></tr></thead><tbody><tr><td></td><td>123456789012</td><td>1</td><td>2022-05-06</td></tr><tr><td></td><td>123456789013</td><td>1</td><td>2022-05-06</td></tr><tr><td></td><td>123456789012</td><td>1</td><td>2022-05-06</td></tr><tr><td></td><td>100000000000</td><td>1</td><td>2022-05-07</td></tr><tr><td></td><td>100000000000</td><td>1</td><td>2022-05-07</td></tr><tr><td></td><td>100000000000</td><td>1</td><td>2022-05-07</td></tr><tr><td></td><td>100000000000</td><td>1</td><td>2022-05-07</td></tr><tr><td></td><td>100000000000</td><td>100</td><td>2022-05-07</td></tr><tr><td>fdb7daa3-d35b-4803-82f2-cba3afea3d96</td><td>123456789013</td><td>11</td><td>2021-05-13</td></tr><tr><td></td><td>100000000000</td><td>1</td><td>2022-05-07</td></tr><tr><td></td><td>123456789014</td><td>2</td><td>2022-05-07</td></tr></tbody></table>		
		
		
  </body>
