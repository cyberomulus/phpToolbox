# Text class

This class contains useful functions for manipulating and verifying text

## function list

* `startWith($expected, $string, $caseSensitive = true)` : Return true if the string start with expected, else return false
* `endWith($expected, $string, $caseSensitive = true)` : Return true if the string end with expected, else return false
* `random($length = 10, $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')` : Create a random string
* `to_camelCase($string, $capitalizeFirst = false)` : Convert any string in camel case
* `is_email($string)` : Check if a string is a email
* `get_emails($string)` : Return an array with emails in string
* `contains_email($string)` : Verify if a string contains one or more emails
* `isValidSructuredCommunication($string)` : Verify if a string (or int) is a valid structured communication
* `isIbanStructure($iban)` : Verify if a string is a valid Iban structure