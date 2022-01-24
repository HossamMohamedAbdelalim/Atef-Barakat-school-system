<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.block {
  display: block;
  width: 100%;
  border: none;
  background-color: #04AA6D;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}

.block:hover {
  background-color: #ddd;
  color: black;
}
div {
  resize: both;
  overflow: auto;
}
</style>
</head>
<body>
    <div>
    
    <form action="payment_fawry_view.php"><button class="block">fawry</button></form>
    <br>
    <form action="payment_visa_view.php"><button class="block">visa</button></form>
    <br>
    <form action="payment_vodafonecash_view.php"><button class="block">vodafone cash</button></form>
    </div>
</body>
</html>