<!DOCTYPE html>
<html lang="en">
  <head>
	  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php wp_title(); ?></title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />
    <?php wp_head(); ?>

  </head>
  <body class="<?php echo $post->post_name;?>">
    <img
      src="<?php echo get_template_directory_uri()?>/assets/images/float-bg.svg"
      class="img-fluid floating-bg"
      alt=""
    />
    <header>
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand" href="/"
              ><img src="<?php echo get_template_directory_uri()?>/assets/images/logo.jpg" class="img-fluid"
            /></a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div
              class="collapse navbar-collapse justify-content-end"
              id="navbarNav"
            >
                <ul class="navbar-nav">
                    <?php
                    // Get the current URL
                    $current_url = home_url(add_query_arg(array(),$wp->request));

                    foreach(wp_get_menu_array('Main') as $menu) {
                        $menu_class = preg_replace('/\W+/','',strtolower(strip_tags($menu['title'])));

                        // Check if the current URL matches the menu URL
                        $is_active = (rtrim($current_url, '/') === rtrim($menu['url'], '/')) ? 'active' : '';

                        if($menu['children']) {
                            ?>
                            <li class="nav-item dropdown <?php echo $is_active; ?>">
                                <a
                                        class="nav-link dropdown-toggle <?php echo $menu_class; ?> <?php echo $is_active; ?>"
                                        href="<?php echo $menu['url']; ?>"
                                        role="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                >
                                    <?php echo $menu['title']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <div class="menu-wrapper">
                                        <?php foreach($menu['children'] as $child) {
                                            // Check if the current URL matches the child URL
                                            $is_child_active = (rtrim($current_url, '/') === rtrim($child['url'], '/')) ? 'active' : '';
                                            ?>
                                            <li>
                                                <a class="dropdown-item <?php echo $menu_class; ?> <?php echo $is_child_active; ?>" href="<?php echo $child['url']; ?>">
                                                    <?php echo $child['title']; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </div>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="nav-item <?php echo $is_active; ?>">
                                <a class="nav-link <?php echo $menu_class; ?> <?php echo $is_active; ?>" aria-current="page" href="<?php echo $menu['url']; ?>">
                                    <?php echo $menu['title']; ?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>