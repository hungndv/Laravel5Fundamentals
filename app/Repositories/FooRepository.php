<?php
/**
 * Created by PhpStorm.
 * User: hungndv
 * Date: 11/8/2015
 * Time: 6:16 PM
 */

namespace Laravel5Fundatmentals\Repositories;


class FooRepository
{
    public function get(){
        // eloquent model go here
        return ['data', 'from', 'database'];
    }
}