### Description: 
**We start from this array of hotels
[("Array")](https://www.codepile.net/pile/OEWY7Q1G).
Print all our hotels with all the available data.
Start gradually.
First, print the data on the page without worrying about the style.
Then, add Bootstrap and display the information using a table.**

### Bonus:

**1. Add a form at the beginning of the page that, via a GET request, allows filtering hotels that have parking.**

**2. Add a second field to the form that allows filtering hotels by rating (e.g., enter 3 and get all hotels that have a rating of three stars or higher).**

---
### Solution:
- Copy the array hotel's details in php
- Print in page all array details
- Use bootstrap for page style
- Added validation using condition

### Bonus
1. 
- Use a select form searching hotels besed on parking condition
- Insert a button to submit form or onchange select form submit
- Define a function to filtered the hotels based on parking value get from form
- Print in page filtered hotels

2. 
- Use a select form searching hotels besed on rate condition
- Get the value selected from the same button 
- Add an if contition in filteredHotels function. To check the rate value geting from form