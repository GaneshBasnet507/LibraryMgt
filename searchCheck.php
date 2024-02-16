<?php
if(isset($_POST['submit'])){
    $bookname = $_POST['book']; 

    //echo $bookname;
    $con = mysqli_connect("localhost", "root", "", "library_db") or die("db connection error");
    $select = "SELECT Category,Daraz FROM books WHERE Name='$bookname'";
    $result = mysqli_query($con, $select) or die("retrieval error");}?>
    <button onclick="window.location.href='AdminDashboard.php'">Back</button>

  
<!doctype html>
        <body>
            <title>Books Category</title>
            <table style="text-align:center;" border="3">
            <tr class="item">
            <div class="a">
                <h1>Category of Book is:</h1>
                <td>Category</td>
                <td>Daraz</td></div>
                </tr>
            <tr>
                <?php
                while($row=mysqli_fetch_assoc($result))
                {
                ?>
                
                <td><?php echo $row['Category'];?></td>
                <td><?php echo $row['Daraz'];?></td>
        
            </tr>
            <?php
                }
                ?>
                <style>
                       body {
        background-color: #f7f7f7;
        font-family: Arial, sans-serif;
    }
    
    h1 {
        color: blue;
        font-size: 36px;
        text-align: center;
        margin-top: 50px;
    }
    
    table {
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    
    th, td {
        padding: 10px 20px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }
    
    tr.item {
        background-color: light blue;
        font-weight: bold;
    }
    
    div.a {
        text-align: center;
        margin-bottom: 20px;
    }
</style>








                    </style>