<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Buy Item</title>

		<!-- Include index.css -->
		<link rel="stylesheet" type="text/css" href="index.css"/>
		<script>
			function submitCheck () {
				setCookie(
					'transaction_id',
					document.getElementById('transaction').value === '00000000-0000-0000-0000-000000000000' ?
						window.transaction_id :
						getCookie('transaction_id') !== document.getElementById("transaction").value ?
							document.getElementById("transaction").value :
							getCookie('transaction_id') === '' ?
								window.transaction_id : getCookie('transaction_id')
				);
        const setCookie = (name, value, days = 7, path = '/') => {
      	const expires = new Date(Date.now() + days * 864e5).toUTCString();
      	document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=' + path;
      }

      const getCookie = (name) => {
      	return document.cookie.split('; ').reduce((r, v) => {
      		const parts = v.split('=')
      		return parts[0] === name ? decodeURIComponent(parts[1]) : r
      	}, '');
      }

      const deleteCookie = (name, path) => {
      	setCookie(name, '', -1, path);
      }
			}
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
        <li><a href="addItem.php">add new item</a></li>
        <li><a href="queryDates.php">Query on date</a></li>
        <li><a href="queryOrder.php">Query order</a></li>
        <li><a class="active" href="buyItem.php">buy item</a></li>
        <li><a href="queryCustomers.php">customer info</a></li>
        <li><a href="queryDelivery.php">delivery info</a></li>
        <li style="float:right"><a href="createOrderPrivate.php">create order</a></li>
      </ul>

		<div id="form-wrap">
			<form method = "post" action= "buyItem.php">
				<div>
					<label for="customer">Customer ID:</label>
					<select class="form-input" id="customer" name="customer">
						<option value='1234567890'>1234567890</option><option value='1234567891'>1234567891</option><option value='1234567892'>1234567892</option><option value='1234567893'>1234567893</option><option value='1234567894'>1234567894</option>					</select>
				</div>
				<div>
					<label for="transaction">Transaction ID:</label>
					<select class="form-input" id="transaction" name="transaction">
						<option value="00000000-0000-0000-0000-000000000000" selected>New Transaction</option>
					</select>
				</div>
				<div>
					<label for="upc">Item UPC:</label>
					<input class="form-input" type="number" name="upc" id="upc" min="100000000000" max="999999999999" step="1" placeholder="000000000000" required/>
				</div>
				<div>
					<label for="amount">Amount:</label>
					<input class="form-input" type="number" name="amount" id="amount" min="1" step="1" placeholder="1" value="1" required/>
				</div>
				<div>
					<label for="coupon">Coupon:</label>
					<input class="form-input" type="text" name="coupon" id="coupon" placeholder="00000000-0000-0000-0000-000000000000"/>
				</div>
				<div>
					<input class="form-input" type="submit" onclick="submitCheck()"/>
				</div>
			</form>
		</div>

		<script>window.transaction_id = 'e5caa503-440a-46db-a3a2-dafe5ecb914a';</script><table><thead><tr><th>UPC</th><th>Price</th><th>Interim_Price</th><th>Wholesale_Price</th><th>Stock_Amount</th><th>Restock_Amount</th></tr></thead><tbody><tr><td>123456789012</td><td>2</td><td>3</td><td>5</td><td>9983</td><td>50000</td></tr><tr><td>123456789013</td><td>0.5</td><td>2</td><td>3</td><td>17399</td><td>25000</td></tr><tr><td>123456789014</td><td>10</td><td>15</td><td>40</td><td>0</td><td>45000</td></tr><tr><td>123456789015</td><td>500</td><td>450</td><td>700</td><td>100</td><td>500</td></tr><tr><td>123456789016</td><td>200</td><td>150</td><td>250</td><td>2500</td><td>10000</td></tr><tr><td>123456789017</td><td>100</td><td>110</td><td>120</td><td>4969</td><td>7000</td></tr><tr><td>123456789018</td><td>50</td><td>60</td><td>70</td><td>3499</td><td>100000</td></tr></tbody></table><script>document.getElementById('transaction').innerHTML += "<option value='1a20eda6-8427-44d5-9681-83b3b64d27bd'>1a20eda6-8427-44d5-9681-83b3b64d27bd</option><option value='766f775e-cbee-4704-91b2-42cce783ee47'>766f775e-cbee-4704-91b2-42cce783ee47</option><option value='7aabc749-ff20-433d-8d7b-26bf0563b623'>7aabc749-ff20-433d-8d7b-26bf0563b623</option><option value='c8293c77-02a6-4799-89fb-85d70578a76b'>c8293c77-02a6-4799-89fb-85d70578a76b</option><option value='ea97cc76-13db-4845-805a-6553177c7f9e'>ea97cc76-13db-4845-805a-6553177c7f9e</option>";	window.addEventListener("DOMContentLoaded", (event) => {
		document.getElementById("transaction").value =
			getCookie("transaction_id") === "" ||
			document.querySelector(`#transaction > option[value="${getCookie("transaction_id")}"]`) === null ?
			"00000000-0000-0000-0000-000000000000" : getCookie("transaction_id");
	});</script>
</body>
