<?php
$detail_page = (isset($resource_id) ? true: false);
?>

<div class="row-fluid">
    <h2 class="h2-loop-tit">
        <a href="<?php echo real_site_url($oer_plugin_slug); ?>resource/?id=<?php echo $resource->id; ?>">
            <?php echo $resource->title ?>
        </a>
    </h2>
</div>

<?php if ($resource->author ) : ?>
    <div class="row-fluid authors">
        <?php foreach ( $resource->author as $index => $author ):
            echo "<a href='" . real_site_url($oer_plugin_slug) . "?filter=author:\"" . $author . "\"'>" . $author . "</a>";
            echo count($resource->author)-1 != $index ? '; ' : '.';
        endforeach; ?>
    </div>
<?php endif; ?>

<?php if ($resource->learning_objectives ) : ?>
    <div id="conteudo-loop-tags" class="row-fluid margintop10">
        <?php echo $resource->learning_objectives[0]  ?>
    </div>
<?php endif; ?>

<?php if ($resource->description && $detail_page) : ?>
    <div class="row-fluid">
        <?php _e('Description','oer'); ?>: <?php echo $resource->description[0]  ?>
    </div>
<?php endif; ?>

<?php if ($resource->course_type && $detail_page) : ?>
    <div class="row-fluid">
        <?php _e('Course type','oer'); ?>: <strong><?php echo print_lang_value($resource->course_type, $lang) ?></strong>
    </div>
<?php endif; ?>

<?php if ($resource->structure && $detail_page) : ?>
    <div class="row-fluid">
        <?php _e('Structure','oer'); ?>: <strong><?php echo print_lang_value($resource->structure, $lang) ?></strong>
    </div>
<?php endif; ?>

<?php if ($resource->tec_resource_type && $detail_page) : ?>
    <div class="row-fluid">
        <?php _e('Technical resource type','oer'); ?>: <strong><?php echo print_lang_value($resource->tec_resource_type, $lang) ?></strong>
    </div>
<?php endif; ?>

<?php if ($resource->format && $detail_page) : ?>
    <div class="row-fluid">
        <?php _e('Format','oer'); ?>: <strong><?php echo print_lang_value($resource->format, $lang) ?></strong>
    </div>
<?php endif; ?>

<?php if ($resource->learning_context && $detail_page) : ?>
    <div class="row-fluid">
        <?php _e('Learning context','oer'); ?>: <strong><?php echo print_lang_value($resource->learning_context, $lang) ?></strong>
    </div>
<?php endif; ?>

<?php if ($resource->audience && $detail_page) : ?>
    <div class="row-fluid">
        <?php _e('Audience','oer'); ?>: <strong><?php echo print_lang_value($resource->audience, $lang) ?></strong>
    </div>
<?php endif; ?>

<?php if ($resource->license && $detail_page) : ?>
    <div class="row-fluid">
        <?php _e('License','oer'); ?>: <strong><?php echo print_lang_value($resource->license, $lang) ?></strong>
    </div>
<?php endif; ?>

<?php if ($resource->descriptor || $resource->keywords ) : ?>
    <div id="conteudo-loop-tags" class="row-fluid margintop10">
        <i class="ico-tags"> </i>
        <?php
            if ($resource->descriptor){
                foreach ( $resource->descriptor as $index => $subject ):
                    echo "<a href='" . real_site_url($oer_plugin_slug) . "?q=descriptor:\"" . $subject . "\"'>" . $subject . "</a>";
                    echo $index != count($resource->descriptor)-1 ? ', ' : '';
                endforeach;
            }
            if ($resource->keywords){
                echo $resource->descriptor ? ', ' : '';
                foreach ( $resource->keywords as $index => $keyword ):
                    echo "<a href='" . real_site_url($oer_plugin_slug) . "?q=keywords:\"" . $keyword . "\"'>" . ucwords($keyword) . "</a>";
                    echo $index != count($resource->keywords)-1 ? ', ' : '';
                endforeach;
            }
        ?>
    </div>
<?php endif; ?>

<?php if ( $resource->link ) : ?>
    <div class="row-fluid">
      <?php if ($alternative_links && count($resource->link) > 10): ?>
          <?php foreach ($resource->link as $index => $link): ?>
              <span class="more">
                  <a href="<?php echo $link ?>" target="_blank">
                      <i class="fa fa-file" aria-hidden="true"> </i>
                      <?php ( ($index == 0) ? _e('Resource (primary link)','oer') : _e('Resource (alternative link)','oer')); ?>
                  </a>
              </span>&nbsp;&nbsp;&nbsp;
          <?php endforeach; ?>
      <?php else: ?>
          <span class="more">
              <a href="<?php echo $resource->link[0] ?>" target="_blank">
                  <i class="fa fa-file" aria-hidden="true"> </i> <?php _e('Resource','oer'); ?>
              </a>
          </span>
      <?php endif; ?>
    </div>
<?php endif; ?>
