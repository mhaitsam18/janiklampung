<div id="sidebar" class="active">
	<div class="sidebar-wrapper active">
		<div class="sidebar-header">
			<div class="d-flex justify-content-between">
				<div class="logo">
					<a href="<?= site_url() ?>"><img src="<?= base_url() ?>assets/images/logo/janiklampung.png" alt="Logo" style="width: 80px; height: 80px;" srcset=""></a>
				</div>
				<div class="toggler">
					<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
				</div>
			</div>
		</div>
		<div class="sidebar-menu">
			<ul class="menu">
				<?php
				$role_id = $this->session->userdata('role_id');
				$queryMenu = "SELECT um.id, menu FROM user_menu AS um JOIN user_access_menu AS uam ON um.id = uam.menu_id WHERE uam.role_id = $role_id AND active = 1 ORDER BY uam.menu_id ASC";
				$menu = $this->db->query($queryMenu)->result();

				foreach ($menu as $m): ?>
					<li class="sidebar-title"><?= $m->menu ?></li>
					<?php
					$queryMenu = "SELECT * FROM user_sub_menu AS usm JOIN user_menu AS um ON usm.menu_id = um.id WHERE usm.menu_id = $m->id AND usm.is_active = 1";
					$subMenu = $this->db->query($queryMenu)->result();
					foreach ($subMenu as $sm): ?>
						<li class="sidebar-item <?= ($sm->title == $title) ? 'active' : '' ?> ">
							<a href="<?= base_url($sm->url) ?>" class='sidebar-link'>
								<i class="<?= $sm->icon ?>"></i>
								<span><?= $sm->title ?></span>
							</a>
						</li>
					<?php 
					endforeach;
				endforeach; ?>
				<li class="sidebar-item">
					<a href="<?= base_url('auth/logout') ?>" class='sidebar-link'>
						<i class="bi bi-box-arrow-right"></i>
						<span>Log Out</span>
					</a>
				</li>
				<!-- <li class="sidebar-item  has-sub">
					<a href="#" class='sidebar-link'>
						<i class="bi bi-stack"></i>
						<span>Components</span>
					</a>
					<ul class="submenu ">
						<li class="submenu-item ">
							<a href="component-alert.html">Alert</a>
						</li>
					</ul>
				</li> -->
			</ul>
		</div>
		<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
	</div>
</div>