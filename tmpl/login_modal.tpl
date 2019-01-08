<div id="login">
	<div class="window">
		<h4 class="title float_l">Вход в личный кабинет</h4>
		<div class="float_r closeWindow" onclick="closeWindow('login')">X</div>
		<div class="clear"></div>
		<hr />
		<p class="message" id="auth_message"></p>
		<form class="form-modal" name="auth" method="post" action="/">
			<table>
				<tr>
					<td>
						<label>Логин:</label>
					</td>
					<td>
						<input type="text" name="login" id="userlogin" placeholder="mylogin"/>
					</td>
				</tr>
				<tr>
					<td>
						<label>Пароль:</label>
					</td>
					<td>
						<input type="password" name="password" id="userpassword" placeholder="123456"/>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="button login">
								<a class="link_button" onclick="authuser()" href="#auth">Войти</a>
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>