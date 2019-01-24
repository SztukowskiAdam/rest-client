<?php

namespace App\Http\Controllers;

use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;


class BooksController extends Controller
{

    public function index() {

        return view('index', [
            'books' => $this->getAllBooks()
        ]);
    }

    public function create() {

        return view('create');
    }

    public function edit($id) {
        $book = $this->getBookById($id);

        if(empty($book)) return Redirect::to('/books')->with('error', "Nie znaleziono takiej pozycji");

        return view('edit', [
            'book' => $book
        ]);
    }

    public function store(Request $request) {
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->post('http://localhost:56120/Service1.svc/ksiazki', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json; charset=utf-8',
            ],
            RequestOptions::JSON => [
                "BookName" => $request->title,
                "ID" => 1,
                "Price" => $request->price,
                "Author" => $request->author,
                "Year" => $request->year,
                "Type" => $request->type,
            ]
        ]);

        return Redirect::to('/books')->with('success', $result->getBody()->getContents());
    }

    public function update(Request $request, $id) {
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->put('http://localhost:56120/Service1.svc/ksiazki/'.$id, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json; charset=utf-8',
            ],
            RequestOptions::JSON => [
                "BookName" => $request->title,
                "ID" => $request->id,
                "Price" => $request->price,
                "Author" => $request->author,
                "Year" => $request->year,
                "Type" => $request->type,
            ]
        ]);

        return Redirect::to('/books')->with('success', $result->getBody()->getContents());
    }

    public function delete($id) {
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->delete('http://localhost:56120/Service1.svc/ksiazki/'.$id, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json; charset=utf-8',
            ]
        ]);

        return Redirect::to('/books')->with('success', $result->getBody()->getContents());
    }


    public function test() {
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->get('http://localhost:56120/Service1.svc/ksiazki', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json; charset=utf-8',
            ],
            RequestOptions::JSON => [
                "BookName" => "Cejrowski XDDDDDD 2",
                "ID" => 1,
                "Price" => 142.24]
        ]);

        return $result->getBody()->getContents();
    }

    public function getAllBooks() {
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->get('http://localhost:56120/Service1.svc/ksiazki', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json; charset=utf-8',
            ]
        ]);

        return json_decode($result->getBody()->getContents(), true);
    }

    public function getBookById($id) {
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->get('http://localhost:56120/Service1.svc/ksiazki/'.$id, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json; charset=utf-8',
            ]
        ]);

        return json_decode($result->getBody()->getContents(), true);
    }

}
