<!DOCTYPE html>
<html>
<head>
	<meta content = "text/html; charset=utf-8" />
	<?php $this->load->helper('url'); ?>
	<title>Все пользователи</title>
</head>

<body>
	<table border="2">
		<tr>
			<th> Логин </th>
            <th> Пароль </th>
			<th> Телефон </th>
			<th> Город </th>
			<th> Инвайт </th>
		</tr>
	
		<?php foreach ($users as $user): ?>
		<tr>
			<td align="left">
                <p><?php echo $user['login']; ?></p>     
            </td>

            <td align="left">
        		<p><?php echo $user['password']; ?></p>
        	</td>

        	<td align="left">
        		<p><?php echo $user['phone']; ?></p>
        	</td>

        	<td align="left">
        		<p><?php echo $user['city_name']; ?></p>
        	</td>

        	<td align="left">
        		<p><?php echo $user['invite']; ?></p>
        	</td>
        </tr>
        <?php endforeach; ?>
	</table>

	<p><a href="<?= base_url();?>index.php">Вернуться к регистрации</a></p>
</body>

</html>