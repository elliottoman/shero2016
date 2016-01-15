<?php if (is_post_type_archive('team')) { echo '<!-- No Pagination -->'; } else { ?>

    <div id="pagination">
        <span id="newer"><?php previous_posts_link('<i class="fa fa-arrow-left"></i><span>  Newer Articles</span>',''); ?></span>
        <span id="older"><?php next_posts_link('&nbsp; &nbsp;<span>Older Articles  </span><i class="fa fa-arrow-right"></i>',''); ?></span>
    </div>

<?php } ?>





