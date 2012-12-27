# Coding Standards

These standards for code formatting and documentation must be followed by anyone contributing to this project. Any contributions that do not meet these guidelines will not be accepted!

## General considerations 

- Prior to every comment insert an empty row and start with a capital letter
- Single line comments start with // symbols and multilne use phpdocumentator style /* */
- Before continue, break, return, exit, die, always insert a blank line
- If you find a defective source, then you first need to fit the standards and commit it. Only - then make your changes
- IDE must be configured to work with utf-8
- IDE must use TABS instead of spaces. One TAB is 4 spaces.
- All comments must be written in English
- Inline tasks. TODO, FIXME write the following: `// TODO: What to do?`

## File Formatting

### Closing PHP Tag

Files containing only PHP code should always omit the closing PHP tag. This prevents many of the elusive white screens of death caused by white space after the closing PHP tag.

### Indentation

All indentation should be done using real tabs, NOT spaces. Aligning items after the indentation should be done using spaces, NOT tabs.

	// indented with tabs
	$sVar      = 'something';  // indented with tabs and aligned value & comments
	$sVariable = 'else';       // with those above/below using spaces

### Line Endings

Line endings should be Windows-style CRL+LF.

### File Naming

All file names must be all lower case. No exceptions.

### Encoding

Files should be saved with UTF-8 encoding and the BOM should not be used.

## Naming Conventions

### Classes

Class names should use underscores to separate words, and each word in the class name should begin with a capital letter. The use of CamelCase is discouraged but cannot be prevented in some cases.

	class Theme
	{

	}

 or 

	class Theme_Bubbles extends Theme
	{

	}

### Methods

Like class names, method names should use underscores to separate words, not CamelCase. Method names should also be all lower case. Visibility should always be included (public, protected, private). An underscore can be used at the beginning of the name to make it clear the method is protected/private or to signify it should be considered as such when you need it public.

	class Session
	{
		public function get_flash( $sName, $aData)
		{
			// Some code here
		}
	}

or

	class View
	{

		// Array of global view data
		protected $_aGlobalData = array();

		protected function capture( $sViewFilename, array $aViewData )
		{
			// Some code here
		}

	}

### Variables

Variable names should be concise and contain only CamelCase with a prefix (s - string, b - boolean, a - array, o - object, m – mixed). Loop iterators should be short, preferably a single character.

	$sFirstName
	for ( $i = 0; $i < $max; $i++ )

### Constants

Constants should be all upper case.

	MY_CONSTANT
	TEMPLATE_PATH
	TEXT_DEFAULT

## Keywords

Keywords such as <kbd>true</kbd>, <kbd>false</kbd>, <kbd>null</kbd>, <kbd>as</kbd>, etc should be all lower case, as upper case is reserved for
	constants. Same goes for primitive types like <kbd>array</kbd>, <kbd>integer</kbd>, <kbd>string</kbd>.

	$var = true;
	$var = false;
	$var = null;
	foreach ( $aArray as $key => $sValue )
	public function my_function( array $aArray )
	function my_function( $aArg = null )

## Control Structures

The structure keywords such as <kbd>if</kbd>, <kbd>for</kbd>, <kbd>foreach</kbd>, <kbd>while</kbd>, <kbd>switch</kbd> should be followed by a space - only functions without a space. Braces should be placed on a same line, and <kbd>break</kbd> should have the same tab as its case. Each comment should start after the one space and first letter Upercase

	if ( $bArg === true ) {
		//do something here
	} elseif ( $bArg === null ) {
		// Do something else here
	} else {
		// Catch all do something here
	}
	
	foreach ( $aArray as $key => $sValue ) {
		// Loop here
	}
	
	for ( $i = 0; $i < $max; $i++ ) {
		// Loop here
	}
	
	while ( $i < $max ) {
		// Loop here
	}
	
	switch ( $sVar ) {
		case 'value1':
			// Do something here
		break;

		default :
			// Do something here
		break;
	}
## Function, classes, methods
The braces should start in a new line. Arguments must be with a space in a brackets

	class User_model extends CI_Model
	{
		private $sUserName = NULL;
	
		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
		}
	
		public function set_user_name( $sUserName )
		{
			$this->sUserName = $sUserName;
		}
	
		public function get_user_name()
		{
			return $this->sUserName;
		}
	}


## Alternative if statements

In some cases, a full <kbd>if</kbd> statement is a bit too much code for a simple conditional assignment or function call. In those cases, you can use PHP's execution logic to use a shorter boolean-operator based syntax.

Using <kbd>and</kbd> means the second part only gets evaluated if the first part were true, using <kbd>or</kbd> means the second part only gets executed if the first part were false.

Don't use this when both <kbd>if</kbd> and <kbd>else</kbd> are needed, just in cases like single conditional statements.

	// DON'T DO THIS
	$this->uri->segment( 3 ) and $sVar = $this->uri->segment( 3 );
	$this->uri->segment( 3 ) or $sVar = 'default';

	// This is better:
	if ( $this->uri->segment( 3 ) ) {
		$sVar = $this->uri->segment( 3 );
	} else {
		$sVar = 'default';
	}

	// Or this:
	$sVar = $this->uri->segment( 3 )
			? $this->uri->segment( 3 )
			: 'default';

## Comparisons, Logical operators

Comparing function/method returns and variables should be type aware, for example some functions may return
	<kbd>false</kbd>, and when comparing this return the type sensitive operators such as <kbd>===</kbd> or <kbd>!==</kbd>. Additionally, use of
	<kbd>&&</kbd> or <kbd>||</kbd> is preferred over <kbd>and</kbd> or <kbd>or</kbd> for readability. The <kbd>!</kbd> should have spaces on both sides when used.

	if ( $bVar == false and $sOtherVar != 'some_value' )
	if ( $bVar === false or my_function() !== false )
	if ( ! $var)

## Class/Interface Declarations

Class/interface declarations have the opening brace on the following line:

	class Session
	{

	}

## Function/Method Declarations

The function/method opening brace must always begin on a new line and have the same indentation as its
	structure.

	class Session
	{
		public static function get_flash( $sName, $aData )
		{
			// Some code here
		}
	}

### Variables

When initializing variables, one variable should be declared per line. To enhance code readability, these
	should each be on a separate line. Align values and comments when appropriate.

	$sVar      = '';           // Do each on its own line
	$sOtherVar = 'Some Value'; // Do each on its own line

## Brackets and Parenthesis

Space should come before and after the initial bracket, but not within parenthesis. There should be a space before eatch parenthesis.

	$aArray = array( 1, 2, 3, 4 );
	$array['my_index'] = 'something';
	for ( $i = 0; $i < $max; $i++ )

### String quotation

Single quotes are preferred over double quotes.

### Concatenation

String concatenation should not contain spaces around the joined parts.

	// Yes
	$sString = 'my string '.$sVar.' the rest of my string';

	// No
	$sString = 'my string ' . $sVar . ' the rest of my string';

### Operators

	$sVar = 'something';
	if ( $sVar == 'something' ) // Space before and after logical operator
	$iVar = $iSomeVar + $iOtherVar; // Space before and after math operator
	$iVar++; // no space before increment
	++$iVar; // no space after increment
	
## Documentation
Having a good API documentation is a vital requirement for any successful project. When building your module, please take the time to document its code or even write help articles on it (but that is a different story). 

Anything can be documented except for views. Classes and functions should be documented using the standard PHPDoc format. 

Remember, you can always refer to the php source to see how things are done.