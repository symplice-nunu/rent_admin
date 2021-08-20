
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Online Exam</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <style>
 	 		body{
	font-family: Tahoma, Geneva, sans-serif;
	color: #fff;
	background-color: lightgray;
	
	background-size: cover;
}
 .yoo{
    
    height: 7.1em;
    
    background: rgba(101,1000,1000,1.7);
  }
 	
*{
	padding: 0;
	margin: 0;
}
.menu-bar{
background: rgb(0,100,0);
text-align: center;
margin-bottom: 0.1em;
height: 5em;
}
.menu-bar ul{
	display: inline-flex;
	list-style: none;
	color: #fff;
}
.menu-bar ul li{
	width: 160px;
	margin: 15px;
	padding: 15px;
	
}
.menu-bar ul li a{
	text-decoration: none;
	color: #fff; 
	
}
.active,.menu-bar ul li:hover{
	background: #2bab0d;
	border-radius: 20px;
      height: 3em;
        width: 160px;
        
        
}
.sub-menu-1
{
	display: none;
}
.menu-bar ul li:hover .sub-menu-1
{
	display: block;
	position: absolute;
	background: rgb(0,100,0);
	margin-top: 15px;
	margin-left: -15px;
}
.menu-bar ul li:hover .sub-menu-1 ul
{
	display: block;
	margin: 10px;
}
.menu-bar ul li:hover .sub-menu-1 ul li
{
	width: 155px;
	padding: 10px;
	border-bottom: 1px dotted #fff;
	background: transparent;
	border-radius: 0;
	text-align: left;
}
.menu-bar ul li:hover .sub-menu-1 ul li:last-child
{
	border-bottom: none;
}
.menu-bar ul li:hover .sub-menu-1 ul li a:hover
{
	color: #b2ff00;
}
.sub-menu-2
{
	display: none;
}
.hover-me:hover .sub-menu-2
{
	position: absolute;
	display: block;
	margin-top: -40px;
	margin-left: 140px;
	background: rgb(0,100,0);
}
.fa-angle-right
{
	float: right;
}
   h1 { 
                color:Green; 
            } 
            div.scroll { 
                
                padding-left: 10em;
                background-color: gray; 
                width: 1000px; 
                height: 393px; 
                overflow-x: hidden; 
                overflow-y: auto; 
                text-align:justify; 
                margin-bottom: -4.7em;
                
            }
            .tutu{
                height: 4em;
                border-radius: 2em;
                margin-left: -4em;
                margin-top: 0.5em;
                margin-right: 4em;
            }
      div.static
	{
		position: static;
		border: 2px solid lightgreen;
		height: 19.5em;
		width: 69em;
		overflow: scroll;
		margin-bottom: -4.49em;
		background-color: lightcyan;
	}
	td{
		text-align: center;
	}
        div.staticc
	{
		position: static;
		border: 2px solid red;
		height: 23.9em;
		width: 59em;
		overflow: scroll;
                margin-top: 0.5em;
                margin-left: 2em;
		margin-bottom: -4.49em;
		background-color: lightcyan;
                padding-left: 8em;
	}
	td{
		text-align: center;
	}
	.hidetext { -webkit-text-security: disc; /* Default */ }
 	</style>
<body>
    <div style="color: white; background-color: black; height: 2em; padding-top: 0.1em; margin-bottom: -2.5em; padding-left: 32em; margin-top: -0.3em;"><h4>Exam List</h4></div>
    <div class="container">
        <div class="container">
            <!-- Button trigger modal -->
            <br>
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add New Exam
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Register New Exam</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="jumbotron col-md-10 offset-1">
                                    <div id="error_message"></div>
                                    <form  onsubmit="return validatee();" action="RegisterExamReq.jsp" method="POST">


                                        <div class="form-group">
                                            <label for="exampleInputPassword1" style="color: blue;">Category</label>
                                            <input type="text" class="form-control" id="category" name="category" placeholder="Enter Exam Category" >
                                            
                                        </div><br />
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" style="color: blue;">Date</label>
                                            <input type="date" class="form-control" id="date" name="datee" >
                                        </div><br />
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" style="color: blue;">Exam Name</label>
                                            <input type="text" class="form-control" id="examname" name="examname" placeholder="Enter Exam Name">
                                            
                                        </div><br />


                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-success" name="submit" value="Save Exam" style="width:10em;">
                                        <script>
                                            function validatee() {
    var category = document.getElementById("category").value;
    var date = document.getElementById("date").value;
    var examname = document.getElementById("examname").value;
    



    var error_message = document.getElementById("error_message");

    error_message.style.padding = "10px";

    var text;
    if (category.length < 2) {
        text = "Please Enter valid Category";
        error_message.innerHTML = text;
        return false;
    }
if (date.length < 4) {
        text = "Date is Required";
        error_message.innerHTML = text;
        return false;
    }
    if (examname.length < 2) {
        text = "Please Enter valid Exam Name";
        error_message.innerHTML = text;
        return false;
    }
 
    
    return true;
}

                                        </script>
                                    </form>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
           








        </div>

        <div class="container" style="margin-top: 0.1em;" >
          
                
            </div>  
        </div>
    </div>


</body>

</html>