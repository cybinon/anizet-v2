<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public function index(){

        $serviceAccount = ServiceAccount::fromJsonFile( __DIR__.'/Firebase.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();

        $database = $firebase->getDatabase();


        $ref = $database->getReference('Anizet');

        $key = $ref->push()->getKey();

        $ref->getChild($key)->set([
            'Subjectname' => 'Laravel Class',
            'SubjectText' => 'bla bla bla'
        ]);

        return $ref;

    }
}
