<?php print $doctype; ?>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf->version . $rdf->namespaces; ?>>
    <head<?php print $rdf->profile; ?>>
        <?php print $head; ?>
        <title><?php print $head_title; ?></title>
        <?php print $styles; ?>

        <?php if (theme_get_setting('responsive_respond','simplecorp')): global $base_path; global $base_root; ?>
        <!--[if lt IE 9]>
        <script src="<?php print $base_root . $base_path . path_to_theme() ?>/js/respond.min.js"></script>
        <![endif]-->
        <?php endif; ?>

        <?php print $scripts; ?>
    </head>
    <body class="<?php print $classes; ?> custom-background" <?php print $attributes;?>>
        <div id="skip-link">
          <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
        </div>
        <?php print $page_top; ?>
        <?php print $page; ?>
        <?php print $page_bottom; ?>
    </body>
</html>
