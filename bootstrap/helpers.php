<?php
/*
* This Project was written by Benart Iduwe.
* A Music Streaming Platform.
* October 2019
* All the custom helper in this project are here.

*/
function mydate($date){
    return  date('F dS, Y', strtotime($date));
}


//Slug
function getslug($title){
return Str::slug($title);
}
