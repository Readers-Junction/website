function prepareEventHandlers() 
{
	document.getElementById("form1").onsubmit = function() 
	{

		if (document.getElementById("name").value == "" || document.getElementById("name").value == " ") 
		{
			document.getElementById("errorMessage").innerHTML = "Enter the name of the book";
			return false;
		} 
		else 
		{
			if (document.getElementById("author").value == "" || document.getElementById("age").value == " ") 
			{
				document.getElementById("errorMessage").innerHTML = "Enter the name of the author";
				return false;
			}
			else
			{
				if (document.getElementById("pages").value == "" || document.getElementById("pages").value == " ") 
				{
					document.getElementById("errorMessage").innerHTML = "Please enter the number of pages";
					return false;
				} 
				else
				{
					if (document.getElementById("rating").value == "" || document.getElementById("rating").value == " ") 
					{
						document.getElementById("errorMessage").innerHTML = "Enter the rating";
						return false;
					} 
					else
					{
						if (document.getElementById("mrp").value == "" || document.getElementById("mrp").value == " ") 
						{
							document.getElementById("errorMessage").innerHTML = "Enter the MRP";
							return false;
						} 
						else
						{
							if (document.getElementById("rent").value == "" || document.getElementById("rent").value == " ") 
							{
								document.getElementById("errorMessage").innerHTML = "Enter the rent";
								return false;
							} 
						}
					}
				}
			} 
		}
	}
}

window.onload =  function() 
{
	prepareEventHandlers();
};