<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
    <head>
        <meta content = "text/html; charset=utf-8" />
        <?php $this->load->helper('url'); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <?php echo '<script src="'.base_url().'scripts/jquery.chained.min.js"></script>'; ?>
    </head>

    <body>

<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div>
				<div>
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div>
				<div>
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div>
			<div>
				<h1>Регистрация</h1>
			</div>
			
			<?= form_open('/index/add_user') ?>
				<div>
					<label for="login">Логин</label>
					<input type="text" id="login" name="login" placeholder="Введите логин">
					<p></p>
				</div>
				<div>
					<label for="password">Пароль</label>
					<input type="password" id="password" name="password" placeholder="Введите ваш пароль">
					<p> </p>
				</div>
				<div>
					<label for="password_confirm">Повторите пароль</label>
					<input type="password" id="password_confirm" name="password_confirm" placeholder="Повторите пароль">
					<p> </p>
				</div>
				<div>
					<label for="tel">Телефон</label>
					<input type="text" id="tel" name="tel" placeholder="Введите номер телефона">
					<p> </p>
				</div>
				<div>
					<label for="country_">Страна</label>
					<select id="country" name="countryname">
						<option>--</option>
                        <? foreach ($country_city as $data) : ?>
                        <? if ($data['id_country'] !== $id) { ?>
                        <option value="<?= $data['id_country'] ?>">
                        <?= $data['country_name'] ?></option>
                        <? $id = $data['id_country']; }?>
                        <? endforeach; ?>
                    </select>
					<p> </p>
				</div>
				<div>
					<label for="city_">Город</label>
					<select id="city" name="cityname">
						<option>--</option>
                        <? foreach ($country_city as $data) : ?>
                        <option value="<?= $data['id_city'] ?>" class="<?= $data['id_country'] ?>">
                        <?= $data['city_name'] ?></option>
                        <? endforeach; ?>
                    </select>
					<p> </p>
				</div>
				<div>
					<label for="invite">Инвайт</label>
					<input type="text" id="invite" name="invite" placeholder="Введите инвайт">
					<p> </p>
				</div>
				
				<div>
					<input type="submit" value="Регистрация">
					<input type="reset" name="Reset" value="Очистить форму">
				</div>

				<div class="col-md-12">
					<p><a href="<?= base_url();?>index.php/index/get_users">Просмотреть всех пользователей</a></p>
					<p><a href="<?= base_url();?>index.php/index/get_invites">Просмотреть все инвайты</a></p>
				</div>

				<script type="text/javascript">$("#city").chained("#country");</script>
			</form>


		</div>
	</div>
</div>
    
    </body>
</html>