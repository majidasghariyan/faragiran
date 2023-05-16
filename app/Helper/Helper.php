<?php

function alert_message($message,$level='info')
{
    Session::flash('alert_message', $message);
    Session::flash('alert_level', $level);
}
