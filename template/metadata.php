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
        <h2><?php _e('Objectives','oer'); ?>:</h2>
        <?php echo $resource->learning_objectives[0]  ?>
    </div>
<?php endif; ?>

<?php if ($resource->description && $detail_page) : ?>
    <div class="row-fluid">
        <h2><?php _e('Description','oer'); ?>:</h2>
        <?php
        $ab = $resource->description[0];
        $ab_clean = str_replace(array("\\r\\n", "\\t", "\\r", "\\n", "pt|", "en|", "es|", "fr|"), '' , $ab);
        // mark abstract sections
        $ab_mark = preg_replace("/(\A|\.)([\w{Lu}\s]+:)/u", "$1<h2>$2</h2>", $ab_clean);
        echo $ab_mark;
        ?>
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

<!-- Start MH Area -->

<?php if ($resource->mh): ?>
    <?php foreach (  $resource->mh as $index => $mh) { ?>
        <div class="row-fluid">
            <?php
                echo "<a href='" . real_site_url($oer_plugin_slug) . "?q=mh:\"" . $mh . "\"'>" . $mh . "</a>";
                //echo $index != count($resource->mh)-1 ? ', ' : '';
            ?>
        </div>
    <?php } ?>
<?php endif; ?>

<!-- End MH area -->
<?php if ($resource->keywords ) : ?>
    <div id="conteudo-loop-tags" class="row-fluid margintop10">
        <i class="ico-tags"> </i>
        <?php
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
<?php /*if ($resource->descriptor || $resource->keywords ) : ?>
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
<?php endif; */?>

<?php if ( $resource->link ) : ?>
    <div class="row-fluid">
      <?php foreach ($resource->link as $url): ?>
          <?php if (preg_match('/vimeo\.com|youtube\.com|flickr\.com/', $url)) :?>
              <?php display_thumbnail($url); ?>
          <?php endif; ?>
      <?php endforeach; ?>
    <div>
    <div class="row-fluid">
      <?php foreach ($resource->link as $index => $url): ?>
            <span class="more">
                <a href="<?php echo $url ?>" target="_blank">
                    <i class="fa fa-file" aria-hidden="true"> </i> <?php _e('Resource','oer'); ?>
                    <?php
                        if (count($resource->link) > 1){
                            echo __('link','oer') . ' (' . intval($index+1) . ')';
                        }
                    ?>
                </a>
            </span>&nbsp;&nbsp;&nbsp;
      <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="row-fluid">
    <span>
        <?php //var_dump($resource); ?>
    </span>
</div>
