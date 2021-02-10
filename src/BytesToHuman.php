<?php

namespace Skipprd\MachineToHuman;

class BytesToHuman
{

    protected static $units = [
        'B',
        'KB',
        'MB',
        'GB',
        'TB',
        'PB',
    ];

    /**
     * @param $bytes
     * @param bool $withUnits - append units (MB, GB, etc)
     * @param bool $forceUnit - Enforce conversion to unit e.g 1024 bytes to 0.001 MB
     * @return string
     */
    public static function toHuman($bytes, $withUnits = true, $forceUnit = false)
    {


        // Convert to logical units
        if (!$forceUnit) {

            for ($i = 0; $bytes > 1024; $i++) {
                $bytes /= 1024;
            }

        } else {

            // Ensure conversion to unit 
            foreach (self::$units as $i => $unit) {

                if ($unit == $forceUnit) {
                    $i--;
                    break;
                }


                $bytes /= 1024;
            }
        }


        $return = round($bytes, 2);

        if ($withUnits)
            $return = $return . ' ' . self::$units[$i + 1];

        return $return;
    }

    /**
     * @param $bytes
     * @return string
     */
    public static function suggestUnit($bytes) {

        $suggestedUnit = reset(self::$units);

        // Ensure conversion to unit
        foreach (self::$units as $i => $unit) {

            if ($bytes <= 1024) {
                return $suggestedUnit;
            }

            $suggestedUnit = self::$units[$i + 1];

            $bytes /= 1024;

        }

        return $suggestedUnit;
    }
}