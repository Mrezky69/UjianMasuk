<?php
$jam_mulai_pc = explode(" ", $detil_tes->tgl_mulai);
$jam_selesai_pc = explode(" ", $detil_tes->tgl_selesai);
?>

<div class="row">
	<div class="col-sm-9">
		<div class="box box-primary">
			<form name="_form" method="post" id="_form">
				<?php
				$no = 1;
				$jawaban = array('A', 'B', 'C', 'D', 'E');
				if (!empty($data)) :
					# code...
					foreach ($data as $d) :
						echo '<input type="hidden" name="id_soal_' . $no . '" value="' . $d->id_soal . '">';
				?>
						<div class="box-body box-ujian step">
							<div style="margin-bottom: 20px;">
								<h4 class="label bg-blue" style="font-size: 15px;">Soal nomor <?= $no; ?></h4>
							</div>
							<?php
							$exmedia = explode(".", $d->media);
							$exmedia = strtolower(end($exmedia));
							if ($exmedia == 'jpg') {
								echo '<img src="' . base_url('media/' . $d->media) . '" alt="" class="img-responsive img-ujian">';
							}
							if ($exmedia == 'mp3') {
								echo '<audio src="' . base_url('media/' . $d->media) . '" class="" controls=""></audio>';
							}
							?>

							<div><?= $d->soal; ?></div>

							<?php
							$testaja = 'A';
							for ($j = 0; $j < sizeof($jawaban); $j++) {
								# jawaban
								$kecil_jawaban = strtolower($jawaban[$j]);
								$opsijwb = 'opsi_' . $kecil_jawaban;
								$opsi = $d->$opsijwb;
								if ($jawaban[$j] == $d->jawaban) { ?>
									<div class="radio">
										<?= $testaja; ?>.<label><input checked type="radio" id="opsii_<?= $jawaban[$j] . '_' . $d->id_soal; ?>" name="opsi_<?= $no; ?>" value="<?= $jawaban[$j]; ?>">
											<span><?= $opsi; ?></span></label>
									</div>
								<?php } else { ?>
									<div class="radio">
										<?= $testaja; ?>.<label><input type="radio" id="opsi_<?= $jawaban[$j] . '_' . $d->id_soal; ?>" name="opsi_<?= $no; ?>" value="<?= $jawaban[$j]; ?>">
											<span><?= $opsi; ?></span></label>
									</div>
							<?php
									$testaja++;
								}
							}
							?>
						</div>
				<?php
						$no++;
					endforeach;
				endif;
				?>
				<div class="box-footer">
					<div class="col-sm-4 bf-kanan">
						<a class="action btn back btn-warning"><i class="fa fa-chevron-left"> SEBELUMNYA </i></a>
					</div>
					<!-- <div class="col-sm-4 bf-kanan">
						<a class="action btn simpan btn-success"> Save</a>
					</div> -->
					<div class="col-sm-4 bf-kanan">
						<a class="action btn next btn-warning">SELANJUTNYA <i class="fa fa-chevron-right"></i></a>
					</div>
					<br>
					<div class="col-sm-4 bf-kanan">
						<a class="action submit btn btn-success"><i class="fa fa-check"></i> SELESAI</a>
					</div>
					<br>
					<?php
					// $no = 1;
					// if (!empty($data)) :
					// 	foreach ($data as $nomor) :
					// echo '<input type="hidden" name="id_soal_' . $no . '" value="' . $nomor->id_soal . '">';
					// echo '<button type="button" name="id_soal_' . $no . '" value="' . $d->id_soal . '"> </button>'
					?>
					<?php
					// for ($i=0; $i <= $no; $i++) { 
					// 	# code...						
					// }
					// foreach ($jdwlujian as $ju) { 
					?>
					<!-- <a href="" class="label bg-blue" style="font-size: 15px;"> 12 </a> -->
					<?php  ?>
					<?php
					// $no++;
					// endforeach;
					// endif;
					?>
					<br>
				</div>
				<input type="hidden" name="jml_soal" value="<?= $no; ?>">
			</form>
		</div>
	</div>
	<!-- <div class="col-sm-3">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h4 class="box-title">Petunjuk Ujian !!</h4>
			</div>
			<div class="box-body">
				<label>1. Login menggunakan nomor registrasi sebelumnya<br>
					2. Ganti password diwajibkan untuk alasan keamanan<br>
					3. Setelah itu peserta bisa mengikuti ujian yang telah tersedia<br>
					4. Harap sediakan kertas untuk menghitung jawaban dari beberapa Soal<br>
					5. Soal telah diacak jadi kerjakan yang dirasa mudah<br>
					6. Waktu ujian sudah ditetapkan dan jika waktu habis peserta tidak akan bisa mengisi ujian kembali
				</label>
			</div>
			<div class="box-footer">
			</div>
		</div>
	</div> -->
	<div class="col-sm-3">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h4 class="box-title">Sisa Waktu</h4>
			</div>
			<div class="box-body">
				<div class="waktu bg-blue" id="clock"></div>
			</div>
			<div class="box-footer">
				<a class="btn btn-selesai btn-block btn-danger">SELESAI UJIAN</a>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<!-- <marquee> -->
				<h4 class="box-title"> List jawaban </h4>
				<!-- </marquee> -->
			</div>
			<div class="box-body">
				<!-- <div class="waktu bg-blue" id="clock"></div> -->
				<!-- <table id="tabelpeserta" class="table table-bordered table-striped table-hover" id="tabelpeserta">
					<thead>
						<tr>
							<th>NO PESERTA</th>
							<php
							$no = 1;
							if (!empty($data)) :
								foreach ($data as $nomor) :
									//  echo '<button type="button" name="id_soal_' . $no . '" value="' . $d->id_soal . '"> </button>'
									echo '<input type="hidden" name="id_soal_' . $no . '" value="' . $nomor->id_soal . '">';
							?>
									<th><= $nomor->id_soal ?></th>
							<php
									$no++;
								endforeach;
							endif;
							?>
						</tr>
					</thead>
					<thead>
						<th>ID SOAL</th>
					</thead>
				</table> -->
				<?php
				// $no = 1;
				// if (!empty($data)) :
				// 	foreach ($data as $nomor) :
				// 		echo '<type="hidden" name="id_soal_' . $no . '" value="' . $nomor->id_soal . '">';

				// echo '<input type="hidden" name="id_soal_' . $no . '" value="' . $nomor->id_soal . '">';
				?>
				<!-- <button <= $color; ?>><= $no; ?></button> -->
				<?php
				// 		$no++;
				// 	endforeach;
				// endif;
				?>

				<?php
				$no = 1;
				foreach ($jdwlujian as $vic) {
					foreach ($user as $u) {
						$tampil_aja = explode(',', $u->list_jawaban);
						// $nyoba = explode(',', $u->list_soal);
						foreach ($tampil_aja as $key => $aja) {
							$splitaja = substr($aja, 2, 2);
							$hasilsplit = substr($splitaja, 1, 1);

							// var_dump($hasilsplit);
							// print_r($hasilsplit);
							// echo "$no.$hasilsplit</br>";
							// echo "$aja</br>";
							// for ($j = 0; $j < sizeof($jawaban); $j++) {
							if ($hasilsplit != null) {
								# code...
								// echo "<a href='" . base_url("$vic->id_ujian") . "'>";
								echo "<button type=\"button\" class=\"btn btn-success btn-sm\">" . $no . ". " . $hasilsplit . "</button>";
								echo "</a>";
							} else {
								// echo "<a href='" . base_url("$vic->id_ujian") . "'>";
								echo "<button type=\"button\" class=\"btn btn-danger btn-sm\">" . $no . ". " . $hasilsplit . "</button>";
								echo "</a>";
							}
							$no++;
							// }
						}
						// foreach ($nyoba as $b) {
						// 	// echo "$b</br>";
						// }
					}
				}
				?>
			</div>
			<div class="box-footer">
				<div class="col-sm-5">
					<a class="action btn simpan btn-success">
						Reload jawaban
					</a>
				</div>
			</div>
		</div>
	</div>

</div>


<script>
	$(document).ready(function() {
		var jam_selesai = '<?= $detil_tes->tgl_selesai; ?>';

		$('div#clock').countdown(jam_selesai)
			.on('update.countdown', function(event) {
				$(this).html(event.strftime('%H:%M:%S'));
			})
			.on('finish.countdown', function(event) {
				alert('Waktu telah selesai !');
				var f_asal = $('#_form');
				var form = getFormData(f_asal);
				simpan_akhir(<?= $detil_tes->id_tes; ?>);
				window.location.assign("<?= base_url(); ?>selesai/<?= $detil_tes->id_tes; ?>");

				return false;
			});

		var current = 1;

		widget = $('.step');
		btnback = $('.back');
		btnnext = $('.next');
		dua = $('.dua');
		btnsimpan = $('.simpan');
		btnsubmit = $('.submit');
		btnselesai = $('.btn-selesai');

		//Init button and UI
		widget.not(':eq(0)').hide();
		hideButtons(current);

		//aksi klik simpan
		btnsimpan.click(function() {
			simpan(<?= $detil_tes->id_tes; ?>);
			location.reload();
		})

		//Next button click action
		btnnext.click(function() {
			if (current < widget.length) {
				widget.show();
				widget.not(':eq(' + (current++) + ')').hide();
				console.log(current);
				simpan(<?= $detil_tes->id_tes; ?>);
			}
			hideButtons(current);
		})

		//nomor button click action
		dua.click(function() {
			if (current > 2) {
				current = current - 4;
				if (current < widget.length) {
					widget.show();
					widget.not(':eq(' + (current++) + ')').hide();
				}
				hideButtons(current);
			}
			hideButtons(current);
		})

		//Back button click action
		btnback.click(function() {
			if (current > 1) {
				current = current - 2;
				if (current < widget.length) {
					widget.show();
					widget.not(':eq(' + (current++) + ')').hide();
				}
				hideButtons(current);
			}
			hideButtons(current);
		})

		btnsubmit.click(function() {
			simpan_akhir(<?= $detil_tes->id_tes; ?>);
		});

		btnselesai.click(function() {
			simpan_akhir(<?= $detil_tes->id_tes; ?>);
		})

	});



	simpan = function(id) {
		var f_asal = $('#_form');
		var form = getFormData(f_asal);

		$.ajax({
			type: 'POST',
			url: base_url + 'user/ujian_simpan/' + id,
			data: JSON.stringify(form),
			dataType: 'json',
			contentType: 'application/json; charset=utf-8'
		}).done(function(response) {});
		return false;
	}

	simpan_akhir = function(id) {
		if (confirm('Anda yakin akan mengakhiri ujian ini ?')) {
			var f_asal = $('#_form');
			var form = getFormData(f_asal);

			$.ajax({
				type: 'POST',
				url: base_url + 'user/ujian_akhir/' + id,
				data: JSON.stringify(form),
				dataType: 'json',
				contentType: 'application/json; charset=utf-8'
			}).done(function(response) {
				if (response.status == 'ok') {
					window.location.assign("<?= base_url(); ?>selesai/<?= $detil_tes->id_tes; ?>");
				}
			});
			// return false;
			return ($.ajax({
				type: 'POST',
				url: base_url + 'user/ujian_akhir/' + id,
				data: JSON.stringify(form),
				dataType: 'json',
				contentType: 'application/json; charset=utf-8'
			}).done(function(response) {
				if (response.status == 'ok') {
					window.location.assign("<?= base_url(); ?>selesai/<?= $detil_tes->id_tes; ?>");
				}
			}));
		}
	}

	//Hide buttons according to the curent step
	hideButtons = function(current) {
		var limit = parseInt(widget.length);
		$('.action').hide();

		if (current < limit) dua.show();
		if (current < limit) btnnext.show();
		if (current > 1) btnback.show();
		if (current == limit) {
			btnnext.hide();
			btnsubmit.show();
		}
		btnsimpan.show();
	}
</script>