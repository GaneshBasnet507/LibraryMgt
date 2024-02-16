<?php
    require('countfunction.php');
    ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
       
    </head>
    <body>
        <header>
            <h2 class="lms">AdminDashboard</h2>
            <nav class="navigation">
                
                <button class="but" onclick="window.location.href='logout.php';">logout</button></a>
                <button class="but" onclick="window.location.href='searchbar.html';">Category</button></a>
                <button class="but" onclick="window.location.href='calender.php';">Calender</button></a> 
                
            </nav>
        </header>
        <section class="main">
        <div class="card">
                    <h1>Books</h1>
                        <div class="c-body">
                            <p >number of total books:<?php echo get_book_count();?></p>
                           <button class="butt" onclick="window.location.href='Books.php';">View Books</button>
                        </div>
           </section>
           <section class="main">
            <div class="card">
                        <h1>Student</h1>
                            <div class="c-body">
                                <p >number of total Users:<?php echo get_user_count();?></p>
                               <button class="butt" onclick="window.location.href='userdetail.php';">Total Users</button>
                            </div>
               </section>
               <section class="main">
                <div class="card">
                            <h1>Issued Books</h1>
                                <div class="c-body">
                                    <p >number of issued books:<?php echo get_book_count();?></p>
                                   <button class="butt" onclick="window.location.href='issueBook.php';">View issued Books</button>
                                </div>
                   </section>
                   <section class="main">
                    <div class="card">
                                <h1>Book Overdue</h1>
                                    <div class="c-body">
                                        <p >number of total books</p>
                                       <button class="butt" onclick="window.location.href='booknotreturn.php';">Not return Books</button>
                                    </div>
                       </section>
                    

         </body>
         <style>
            section{
                margin-top:100px;
                display:inline-block;
                margin-left: 200px;
            }
            .main{
                
        
                padding:40px;
                width:100x;

            }
            .card{
                width:100%;
                margin:10px;
                background-color: aliceblue;
                text-align: center;
                border-radius: 20px;
                padding-left:10px;
                box-shadow:0 20px 35px red;
            
            }
            .butt{
                background:red;
            }
            p{
                font-size:12px;
            }
         header{
            position:fixed;
            top:0;
            left:0;
            width:100%;
            padding:20px 100px;
            background-color:blue;
            display:flex;
            align-items: center;
            float: left;
            
            
        }
        .lms{
            color:aliceblue
        
        }
              .but{
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 8px;
                text-align: center;
                text-decoration: none;
                display:inline-block;
                font-size: 16px;
                float:right;
                margin: 10px;
                align:right;
                
        
                cursor: pointer;
                border-radius: 5px;
        }
        nav{
            margin-left:800px;
        }
       
        
    </style>
    
   
</html>