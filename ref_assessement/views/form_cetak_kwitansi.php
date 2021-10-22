<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-dot-matrix/font.css">
	<style type="text/css" media="print">
		@page {

			size: 114.3mm 139.7mm;
			margin-top: 0 !important;
			margin-left: 20px !important;
			margin-bottom: 0 !important;
		}

		.some_element {
			page-break-after: always;
		}

		.logo {
			width: 30%;
		}

		html,
		body {
			display: block;

		}
	</style>

</head>

<body>
	<div class='to-print' style="font-family: Calibri; font-weight:bold;">
		<table width="100%" style="margin-bottom: -25px;">
			<tr>
				<td style="text-align: center;">
					<img width="50px" height="50px" src="<?php echo base_url() ?>/assets/images/ugm_logo.png">
				</td>
			</tr>
			<tr>

				<td style="text-align: center;">
					<p style="font-size: 11pt; margin-bottom:-10px">UNIVERSITAS GADJAH MADA <p>
							<p style="font-size: 11pt; margin-bottom:-10px">GADJAH MADA MEDICAL CENTER <p>
									<p style="font-size: 11pt; margin-bottom:-5px">Sekip Blok L3, Sinduadi, Mlati, Sleman. Telp.+62 274 551412, Yogyakarta 55281 <p>
				</td>
			</tr>
		</table>
		<hr style="width: 99%; text-align: center; border: 1px solid black;margin-bottom: 0px">
		<table class="text-left" cellpadding="10" style="margin-bottom: -15px;">
			<tr>
				<td style="font-size:11pt;">No. Kwitansi</td>
				<td style="font-size:11pt;">:</td>
				<td style="font-size:11pt;"></td>
			</tr>
            <tr>
                <td style="font-size:11pt;">Jenis Program</td>
				<td style="font-size:11pt;">:</td>
				<td style="font-size:11pt;"></td> 
            </tr>
			<tr>
				<td style="font-size:11pt;">Tgl. Kwitansi</td>
				<td style="font-size:11pt;">:</td>
				<td style="font-size:11pt;"></td>
			</tr>
			<tr>
				<td style="font-size:11pt;">Nama </td>
				<td style="font-size:11pt;">:</td>
				<td style="font-size:11pt;"></td>
				
			</tr>
		</table>
		<hr style="width: 99%; text-align: center; border: 1px solid black;margin-bottom: 5px;">

        <table class="text-left" width="100%" cellpadding="10" style="margin-bottom: -15px;">
			<tr>
				<td style="width: 70%;font-size:11pt;padding-bottom: 2px;">Biaya Pendaftaran</td>
				<td style="width: 30%;font-size:11pt;padding-bottom: 2px;" class="text-right">
					Rp. 
				</td>
			</tr>
            <tr>
				<td style="width: 70%;font-size:11pt;padding-bottom: 2px;">Biaya Beban</td>
				<td style="width: 30%;font-size:11pt;padding-bottom: 2px;" class="text-right">
					Rp. 
				</td>
			</tr>
            <tr>
				<td style="width: 70%;font-size:11pt;padding-bottom: 2px;">Biaya Repetisi</td>
				<td style="width: 30%;font-size:11pt;padding-bottom: 2px;" class="text-right">
					Rp. 
				</td>
			</tr>
            <tr>
				<td style="width: 70%;font-size:11pt;padding-bottom: 2px;">Biaya Set</td>
				<td style="width: 30%;font-size:11pt;padding-bottom: 2px;" class="text-right">
					Rp. 
				</td>
			</tr>
            <tr>
				<td style="width: 70%;font-size:11pt;padding-bottom: 2px;">Biaya Frekuensi (x/week)</td>
				<td style="width: 30%;font-size:11pt;padding-bottom: 2px;" class="text-right">
					Rp. 
				</td>
			</tr>
            <tr>
				<td style="width: 70%;font-size:11pt;padding-bottom: 2px;">Biaya Recovery antar set</td>
				<td style="width: 30%;font-size:11pt;padding-bottom: 2px;" class="text-right">
					Rp. 
				</td>
			</tr>
            <tr>
				<td style="width: 70%;font-size:11pt;padding-bottom: 2px;">Biaya Intensitas</td>
				<td style="width: 30%;font-size:11pt;padding-bottom: 2px;" class="text-right">
					Rp. 
				</td>
			</tr>
            <tr>
				<td style="width: 70%;font-size:11pt;padding-bottom: 2px;">Biaya Hr Max</td>
				<td style="width: 30%;font-size:11pt;padding-bottom: 2px;" class="text-right">
					Rp. 
				</td>
			</tr>
        </table>
        <hr style="width: 99%; text-align: center; border: 1px solid black;margin-bottom: 5px;">
        <table class="text-left" width="100%" cellpadding="10" style="margin-bottom: -15px;">
			<tr>
				<td style="text-align: left;font-size:11pt;">Paraf </td>

				<td style="text-align: right; margin-top: 5px; padding-right: 11pt;font-size:11pt;">Total Harga </td>

				<td style="font-size:11pt;text-align: right;">Rp. </td>
			</tr>
            <tr>
            <td rowspan="2"></td>
				<td style="text-align: right; margin-top: 5px; padding-right: 11pt;font-size:11pt;">Pembulatan Harga </td>

				<td style="font-size:11pt;text-align: right;">Rp. </td>
			</tr>
            <tr>
				<td style="text-align: right; margin-top: 5px; padding-right: 11pt;font-size:11pt;">Total Pembayaran </td>

				<td style="font-size:11pt;text-align: right;">Rp. </td>
			</tr>
        </table>
        <div align="center" style="margin-top: 5%;font-size:11pt;margin-top: 15px;">
			<p style="font-size: 11pt;margin-bottom: -5px;">
				***Terima Kasih***
			</p>
			<p style="font-size: 11pt;margin-bottom: -5px;">Semoga sehat selalu</p>
		</div>
		<footer></footer>
	</div>

</body>

</html>