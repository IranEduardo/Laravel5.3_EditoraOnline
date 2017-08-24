<?php

namespace App;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TableInterface
{
    protected $fillable = [
        'name'
    ];


    public function getTableHeaders()
    {
        // TODO: Implement getTableHeaders() method.
        return ['Id', 'Nome'];
    }

    public function getValueForHeader($header)
    {
        // TODO: Implement getValueForHeader() method.
        switch($header) {
            case 'Id':
                return $this->id;
            case 'Nome':
                return $this->name;
        }
    }
}
