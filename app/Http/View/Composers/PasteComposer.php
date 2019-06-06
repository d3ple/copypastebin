<?php


namespace App\Http\View\Composers;

use App\Paste;
use Illuminate\View\View;


class PasteComposer
{
    protected $paste;

    public function __construct(Paste $paste)
    {
        $this->paste = $paste;
    }


    public function compose(View $view)
    {
        $recentPublicPastes = $this->paste->getRecentPublicPastes();
        $recentPastesOfCurrentUser = $this->paste->getRecentPastesOfCurrentUser();

        $view->with([
            'recentPublicPastes' => $recentPublicPastes,
            'recentPastesOfCurrentUser' => $recentPastesOfCurrentUser
        ]);
    }
}