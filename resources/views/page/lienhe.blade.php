@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên hệ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4268.488297046314!2d105.80602321493242!3d21.018828586003764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab67198c5b7d%3A0x79ceaa3ae1220e0b!2zOTcgTmd1eeG7hW4gQ2jDrSBUaGFuaCwgTMOhbmcgSOG6oSwgxJDhu5FuZyDEkGEsIEjDoCBO4buZaQ!5e1!3m2!1svi!2s!4v1615526443871!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Form liên hệ</h2>
					<div class="space20">&nbsp;</div>
					<p>Vui lòng điền vào form bên dưới.</p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Họ và tên">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Email">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Địa chỉ">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Nội dung"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi tin nhắn <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						97 Nguyễn Chí Thanh,<br>
						Đống Đa <br>
						Hà Nội
					</p>
					<div class="space20">&nbsp;</div>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection