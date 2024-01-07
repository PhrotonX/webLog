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
                    'page' => "All Articles"
                ];
            }
            
        }else{
            $data = [
                'page' => $type
            ];
        }
        return view($type, $data);
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
