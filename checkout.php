<!DOCTYPE html>
<html>
<head>
<title>Personal Information</title>
    <link href="styles/products.css" rel="stylesheet">
</head>
<body>
<h1><strong>Breasse</strong> </h1> 

<p><strong>Контролен списък</strong></p>

<form method="post" action="checkout2.php">

<table width="300" border="1" align="left">
  <tr>
    <th colspan="2">
      <div align="center"><strong>Персонална информация </strong></div>
    </th>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Име</div>
    </td>
    <td width="50%">
      <input type="text" name="firstname" maxlength="15">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Фамилия</div>
    </td>
    <td width="50%">
      <input type="text" name="lastname" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Пол</div>
    </td>
    <td width="50%">
      <input type="text" name="add1" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Възраст</div>
    </td>
    <td width="50%">
      <input type="text" name="add2" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Град</div>
    </td>
    <td width="50%">
      <input type="text" name="city" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Диагноза</div>
    </td>
    <td width="50%">
      <input type="text" name="state" size="2" maxlength="2">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Лечение</div>
    </td>
    <td width="50%">
      <input type="text" name="zip" maxlength="50" >
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Мобилен телефон</div>
    </td>
    <td width="50%">
      <input type="text" name="phone" size="12" maxlength="12">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Медицинска история</div>
    </td>
    <td width="50%">
      <input type="text" name="fax" maxlength="100" >
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">E-Mail адрес</div>
    </td>
    <td width="50%">
      <input type="text" name="email" maxlength="50">
    </td>
  </tr>
</table>
<table width="300" border="1">
  <tr>
    <th colspan="2">
      <div align="center"><strong>Лечебно заведение</strong></div>
    </th>
  </tr>
  <tr>
    <td width="50%">
      <div align="right"> Име</div>
    </td>
    <td width="50%">
      <input type="text" name="shipfirst" maxlength="15">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Град</div>
    </td>
    <td width="50%">
      <input type="text" name="shipcity" maxlength="50">
    </td>
  </tr>
    <td width="50%">
      <div align="right">БУЛСТАТ</div>
    </td>
    <td width="50%">
      <input type="text" name="shipzip" maxlength="15">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Phone Number</div>
    </td>
    <td width="50%">
      <input type="text" name="shipphone" size="12" maxlength="12">
    </td>
  </tr>
</table>
<p>
  <input type="submit" name="Submit" 
    value="Продължете към следваща стъпка">
</p>
</form>

 </body>
 </html>
