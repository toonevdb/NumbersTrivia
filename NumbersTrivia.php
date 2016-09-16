<?php

namespace Toonevdb;

use DateTime;

/**
 * Numbers trivia utility.
 *
 * Provides some trivia facts to lighten up your day.
 * Data comes from http://numbersapi.com.
 *
 * @author Anthony Vanden Bossche <toonevdb@gmail.com>
 */
class NumbersTrivia
{
    /**
     * Base url.
     *
     * @var string
     */
    protected static $baseUrl = 'http://numbersapi.com/';

    /**
     * Get a random fact.
     *
     * @return string
     */
    public static function random() : string
    {
        return file_get_contents(
            static::$baseUrl.'random/trivia'
        );
    }

    /**
     * Get trivia for a given day or defaults to today.
     *
     * @param  \DateTime $date (optional) date
     * @return string
     */
    public static function forDate(DateTime $date = null) : string
    {
        if (!$date) {
            $date = new DateTime('today');
        }

        return file_get_contents(
            static::$baseUrl.$date->format('m').'/'.$date->format('d').'/date'
        );
    }
}
