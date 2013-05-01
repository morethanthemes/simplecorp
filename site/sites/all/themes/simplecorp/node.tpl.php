<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> hentry clearfix"<?php print $attributes; ?>>
   
    <?php if ($display_submitted): ?>
    
    <header class="entry-meta">
        <div class="submitted">

            <time class="date">
                <span class="month">
                <?php print $submitted_month; ?>                
                </span>
                <strong class="day">
                <?php print $submitted_day; ?>              
                </strong>  
                <span class="year">
                <?php print $submitted_year; ?>              
                </span>
            </time>

            <ul>
                <?php if (isset($content['field_tags'])): ?>
                <li>
                <span class="title"><?php print t('In'); ?>:</span>
                <?php print render($content['field_tags']); ?>
                </li>
                <?php endif; ?>
                <li>
                <span class="title"><?php print t('Posted By'); ?>:</span>
                <?php print $name; ?> 
                </li>
                <li>
                <span class="title"><?php print t('Comments'); ?>:</span>
                <?php print $comment_count; ?> 
                </li>
            </ul>          

        </div>
    </header>  
    
    <?php endif; ?>

    <div class="entry-body clearfix">

        <?php print render($title_prefix); ?>
        <?php if (!$page): ?>
        <header><h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2></header>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <div class="content"<?php print $content_attributes; ?>>
        <?php // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content); ?>
        </div>

        <?php print render($content['links']); ?>
    
    </div>

    <?php $node_author = user_load($uid); ?>
        
    <?php if ($page): ?>
    <?php if($user_picture && variable_get('user_signatures', 0)): ?>

    <div class="author clearfix">

        <div class="author-gravatar">
        <?php print $user_picture; ?>
        </div>
      
        <?php if($node_author->signature): ?>            
        <div class="author-about">
            <h4><?php print t('About the author'); ?></h4>
            <p class="author-description"><?php print $node_author->signature; ?></p>
        </div>
        <?php endif; ?>   

    </div>  
    
    <?php endif; ?> 
    <?php endif; ?>

    <?php print render($content['comments']); ?>

</article>
