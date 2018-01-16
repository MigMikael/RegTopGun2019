<?php

namespace App\Http\Controllers;

use App\Person;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Helper\TokenGenerator;

class PersonController extends Controller
{
    public $role = [
        'competition' => 'ผู้เข้าแข่งขัน',
        'staff' => 'ทีมงาน',
        'judge' => 'กรรมการ',
        'observer' => 'ผู้สังเกตการณ์',
    ];

    public $shirt_size = [
        'XS' => 'XS',
        'S' => 'S',
        'M' => 'M',
        'L' => 'L',
        'XL' => 'XL',
        'XXL' => 'XXL',
        'XXXL' => 'XXXL'
    ];

    public function index()
    {
        $persons = Person::all();
        return view('person.index')->with([
            'persons' => $persons
        ]);
    }

    public function create()
    {
        return view('person.create')->with([
            'role' => $this->role,
            'shirt_size' => $this->shirt_size
        ]);
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

        return redirect()->action('PersonController@show', [
            'id' => $person->id
        ]);
    }

    public function update(Request $request, $id)
    {
        $editPerson = $request->all();
        $person = Person::findOrFail($id);
        $person->update($editPerson);

        return redirect()->action('PersonController@show', [
            'id' => $person->id
        ]);
    }

    public function show($id)
    {
        $person = Person::findOrFail($id);
        return view('person.show')->with([
            'person' => $person
        ]);
    }

    public function edit($id){
        $person = Person::findOrFail($id);
        return view('person.edit')->with([
            'person' => $person,
            'role' => $this->role,
            'shirt_size' => $this->shirt_size
        ]);
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();

        return redirect()->action('PersonController@index');
    }

    public function check_in()
    {
        return view('person.check-in');
    }

    public function storeCheckIn(Request $request)
    {
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');

        $person = Person::where([
            ['first_name', 'LIKE', '%'.$first_name.'%'],
            ['last_name', 'LIKE', '%'.$last_name.'%']
        ])->first();

        $person->is_register = True;
        $person->save();

        return redirect()->action('PersonController@show',
            ['id' => $person->id]
        )->with(['status' => 'register success']);
    }
}
