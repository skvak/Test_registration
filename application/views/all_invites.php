<!DOCTYPE html>
<html>
<head>
	<meta content = "text/html; charset=utf-8" />
    <?php $this->load->helper('url'); ?>
	<title>Все инвайты</title>
</head>

<body>
	<table border="2">
		<tr>
			<th> Инвайт </th>
            <th> Статус </th>
			<th> Дата </th>
		</tr>
	
		<?php foreach ($invites as $inv): ?>
		<tr>
			<td align="left">
                <p><?php echo $inv['invite']; ?></p>     
            </td>

            <td align="left">
        		<p><?php echo $inv['status']; ?></p>
        	</td>

        	<td align="left">
        		<p><?php echo $inv['date_status']; ?></p>
        	</td>
        </tr>
        <?php endforeach; ?>
	</table>

    <p><a href="<?= base_url();?>index.php">Вернуться к регистрации</a></p>
</body>

</html>