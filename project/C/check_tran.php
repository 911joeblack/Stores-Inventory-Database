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
    </style>
    </head>
    <body>

      <div id="form-wrap">
			<form method = "post" action= "check_tran.php">
				<div>
					<label for="customer">Customer ID:</label>
					<select class="form-input" id="customer" name="customer">
						<option value='1234567890'>1234567890</option><option value='1234567891'>1234567891</option><option value='1234567892'>1234567892</option><option value='1234567893'>1234567893</option><option value='1234567894'>1234567894</option>					</select>
                </div>
                <div>
					<input class="form-input" type="submit"/>
				</div>
			</form>
		</div>

  </body>

