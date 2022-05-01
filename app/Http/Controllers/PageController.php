<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return DB::table('pages')
            ->join('categories', 'pages.cat_id', '=', 'categories.id')
            ->leftJoin('seo', 'pages.id', '=', 'seo.page_id')
            ->where('pages.status', '=', 'on')
            ->where('categories.status', '=', 'on')
            ->select(
                'pages.title as pageTitle',
                'pages.status as pagesStatus',
                'categories.title as catTitle',
                'seo.seo_slug',
                'seo.seo_title',
                'seo.seo_h1',
            )
            ->take(10)
            ->get();
    }

    /**
     * @param  $slug
     * @return Collection|void
     */
    public function page($slug)
    {
        $result = DB::table('pages')
            ->rightJoin('seo', 'seo.page_id', '=', 'pages.id')
            ->where('seo.seo_slug', '=', $slug)
            ->where('pages.status', '=', 'on')
            ->get();

        if ($result->count()) {
            return $result;
        }

        abort(404);
    }
}
