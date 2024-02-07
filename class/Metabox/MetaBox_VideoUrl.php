<?php
include_once 'Base/BaseMetaBox.php';
class MetaBox_VideoUrl extends BaseMetaBox
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id       = 'video_url';
        $this->title    = 'link video';
        $this->callback = 'layout';
        $this->screen   = ['post'];
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function layout($post): void
    {
        ?>
        <label for="video_url">Video Link</label>
        <input type="text" id="video_url" value="<?= get_post_meta($post->ID, '_oop_video_url', true) ?>" placeholder="Enter link of video" name="video_url">
        <?php
    }

    /**
     * @inheritDoc
     */
    public function save_meta_box($post_id) : void
    {
        wp_is_post_revision($post_id) ?
        update_post_meta(post_id: $post_id,meta_key: '_oop_video_url',meta_value: $_POST['video_url']) : NULL ;
    }


}