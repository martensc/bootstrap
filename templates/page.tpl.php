<header class="header container" role="banner" class="clearfix">
  <div class="row">
    <?php if ($site_name || $site_slogan): ?>
      <div class="header-inner span12">

        <?php if (!empty($secondary_nav)): ?>
          <nav role="account-navigation" class="pull-right">
            <?php if (!empty($secondary_nav)): ?>
              <?php print render($secondary_nav); ?>
            <?php endif; ?>
          </nav>
        <?php endif; ?>

        <?php if ($site_name): ?>
          <h1 id="site-name" class="pull-left">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a> 
            <?php if ($site_slogan): ?>
              <small id="site-slogan"><?php print $site_slogan; ?></small>
            <?php endif; ?>
          </h1>
        <?php endif; ?>

        <?php if (!empty($primary_nav) || !empty($page['navigation'])): ?>
          <div class="navbar">
            <div class="navbar-inner">
              <nav role="navigation">
                <?php if (!empty($primary_nav)): ?>
                  <?php print render($primary_nav); ?>
                <?php endif; ?>
                <?php if (!empty($page['navigation'])): ?>
                  <?php print render($page['navigation']); ?>
                <?php endif; ?>
              </nav>
            </div>
          </div>
        <?php endif; ?>

      </div>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </div>
</header>

<div class="main-container container">

  <div class="row">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="span3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>  

    <section class="<?php print _bootstrap_content_span($columns); ?>">  
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <div class="well"><?php print render($page['help']); ?></div>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="span3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
  <footer class="footer container">
    <?php print render($page['footer']); ?>
    <div class="credits">&copy; <?php echo date('Y');?> Bootstrap</div>
  </footer>
</div>
