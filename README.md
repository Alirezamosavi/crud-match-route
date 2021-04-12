# crud-match-route

Video link

https://youtu.be/1Fi_nIoeXFg

                                   How to use Route match in Laravel 8?

step -1: write the below code in web.php

Route::match(array('GET', 'POST'),'/test', 'App\Http\Controllers\ProductController@test'); 

as you can see i used Route::match 
i wanna POST for add new data 
and
GET for show all data that get from table




step -2: write a function for that
 public function test(Request $request){}

 add the below code in function because i want add new data according Method post
 if ($request->isMethod('post')){}

for that the abow code play in function i have to add the below code before 
if($request->isMethod('post')){} 




step -3: add the code that are in store of function




step -4: add new method to GET 

if ($request->isMethod('get')){}

by this code we can show all data that are in table
so add all funtion there are in index of function

step -5: add the below code for give address in template(Html)
{{ url('test') }}

