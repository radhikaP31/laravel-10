<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HelpersController extends Controller
{
    public function arrayHelperFunction()
    {
        // Arr::join
        $array = ['Tailwind', 'Alpine', 'Laravel', 'Livewire'];

        $joined = Arr::join($array, ', ');
        $andJoined = Arr::join($array, ', ', ' and ');

        // Arr::keyBy()
        $array = [
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
        ];
        $keyed = Arr::keyBy($array, 'product_id');

        //Arr::map
        $array = ['first' => 'james', 'last' => 'kirk'];

        $mapped = Arr::map($array, function (string $value, string $key) {
            return ucfirst($value);
        });

        //Arr::pluck
        $array = [
                ['developer' => ['id' => 1, 'name' => 'Taylor']],
                ['developer' => ['id' => 2, 'name' => 'Abigail']],
            ];

        $pluck = Arr::pluck($array,
            'developer.name'
        );

        // head()
        $array = [100, 200, 300];

        $head = head($array);

        // last()
        $array = [100, 200, 300
        ];

        $last = last($array);

        return view('displayHelper', compact('joined', 'andJoined', 'keyed', 'mapped', 'pluck','head', 'last'));
    }
}
