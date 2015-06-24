<?php if ( PHP_SAPI !== 'cli' ) exit('No web access allowed');

/**
 * Class sanitizeName.php
 * @author Clement Patout <clement.patout@gmail.com>
 * @property Photo Photo
 * Date: 22/06/2015
 * Time: 22:38
 */
class sanitizeName extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->photos_path = './uploads/';
    }

    public function index()
    {
        $folder = FCPATH . $this->photos_path;
        $headerFolder = FCPATH . $this->photos_path . 'header/';
        $thumbFolder = FCPATH . $this->photos_path . 'thumbs/';

        $this->load->model('Photo');
        $this->load->model('Video');

        $photos = $this->Photo->get_all();
        $videos = $this->Video->get_all();

        foreach ($photos as $i => &$photo) {
            $oldFilename = $photo->filename;

            $fileNameParsed = explode('.', $photo->filename);
            $ext = array_pop($fileNameParsed);
            $photo->filename = implode('.', [slug(implode('.', $fileNameParsed)), $ext]);

            if ($oldFilename === $photo->filename) {
                unset($photos[$i]);
                continue;
            }

            if (
                !rename($folder . $oldFilename, $folder . $photo->filename) ||
                !rename($headerFolder . $oldFilename, $headerFolder . $photo->filename) ||
                !rename($thumbFolder . $oldFilename, $thumbFolder . $photo->filename)
            ) {
                unset($photos[$i]);
                echo "File $oldFilename does not exists";
            }
        }

        foreach ($videos as $i => &$video) {
            $oldThumbnail = $video->thumbnail;

            $fileNameParsed = explode('.', $video->thumbnail);
            $ext = array_pop($fileNameParsed);
            $video->thumbnail = implode('.', [slug(implode('.', $fileNameParsed)), $ext]);

            if ($oldThumbnail === $video->thumbnail) {
                unset($videos[$i]);
                continue;
            }

            if (
                !rename($headerFolder . $oldThumbnail, $headerFolder . $video->thumbnail) ||
                !rename($thumbFolder . $oldThumbnail, $thumbFolder . $video->thumbnail)
            ) {
                unset($photos[$i]);
                echo "File $oldThumbnail does not exists";
            }
        }

        var_dump($photos);
        var_dump($videos);

        if (!empty($photos)) {
            $this->Photo->update_all($photos);
        }

        if (!empty($videos)) {
            $this->Video->update_all($videos);
        }
    }

}