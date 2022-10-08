<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="<?= base_url(''); ?>assets/login/img/login/logotechnopark.png" height="100">
        </div>
        <ul class="sidebar-menu">
            <br>
            <!-- query -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                              FROM `user_menu` 
                              JOIN `user_access_menu` ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                             WHERE `user_access_menu`.`role_id` = $role_id
                             ORDER BY `user_access_menu`.`menu_id` ASC
                             ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <!-- Loop -->
            <?php foreach ($menu as $m) : ?>
                <li class="menu-header">
                    <?= $m['menu']; ?>
                </li>

                <!-- sub menu -->
                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                                  FROM `user_sub_menu`
                                  JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                 WHERE `user_sub_menu`.`menu_id` = $menuId
                                 ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>
                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?php echo base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span></a>
                        </li>
                    <?php endforeach; ?>

                <?php endforeach; ?>
</div>
<!-- Main Content -->
<div class="main-content">
    <section class="section">