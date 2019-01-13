<div id="login">
	<div class="window">
		<div class="row mb-1">
			<div class="col-10">
				<h4 class="h5">Вход в ЛК</h4>
			</div>
			<div class="col-2 text-right pr-0">
				<div class="pointer" onclick="closeWindow('login')">X</div>
			</div>
		</div>
		<hr />
		<p class="message p-1 text-center text-red" id="auth_message"></p>
		<form class="form-modal" name="auth" method="post" action="/">
			<table>
				<tr>
					<td>
						<label>Логин:</label>
					</td>
					<td>
						<input type="text" name="login" id="userlogin" placeholder="логин..."/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Пароль:</label>
					</td>
					<td>
						<input type="password" name="password" id="userpassword" placeholder="пароль..."/>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<select class="mt-3 mb-1 p-1" id="AuthType">
							<option>Пользователь</option>
							<option>Модератор</option>
							<option>Администратор</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="col-12 bg-grey-dark shadow p-0" onclick="authuser()">
							<h2 class="pointer h6 text-white pt-2 pb-2 bg-dark pt-2 mt-3 pb-2 text-center">Войти</h2>
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>