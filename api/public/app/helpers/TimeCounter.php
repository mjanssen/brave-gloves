<?php namespace Helpers;

/**
 * Class TimeCounter
 * @package helpers;
 */
class TimeCounter
{
    private $totaltime = [];
    private $times = [];

    /**
     * @param $key
     * @param $time
     */
    public function addTime($key, $time)
    {
        $str_time = $time;

        $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);

        sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

        $time_seconds = $hours * 3600 + $minutes * 60 + $seconds;

        $this->times[$key][] = $time_seconds;
    }

    /**
     * @param $key
     */
    public function calculate($key)
    {
        if (is_array($this->times[$key])) {

            $length = sizeof($this->times[$key]) - 1;
            $this->totaltime[$key] = 0;

            for ($x = 0; $x <= $length; $x++) {
                $this->totaltime[$key] += $this->times[$key][$x];
            }
        }
    }

    /**
     * @param $key
     * @return string
     */
    public function get_total_time($key)
    {
        return $this->totaltime[$key];
    }
}
