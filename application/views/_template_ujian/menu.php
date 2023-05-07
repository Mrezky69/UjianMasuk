		<nav class="navbar navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<a href="<?= base_url() ?>" class="navbar-brand"><i class="fa fa-laptop"></i> <b>CBT</b> STT-Payakumbuh</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
					<ul class="nav navbar-nav">
						<!-- <li><a>?= $this->session->no_register; ?></a></li> -->
					</ul>
				</div>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<!-- ?= $this->session->nama ?> -->
								Info Peserta
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<!-- <li><a href="?= base_url('logout') ?>">Logout</a></li> -->
								<li>No.Pendaftaran :<a>
										<center><?= $this->session->no_register; ?></center>
									</a></li>
								<li>Nama :<a>
										<center><?= $this->session->nama; ?></center>
									</a></li>
								<li>Jurusan :<a>
										<center><?= $this->session->jurusan; ?></center>
									</a></li>

							</ul>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>