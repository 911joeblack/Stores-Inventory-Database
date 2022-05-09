<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Buy Item</title>

		<!-- Include index.css -->
		<link rel="stylesheet" href="style.css"/>

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
        <li><a class="active" href="buyItem.php">buy item</a></li>
        <li><a href="queryDelivery.php">delivery info</a></li>
        <li style="float:right"><a href="createOrderPrivate.php">create order</a></li>
		<li style="float:right"><a href="Query_Transaction.php">Transaction</a></li>
	</ul>

		<div id="form-wrap">
			<form method = "post" action= "buyItem.php">
				<div>
					<label for="customer">Customer ID:</label>
					<select class="form-input" style="width:200px"id="customer" name="customer">
						<option value='1234567890'>1234567890</option><option value='1234567891'>1234567891</option><option value='1234567892'>1234567892</option><option value='1234567893'>1234567893</option><option value='1234567894'>1234567894</option>					</select>
						<button onclick="myFunction()" style="border-radius: 20px;">Check trans</button>
				</div>
				<div>
					<label for="transaction">Transaction ID:</label>
					<input class="form-input" type="number"style="width:200px"id="transaction" name="transaction">
				</div>
				<div>
					<label for="upc">Item UPC:</label>
					<input class="form-input" style="width:200px"type="number" name="upc" id="upc" min="100000000000" max="999999999999" step="1" placeholder="000000000000" required/>
				</div>
				<div>
					<label for="amount">Amount:</label>
					<input class="form-input" style="width:200px"type="number" name="amount" id="amount" min="1" step="1" placeholder="1" value="1" required/>
				</div>
				<div>
					<label for="coupon">Coupon:</label>
					<input class="form-input" style="width:200px"type="text" name="coupon" id="coupon" placeholder="00000000-0000-0000-0000-000000000000"/>
				</div>
				<div>
					<input class="form-input" type="submit" onclick="submitCheck()"/>
				</div>
			</form>
		</div>

		<script>
			function myFunction(){
				window.open("check_tran.php","transaction","width=900,height=400");
			}
	</script>
</body>
