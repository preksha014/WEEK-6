<?php
$books = [
    [
        'name' => 'Dark Matter',
        "author" => "Andy Weir",
        "releaseYear" => 2001
    ],
    [
        "name" => "The Langoliers",
        "author" => "Andy Weir",
        "releaseYear" => 2012
    ],
    [
        "name" => "Project Hail Mary",
        "author" => "Philip K. Dick",
        "releaseYear" => 2008
    ],

];
//function filteredByAuthor($books,$author)
// {
//     $filteredBooks=[];
//     foreach( $books as $book ){
//         if($book['author']===$author){
//             $filteredBooks[]=$book;
//         }
//     }
//     return $filteredBooks;
// }

//Lambda function
$filteredBooks = function ($items, $key, $value) {
    $filteredItems = [];
    foreach ($items as $item) {
        if ($item[$key] === $value) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
};
$filteredBooks = $filteredBooks($books, "author", 'Andy Weir');

require('index.view.php');