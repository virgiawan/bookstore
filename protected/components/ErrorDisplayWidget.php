<?php
/**
 * ErrorDisplayWidget class file.
 *
 * @version Apr 19, 2010, 11:08:26 AM
 * @author  Rifqi Alfian <rifqi@onebitmedia.com>
 * @link    http://onebitmedia.com/
 */


class ErrorDisplayWidget extends CWidget
{
    public $msg;
    
    public function run()
    {
        $data['msg'] = empty($this->msg)?array():$this->msg;
        $this->render('application.components.views.errordisplayview', $data);
    }
}