<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Buy Item</title>

		<!-- Include index.css -->
		<link rel="stylesheet" type="text/css" href="index.css"/>
    <style>
      body 
      {
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
		<li style="float:right"><a href="Coupon.php">Coupon</a></li>
	</ul>

		<div id="form-wrap">
			<form method = "post" action= "buyItem.php">
				<div>
					<label for="customer">Customer ID:</label>
					<select class="form-input" id="customer" name="customer">
            <?php
              require 'connect.php';
              $sql = "SELECT ID
                      FROM Customer";
              echo "Query Ran" . $sql . "<br>";
              $result = mysqli_query($conn, $sql);
              
              while ($row = mysqli_fetch_array($result))
              {
			          echo "<option value='" . $row["ID"] . "'>" . $row["ID"] . "</option>";
              }
            ?>
          </select>
				</div>
				<div>
					<label for="transaction">Transaction ID(empty makes new):</label>
					<input class="form-input" type="number" id="transaction" value="0" name="transaction" min="0" step="1">
            </input>
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
					<input class="form-input" type="submit" onclick="window.location.reload(true)"/>
				</div>
			</form>
		</div>

		<table>
            <thead>
            <tr>
                <th>UPC</th>
                <th>Price</th>
                <th>Interim Price</th>
                <th>Wholesale Price</th>
                <th>Stock Amount</th>
                <th>Restock Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php
                // require 'connect.php';
                //MUST CHECK UPC EXISTS
                $UPC_Check = "SELECT UPC, Current_Stock, Wholesale
                              FROM Item
                              WHERE UPC = '" . $_POST["upc"] . "'";
                echo "UPC_Check: " . $UPC_Check . "<br>";
                $UPC_Check_Result = mysqli_query($conn, $UPC_Check);
                if($UPC_Check_Result == false)
                {
                  echo "UPC doesn't exist <br>";
                }
                else
                {
                  //MUST CHECK IF ENOUGH OF ITEM
                  $resultStock = mysqli_fetch_assoc($UPC_Check_Result);
                  if($resultStock["Current_Stock"] >= $_POST["amount"])
                  {
                    $newStock = $resultStock["Current_Stock"] - $_POST["amount"];
                    //IF TRANSACTION ID GIVEN
                    if($_POST["transaction"] != 0) 
                    { 
                      echo "transaction ID given <br>";
                      $sqlCheck = "SELECT Transaction_ID
                                  FROM `Transaction`
                                  WHERE Transaction_ID = " . $_POST["transaction"] . 
                                  " AND Customer_ID = " . $_POST["customer"];
                      $Trans_IDConfirm = mysqli_query($conn,$sqlcheck);
                      if($Trans_IDConfirm == false)
                      {
                        echo "Transaction ID does not exist";
                      }
                      else
                      {
                        $checkUPC = "COUNT(1)
                                    FROM Item_Summary
                                    WHERE Transaction_ID = " . $_POST["transaction"] . 
                                    "AND Customer_ID = " . $_POST["customer"] . 
                                    "AND UPC = " . $_POST["upc"];
                        $checkResult = mysqli_query($conn, $checkUPC);
                        if($checkResult == 0)
                        {
                          $sqlSummary = "INSERT INTO Item_Summary(UPC, Customer_ID, Transaction_ID, Amount_Of_Item, Price_Paid)
                            VALUES ('" . $_POST["upc"] . "','" . $_POST["customer"] . "'," . 
                                    $_POST["transaction"] . "," . $_POST["amount"] .  "," .
                                    $resultStock["Wholesale"] . ")";
                          
                          echo "Query SQLSummary: " . $sqlSummary . "<br>";
                          mysqli_query($conn, $sqlSummary);
                          $sqlUpdate = "UPDATE Item
                                        SET Current_Stock = " . $newStock . 
                                        "WHERE UPC = " . $_POST["upc"];
                          echo "Query Update: " . $sqlUpdate . "<br>";
                          mysqli_query($conn, $sqlUpdate);
                          //MODIFY ITEM FOR NEW STOCK
                        }
                        else
                        {
                          echo "UPC already exists in transaction, to buy more start a new transaction <br>";
                        }
                      }
                    }
                    else
                    {
                      echo "transaction ID not given <br>";
                      $sqlCheck = "COUNT (1)
                                   FROM `Transaction`
                                   WHERE `Transaction`.`Customer_ID` = '" . $_POST["customer"] .
                                "' ORDER BY Transaction_ID DESC LIMIT 1";
                      echo "Query: " . $sqlCheck . "<br>";
                      $result = mysqli_query($conn, $sqlcheck);
                      $count = mysqli_num_rows($result);
                      echo $result . "<br>";
                      $Transaction_ID = 0;
                      if($count == 0)
                      {

                        $Transaction_ID = 1;
                        echo "Transaction_ID 1st: " . $Transaction_ID . "<br>";
                      }
                      else
                      {
                        $sqlCheck = "SELECT Transaction_ID 
                        FROM `Transaction`
                        WHERE `Transaction`.`Customer_ID` = '" . $_POST["customer"] .
                        "' ORDER BY Transaction_ID DESC LIMIT 1";
                        echo "Query: " . $sqlCheck . "<br>";
                        $result = mysqli_query($conn, $sqlcheck);
                        $obj = mysqli_fetch_assoc($result);
                        $Transaction_ID = $obj["Transaction_ID"] + 1;
                        echo "Transaction_ID exists: " . $Transaction_ID . "<br>";
                      }

                      $date = date('Y-m-d H:i:s');
                      $sql = "INSERT INTO `Transaction`(`Customer_ID`, `Transaction_ID`, `Start`,
                        `End`)
                        VALUES ('"
                        . $_POST["customer"] . "'," . $Transaction_ID
                        . ",'" . $date . "',"
                        . "null)";
                      echo "Query: " . $sql . "<br>";
                      mysqli_query($conn, $sql);
                  
                      $sqlItemSummary = "INSERT INTO Item_Summary(UPC, Customer_ID, Transaction_ID, Amount_Of_Item,
                       Price_Paid) VALUES ('" . $_POST["upc"] . "','" . $_POST["customer"] . "'," . 
                        $Transaction_ID . "," . $_POST["amount"] .  "," .
                        $resultStock["Wholesale"] . ")";
                        
                      echo "Query Item_Summary: " . $sqlItemSummary . "<br>";
                      mysqli_query($conn, $sqlItemSummary);
                      $sqlUpdate = "UPDATE Item
                                    SET Current_Stock = " . $newStock . 
                                    " WHERE UPC = " . $_POST["upc"];
                      echo "Query modify Current_Stock: " . $sqlUpdate . "<br>";
                      mysqli_query($conn, $sqlUpdate);
                    }
                      //PLACE HERE
                      //FOR IF NO TRANSACTION ID GIVEN
                    
                  }
                  else
                  {
                    echo "Not enough items in stock!<br>";
                  }
                }
                
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
                        . "<td>" . $row["Wholesale"] ."</td>"
                        . "<td>" . $row["Restock_Amount"] ."</td>"
                        . "<td>" . $row["Current_Stock"] ."</td>"
                        . "<td>" . $row["Department_Name"] ."</td>"
                        . "<td>" . $Full ."</td>"
                        . "</tr>";
                    }
                }
            ?>
</body>
