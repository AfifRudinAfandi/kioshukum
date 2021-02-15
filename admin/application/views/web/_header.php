<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/static/css/home.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/static/css/slider.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/static/css/main.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/static/css/responsive.css" rel="stylesheet" />

    <title>Kioshukum</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid ctf">
            <a class="navbar-brand" href="#">Law.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    <?php $menu = $this->db->get_where('tbl_menu', array('is_parent' => 0));
                    foreach ($menu->result() as $m) {
                        $submenu = $this->db->get_where('tbl_menu',array('is_parent'=>$m->menu_id));
                        if($submenu->num_rows()>0){ ?>
                           
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"aria-expanded="false">
                                <?=strtoupper($m->menu_title)?>
                              </a>

                              <div class="dropdown-menu dropdown-multicol" aria-labelledby="navbarDropdown" >
                                <div class="dropdown-row">
                            
                                <?php foreach ($submenu->result() as $s){ ?>

                                <div class="item-sub-menu">
                                    <a href="<?=$s->menu_link?>" class="wrapper-menu dropdown-item">
                                      <img  class="icon-sub-menu" src="<?=$s->menu_icon?>"/>
                                      <div class="wrapper-sub-name ms-2">
                                        <p class="sub-title"><?=$s->menu_title?></p>
                                        <p class="sub-description">
                                          <?=$s->menu_description?>
                                        </p>
                                      </div>
                                    </a>
                                </div>

                                <?php } ?>
                            
                                </div>
                              </div>
                            </li>

                            <?php
                        } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?=$m->menu_link?>"><?=strtoupper($m->menu_title)?></a>
                            </li>
                        <?php }
                    } ?>
                       
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-nav-outline">Login</button>
                    <button type="button" class="btn btn-sm btn-nav-solid ms-2">Register</button>
                </div>
            </div>
        </div>
    </nav>
    <main class="main-wrapper">