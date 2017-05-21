# Text class

This class contains useful functions for manipulating and verifying text

## function list

* `startWith($expected, $string, $caseSensitive = true)` : Return true if the string start with expected, else return false
* `endWith($expected, $string, $caseSensitive = true)` : Return true if the string end with expected, else return false
* `is_email($string)` : Check if a string is a email
* `get_emails($string)` : Return an array with emails in string
* `contains_email($string)` : Verify if a string contains one or more emails