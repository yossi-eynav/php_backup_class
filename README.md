steps:
	1- create an instance of the BackUp class.
	   the constructor accepts two arguments, your src folder and your destenation folder.
	   	
	    $backup = new BackUp('src','destination');
		
	2- if you want to backup your db as well,use the 'export_database' method;
	   the method accepts three arguments db_name,username and password.
	   
	   $backup->export_database('db_name','username','password');
	   
	   
## make sure that you're having write permission to the destination folder.
