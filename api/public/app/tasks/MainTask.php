<?php

/**
 * Class MainTask
 **/
class MainTask extends \Phalcon\Cli\Task
{
    public function initialize()
    {
        require APPLICATION_PATH . "/models/Session/SessionEffectiveTime.php";
        require APPLICATION_PATH . "/models/Session/Session.php";
    }

    public function mainAction()
    {
        $runningSessions = \Models\Session\Session::find([
            "conditions" => "completed = 0"
        ]);

        foreach ($runningSessions as $session) {
            if ($session->EffectiveTimes) {

                $diffInSeconds = 0;

                $startTime = \Carbon\Carbon::parse($session->EffectiveTimes[0]->timestamp_start);
                $stopTime = \Carbon\Carbon::parse($session->EffectiveTimes[$session->EffectiveTimes->count() - 1]->timestamp_stop);

                foreach ($session->EffectiveTimes as $time) {
                    if ($time->timestamp_stop) {
                        $start = \Carbon\Carbon::parse($time->timestamp_start);
                        $stop = \Carbon\Carbon::parse($time->timestamp_stop);

                        $diffInSeconds += $start->diffInSeconds($stop);
                    }
                }

                $sessionDurationSeconds = $startTime->diffInSeconds($stopTime);
                $sessionDuration = gmdate("H:i:s", $sessionDurationSeconds);

                $effectiveTime = gmdate("H:i:s", $diffInSeconds);
                $session->effective = $effectiveTime;
                $session->duration = $sessionDuration;
                $session->update();
            }
        }
    }
}
