<?php
function get_user_count(){
    $con=mysqli_connect("localhost","root","","library_db");
    $user_count="";
    $query="select count(*) as user_count from users";
    $query_run=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($query_run)){
    $user_count=$row['user_count'];
}
        return($user_count);}
        function get_book_count(){
            $con=mysqli_connect("localhost","root","","library_db");
            $book_count="";
            $query="select count(*) as book_count from books";
            $query_run=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($query_run)){
            $book_count=$row['book_count'];
        }
                return($book_count);}
                
                function get_borrowed_book_count(){
                    $con=mysqli_connect("localhost","root","","library_db");
                    $book_count="";
                    $query="select count(*) as book_count from borrowed_books";
                    $query_run=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($query_run)){
                    $book_count=$row['book_count'];
                }
                        return($book_count);}
                        
    ?>