		<div class="row">

			<?php
			if ($ar['password'] == $this->session->no_register) : ?>
				<div class="col-sm-12">
					<div class="alert alert-danger">
						<h4><i class="icon fa fa-warning"></i> Selamat Datang</h4>
						<ul>
							<li>
								<h5>Ubah password default anda dengan yang baru !</h5>
							</li>
							<li>
								<h5>Silahkan <a href="<?= base_url('setting'); ?>">klik disini !</a></h5>
							</li>
						</ul>
					</div>
				</div>
			<?php else : ?>

				<div class="col-sm-3">
					<div class="alert bg-green">
						<h4>Jurusan <i class="pull-right fa fa-building-o"></i></h4>
						<span class="d-block"><?= $this->session->jurusan; ?></span>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="alert bg-blue">
						<h4>No Register <i class="pull-right fa fa-graduation-cap"></i></h4>
						<span class="d-block"><?= $this->session->no_register; ?></span>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="alert bg-yellow">
						<h4>Tanggal <i class="pull-right fa fa-calendar"></i></h4>
						<span class="d-block"><?= strftime('%A, %d %B %Y') ?></span>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="alert bg-red">
						<h4>Jam <i class="pull-right fa fa-clock-o"></i></h4>
						<span class="d-block"> <span class="live-clock"><?= date('H:i:s') ?></span></span>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="box box-solid">
						<div class="box-header bg-green">
							<h4 class="box-title">Petunjuk Ujian !!</h4>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<table class="table table-bordered table-striped table-hover">
								<label>1. Login menggunakan nomor registrasi sebelumnya<br>
									2. Ganti password diwajibkan untuk alasan keamanan<br>
									3. Setelah itu peserta bisa mengikuti ujian yang telah tersedia<br>
									4. Harap sediakan kertas untuk menghitung jawaban dari beberapa Soal<br>
									5. Soal telah diacak jadi kerjakan yang dirasa mudah<br>
									6. Waktu ujian sudah ditetapkan , jika waktu habis maka peserta tidak akan bisa mengisi ujian kembali
								</label>
							</table>
						</div>
					</div>
				</div>

				<div class="col-sm-12">
					<div class="box box-solid">
						<div class="box-header bg-blue">
							<h3 class="box-title">Jadwal Ujian</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<?php if (count($jdwlujian) > 0) { ?>
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nama Ujian</th>
											<th>Kegiatan</th>
											<th>Waktu</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($jdwlujian as $ju) {
											if ($ju->sudah_ikut < 1) { ?>
												<tr>
													<td><?= $no++; ?>.</td>
													<td><?= $ju->nama_ujian; ?></td>
													<td><?= $ju->kegiatan; ?></td>
													<td><?= $ju->waktu; ?> Menit</td>
													<td><button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modalUjian<?= $ju->id_ujian; ?>"><i class="fa fa-send"></i> Ikuti Ujian</button></td>
												</tr>
												<!-- Modal ujian -->
												<div class="modal fade" id="modalUjian<?= $ju->id_ujian; ?>">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title"><?= $ju->nama_ujian; ?></h4>
															</div>
															<div class="modal-body">
																<label>
																	<b>Petunjuk Ujian !!</b>
																</label>
																<br>
																<label>
																	1. Login menggunakan nomor registrasi sebelumnya<br>
																	2. Ganti password diwajibkan untuk alasan keamanan<br>
																	3. Setelah itu peserta bisa mengikuti ujian yang telah tersedia<br>
																	4. Harap sediakan kertas untuk menghitung jawaban dari beberapa Soal<br>
																	5. Soal telah diacak jadi kerjakan yang dirasa mudah<br>
																	6. Waktu ujian sudah ditetapkan , jika waktu habis maka peserta tidak akan bisa mengisi ujian kembali
																</label>
																<br>
																<h4>Anda akan mengerjakan ujian ini ?</h4>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
																<a href="<?= base_url($ju->id_ujian); ?>" class="btn btn-success">Mulai Mengerjakan</a>
															</div>
														</div>
													</div>
												</div>
										<?php }
										} ?>
									</tbody>
								</table>
							<?php } else { ?>
								<div>
									<h1 class="text-center text-red"><i class="fa fa-warning"></i></h1>
									<h4 class="text-center">Tidak Ada Ujian !</h4>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="col-sm-12">
					<div class="box box-solid">
						<div class="box-header bg-red">
							<h4 class="box-title">Riwayat Ujian</h4>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<?php if (count($jdwlujian) > 0) { ?>
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nama Ujian</th>
											<th>Kegiatan</th>
											<th>Waktu</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($jdwlujian as $ju) {
											if ($ju->sudah_ikut > 0) { ?>
												<tr>
													<td><?= $no++; ?>.</td>
													<td><?= $ju->nama_ujian; ?></td>
													<td><?= $ju->kegiatan; ?></td>
													<td><?= $ju->waktu; ?> Menit</td>
													<?php if ($ju->status == 'Y') { ?>
														<td><a href="<?= base_url($ju->id_ujian); ?>" class="btn btn-xs btn-success"><i class="fa fa-spin fa-spinner"></i> Sedang Ujian</a></td>
													<?php }
													if ($ju->status == 'N') { ?>
														<td><a href="<?= base_url($ju->id_ujian); ?>" class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Sudah Ujian</a></td>
													<?php } ?>
												</tr>
										<?php
											}
										} ?>
									</tbody>
								</table>
							<?php } else { ?>
								<div>
									<h1 class="text-center text-red"><i class="fa fa-warning"></i></h1>
									<h4 class="text-center">Tidak Ada Ujian !</h4>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>

			<?php endif; ?>

		</div>