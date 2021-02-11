<html>
<head>
</head>
<style>
*{
    margin:0;
    padding:0;
    list-style:none;
    text-decoration: none;
    
}



.inner_header{
    width:90%;
    height:100%;
    display:block;
    margin:0 auto;

	}

.logo_container{
    height:auto;
	}

.logo_container img{
    height:90px;
    position: absolute;
    left: 48%;
    }


.nav{
    float:right;
    height:100%;
    font-size: 25px;
}

.nav a{
    height:90px;
    display:table;
    float:left;
    padding:25px 20px;  
}

.nav a li{
    display: table-cell;
    vertical-align: middle;
    height: 100%;
    color: black;
    font-family: sans-serif;
}

.nav a:last-child{
    padding-right: 0;
}

.nav a li:hover{
    color:orange;
    font-weight:bold;
}
</style>

<body>
    <div class="header">
        <div class="inner_header">
            <div class="logo_container">
                
            </div>
               <ul class="nav">
               <a href="staff_view.php"><li>Order</li></a>
               <a href="pickup.php"><li>Pick-up</li></a>
               <a href="updateprice.php"><li> Update Menu</li></a>
               <a href="stafflogout.php"><li>Logout</li></a>
           </ul>
        </div>
    </div>
</body>
</html>