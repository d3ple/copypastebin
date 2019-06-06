<?php

namespace App\Http\Controllers;

use App\Paste;
use App\BusinessLogic\PasteService;
use App\Http\Requests\SearchPasteRequest;
use App\Http\Requests\StorePasteRequest;
use App\Http\Requests\UpdatePasteRequest;


class PasteController extends Controller
{
    protected $paste, $pasteService;

    public function __construct(Paste $paste, PasteService $pasteService)
    {
        $this->paste = $paste;
        $this->pasteService = $pasteService;
    }


    public function create()
    {
        return view("new_paste");
    }


    public function show($url)
    {
        if ($paste = Paste::where('url', $url)->first()) {
            $isExpired = $this->paste->isExpired($paste);
            $isPrivate = $this->paste->isPrivate($paste);
            return view("show_paste", compact('paste', 'isExpired', 'isPrivate'));
        } else {
            return abort(404);
        }
    }


    public function store(StorePasteRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['url'] = $this->pasteService->createUrl();
        $validatedData['expiration_time'] = $this->pasteService->setExpirationTime($validatedData['expiration-time']);
        $validatedData['user_id'] = $this->pasteService->setUserId();
        $this->paste->create($validatedData);

        return redirect()->route('/', [$validatedData['url']])->with('status', 'created');
    }


    public function update(UpdatePasteRequest $request)
    {
        $validatedData = $request->validated();
        $paste = Paste::find($validatedData['id']);
        $paste->access_type = $validatedData['access_type'];
        $paste->save();

        return back();
    }


    public function search(SearchPasteRequest $request)
    {
        $validatedData = $request->validated();
        $searchQuery =  request('query');

        switch ($validatedData['search-type']) {
            case "both":
                $searchResults = Paste::titleContains($searchQuery)->public()
                    ->orWhere->dataContains(request('query'))->public()->get();
                break;
            case "title":
                $searchResults = Paste::public()->titleContains($searchQuery)->get();
                break;
            case "content":
                $searchResults = Paste::public()->dataContains($searchQuery)->get();
                break;
            default:
                return back();
        }

        return view("search_paste", compact('searchResults', 'searchQuery'));
    }


    public function showSearchResults()
    {
        return view("search_paste");
    }


    public function showUserPastes()
    {
        $userPastes = Paste::allOfCurrentUser()->paginate(10);
        return view("user_pastes", compact('userPastes'));
    }

}
