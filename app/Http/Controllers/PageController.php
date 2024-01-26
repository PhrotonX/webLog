<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

/**
 * PagesController is a controller for static pages like special pages (about, help, contact us, etc...),
 * articles, and news content.
 * 
 * Articles should not be confused with a blog uploaded by a blogger.
 */
class PageController extends Controller
{
    /*public function __invoke($type){
        $data = [
            'page' => $type
        ];
        return view($type, $data);
    }*/

    /**
     * Check if page exists
     * 
     * @param $page
     * @return bool
     */
    public function isPageExists($page): bool
    {
        if(View::exists($page)){
            return true;
        }else{
            return false;
        }
    }

    /*
        In this function, the title and content of the webpage should be resolved from a database
        containing some path to html or php files and their metadata stored in an xml file.

        To be retrieved                     To be retrieved from
        =============================       =====================
        -HTML or PHP (content)              File system, but filepath from DB
        -XML (metadata, incl. title)        Database
        -Other data (e.g. uploader,         Database
        linked IDs, etc.).

        If parameter $type is null, the function returns the title of the webpage instead. Supported values are
        about, help, contact us page, and any other special pages that is read liek articles.

        If parameter $title is null, the function returns a categorical page that displays a list of recommended
        pages. To allow displaying those pages, pass a parameter $type with values article, news, or web.

        If both parameters are null, an uncategorized page that displays a list of recommended article, news, and web
        will be displayed instead.

        Functionality of this function is currently limited.
    */
    public function loadPage($type = null, $title = null){
        if($type == "article" || $type == "news" || $type == "web"){

            if($title != null){
                $data = [
                    'page' => $title
                ];
            }else{
                $data = [
                    'page' => "all-articles"
                ];
            }
            
            return view($type, $data);
        }else{
            return view($type)->with('page', $type);
        }
    }

    public function loadTest($webData = null){
        $data = [
            'id' => $webData,
            'names' => 'Charles','Robert','Martin'
        ];
        return view('test', $data);
    }

    // public function loadPage($title = null){
    //     if($title != null){
    //         $data = [
    //             'page' => $title;
    //         ];
    //     }else{
    //         $data
    //     }
    // }
}