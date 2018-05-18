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
                foreach ( $resource->keywords as $index => $keyword ):
                    echo "<a href='" . real_site_url($oer_plugin_slug) . "?q=keywords:\"" . $keyword . "\"'>" . $keyword . "</a>";
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
