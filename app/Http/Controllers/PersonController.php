<?php

namespace App\Http\Controllers;

use App\Person;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Helper\TokenGenerator;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::all();
        return view('person.index')->with([
            'persons' => $persons
        ]);
    }

    public function create()
    {
        return view('person.create');
    }

    public function store(Request $request)
    {
        $person = $request->all();
        $person['token'] = (new TokenGenerator())->generate(8);
        $person = Person::create($person);

        QrCode::format('png')
            ->size(500)
            //->merge('\public\image\sc-su-logo-eng.png', .15)
            ->errorCorrection('H')
            ->generate($person->token, '../public/qrcode/'.$person->id.'.png');
        $imgPath = '../public/qrcode/'.$person->id.'.png';
        $person['qr_code'] = $imgPath;
        $person->save();

        return $person;
    }

    public function show($id)
    {
        $person = Person::findOrFail($id);
        return view('person.show')->with([
            'person' => $person
        ]);
    }
}