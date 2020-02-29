<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?= base_url('') ?>"><img src="<?= base_url('assets/img/logo.png') ?>" class="img img-fluid w-50"></a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="index.html">Ab</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="nav-item <?php echo $this->uri->segment(1) == 'dashboard' || ' ' ? 'active' : ''; ?>">
				<a href="<?= base_url('dashboard/') ?>" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a
				>
			</li>
			<li class="menu-header">Pengaturan</li>
			<li class="nav-item <?php echo $this->uri->segment(1) == 'pengaturan_jadwal' ? 'active' : ''; ?>">
				<a href="<?= base_url('pengaturan_jadwal/') ?>" class="nav-link "><i class="fas fa-cog"></i> <span>Pengaturan Jadwal</span></a
				>
			</li>
			<li class="nav-item <?php echo $this->uri->segment(1) == 'audio' ? 'active' : ''; ?>">
				<a href="<?= base_url('audio/') ?>" class="nav-link"><i class="fas fa-music"></i> <span>Unggah Audio</span></a
				>
			</li>
			
			<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
				<a
					href="http://localhost/abell/tentang"
					class="btn btn-primary btn-lg btn-block btn-icon-split"
				>
					<i class="fas fa-rocket"></i> Tentang Kami
				</a>
			</div>
		</ul>
	</aside>
</div>
