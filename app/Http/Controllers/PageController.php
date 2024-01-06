<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * PagesController is a controller for static pages like special pages (about, help, contact us, etc...),
 * articles, and news content.
 * 
 * Articles should not be confused with a blog uploaded by a blogger.
 */
class PageController extends Controller
{
    /*
        In this function, the title and content of the webpage should be resolved from a database
        containing some path to html or php files and their metadata stored in an xml file.

        To be retrieved                     To be retrieved from
        =============================       =====================
        -HTML or PHP (content)              File system, but filepath from DB
        -XML (metadata, incl. title)        Database
        -Other data (e.g. uploader,         Database
        linked IDs, etc.).
    */
    public function loadArticle($type, $title){
        if($type == "article" || $type == "news" || $type == "web"){
            $data = [
                'page' => $title
            ];
            //Prototype only
            return view('article',  $data);
        }
    }
}
