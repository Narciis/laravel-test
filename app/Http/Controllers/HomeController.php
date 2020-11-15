<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentPostSearchRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        
    /**
     * repository
     *
     * @var mixed
     */
    private $repository;

        
    /**
     * __construct
     *
     * @param  mixed $repository
     * @return void
     */
    public function __construct(EloquentPostSearchRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = $this->repository->search($request->get('keyword'));

        if ($request->filled('active')) {
            switch ((bool)$request->get('active')) {
                case true:
                    $query->active();
                    break;
                case false:
                    $query->inactive();
                    break;
            }
        }

        if ($request->filled('sort')) {
            switch ($request->get('sort')) {
                case 'alphabetical':
                    $query->alphabetically();
                    break;
                case 'latest':
                    $query->latest();
                    break;
            }
        }

        return view('home')->with([
            'posts' => $query->fetch(),
        ]);
    }
}
