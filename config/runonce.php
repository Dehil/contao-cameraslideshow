<?php
class CameraSlideshowRunonce extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->import('Database');
    }
    public function run()
    {
        //Check for update to C3.2
        if ($this->Database->tableExists('tl_camera_slides'))
        {
            $arrFields = $this->Database->listFields('tl_camera_slides');
            $blnDone = false;

            //check for one table and field
            foreach ($arrFields as $arrField)
            {
                if ($arrField['name'] == 'imageId' && $arrField['type'] != 'int')
                {
                    $blnDone = true;
                }
            }
            // Run the version 3.2 update in three tables
            if ($blnDone == false)
            {
                Database\Updater::convertSingleField('tl_camera_slides', 'imageId');
                Database\Updater::convertSingleField('tl_camera_slides', 'addimagethumbnail');
                Database\Updater::convertSingleField('tl_camera_slides', 'videoimageId');
            }

        }

    }
}

$objCameraSlideshowRunonce = new CameraSlideshowRunonce();
$objCameraSlideshowRunonce->run();
?>
