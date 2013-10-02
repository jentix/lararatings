<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Восстановление пароля</title>
		<style>
			a:link , a:visited {color: #0987cb;}
		</style>
	</head>
	<body>
		<table width="100%" cellspacing="0" cellpadding="0" border="0" style="font: 14px Arial, sans-serif; color: #374e5a;">
			<tr>
				<td align="center">
					<!-- wrap -->
					<table width="600" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; box-shadow: 0 2px 3px 1px #96a2af; 
					-webkit-box-shadow: 0 3px 4px 1px #96a2af; border: 1px solid #96a2af;">
					<tr><td>

					<!-- head -->
					<table width="600" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; border-bottom: 2px solid #edf0f2;">
						<tr>
							<td width="100%" height="10" colspan="5"></td>
						</tr>
						<tr>
							<td width="10"></td>
							<td width="210">
								<img src="http://rating.fryazino.net/img/logo_for_email_messages.png">
							</td>
							<td width="210"></td>
							<td width="160" style="font-size: 12px; text-align: right;">
								<p>
									<b>Информационное письмо</b><br>
									<span style="color: #83949d;">{{date("d.m.Y, G:i" , time())}}</span>
								</p>
							</td>
							<td width="10"></td>
						</tr>
					</table>
					<!-- content -->
					<table width="600" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;">
						<tr>
							<td width="45">
								<div style="margin: 0; padding: 0; line-height: 0;"><img src="http://rating.fryazino.net/img/empty.gif" border="0" width="1" height="1" style="display: block;" alt="" /></div>
							</td>
							<td width="560"> <!--style="border: 1px solid #000;">-->
								<h4>Восстановление пароля</h4>
								<p>Что-бы восстановить пароль, заполните форму, перейдя по этой ссылке:<br> {{ URL::to('password/reset', array($token)) }}.</p>	
							</td>
							<td width="45">
								<div style="margin: 0; padding: 0; line-height: 0;"><img src="http://rating.fryazino.net/img/empty.gif" border="0" width="1" height="1" style="display: block;" alt="" /></div>
							</td>
						</tr>
					</table>
					<!-- footer -->
					<table width="600" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;">
						<tr>
							<td width="100%" height="20" colspan="3"></td>
						</tr>
						<tr>
							<td width="45">
							</td>
							<td width="560" style="font-style: italic; font-size: 12px; color: #83949d; text-align: right;">
								С уважением, служба поддержки Fryazino.net
							</td>
							<td width="45">
							</td>
						</tr>
						<tr>
							<td width="100%" height="50" colspan="3"></td>
						</tr>
					</table>

					</tr></td>
					</table>
					<table width="600" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; font-size: 12px; text-align: center;">
						<tr><td width="100%" height="20"></rd></tr>
						<tr>
							<td>
								Служба технической поддержки: +7 (496) 255-40-00 &nbsp;<a href="mailto:office@fryazino.net" style="color: #0987cb;">office@fryazino.net</a> &nbsp;<a href="http://fryazino.net/support/" target="_blank" style="color: #0987cb;">www.fryazino.net/support/</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>