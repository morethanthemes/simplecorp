<article class="<?php print $classes; ?> comment clearfix"<?php print $attributes; ?>>
    
    <header class="comment-author vcard">

        <?php print $picture ?>

        <?php if ($new): ?>
        <span class="new"><?php print $new ?></span>
        <?php endif; ?>
        
        <div class="authormeta">
            <?php print render($title_prefix); ?>
            <h3 class="comment-author"<?php print $title_attributes; ?>><cite><?php print $author ?></cite></h3>
            <?php print render($title_suffix); ?>
            <span class="datetime">
                <div class="submitted">
                <?php print $permalink; ?>,
                <?php print $submitted_month_c; ?>
                <?php print $submitted_day_c; ?>,
                <?php print $submitted_year_c; ?>
                </div>
            </span>
        </div>

    </header>

    <div class="content comment-text"<?php print $content_attributes; ?>>

        <?php print render($title_prefix); ?>
        <h3<?php print $title_attributes; ?>><?php print $title ?></h3>
        <?php print render($title_suffix); ?>
      
        <?php // We hide the comments and links now so that we can render them later.
        hide($content['links']);
        print render($content); ?>
        <?php if ($signature): ?>
        <div class="user-signature clearfix">
        <?php print $signature ?>
        </div>
        <?php endif; ?>

    </div>

    <?php print render($content['links']) ?>

</article>
