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
    float: right;
    height:100%;
    font-size: 25px;
    margin-top: 30px;
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

.nav1{
    float: left;
    height:100%;
    font-size: 25px;
    margin-top: 30px;
    margin-left: -50px;
}

.nav1 a{
    height:90px;
    display:table;
    float:left;
    padding:25px 20px;   
}

.nav1 a li{
    display: table-cell;
    vertical-align: middle;
    height: 100%;
    color: black;
    font-family: sans-serif;
}

.nav1 a:last-child{
    padding-right: 0;
}

.nav1 a li:hover{
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
               <a href="ownersales.php"><li>Milk Tea Sales</li></a>
               <a href="cakesales.php"><li>Cake Sales</li></a>
               <a href="profit.php"><li>Profit</li></a>
               <a href="ownerlogin.php"><li>Logout</li></a>
           </ul>
           <ul class="nav1">
                    <a href="ownerprofile.php"><li>Profile</li></a>
                    <a href="customerprofile.php"><li>Customer</li></a>
                    <a href="home(staffadmin).php"><li>Menu</li></a>
                    <a href="testing.php"><li>Order History</li></a>
            </ul>
        </div>
    </div>
</body>
</html>